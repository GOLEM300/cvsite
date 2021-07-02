<?php

namespace App\UseCases\Cvs;

use App\Models\Cv;
use App\Http\Requests\Cv\CreateRequest;
use App\Http\Requests\Cv\EditRequest;
use App\Repositories\BusynessInterface;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Intervention\Image\Image as ImageImage;
use App\Repositories\CvQueriesInterface;
use App\Repositories\PrevWorksInterface;
use App\Repositories\SheduleTypeInterface;

class CvService
{
    private $cvQueries;
    private $prevWorks;
    private $busynessQueries;
    private $sheduleTypeQueries;

    /**
     *  
     */
    public function __construct(CvQueriesInterface $cvQueries, PrevWorksInterface $prevWorks, BusynessInterface $busynessQueries, SheduleTypeInterface $sheduleTypeQueries)
    {
        $this->cvQueries = $cvQueries;
        $this->prevWorks = $prevWorks;
        $this->busynessQueries = $busynessQueries;
        $this->sheduleTypeQueries = $sheduleTypeQueries; 
    }
    
    /**
     * 
     * create and store cv from request
     */
    public function create($user_id, CreateRequest $request) : Cv
    {
        return DB::transaction(
            function () use ($request, $user_id) {

                $image = $request['photo'] !== null ? $this->savePhoto($request['photo']) : '';

                $birthDate = $this->birthDateTransform($request['birth_date']);//$request->birth_date->format_date;//
                //dd($birthDate);
                $age = Cv::age($birthDate);

                $prevYearsExpirience = Cv::prevYears($request['expirience'], $request['workExperiences']);

                $cv = Cv::make(
                    [
                    'photo' => $image->basename ?? '',
                    'name' => $request['name'],
                    'patronymic' => $request['patronymic'],
                    'lastname' => $request['lastname'],
                    'birth_date' => $birthDate,
                    'age' => $age,
                    'sex' => $request['sex'],
                    'locate_city' => $request['locate_city'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'specialization' => $request['specialization'],
                    'salary' => $request['salary'],
                    'expirience' => $request['expirience'],
                    'prevYearsExpirience' => $prevYearsExpirience,
                    'about' => $request['about'],
                    'user_id' => $user_id
                    ]
                );

                $cv->saveOrFail();

                $this->saveBusyness($request['busyness'], $cv->id);
                $this->saveSheduleType($request['shedule_types'], $cv->id);

                if ($request['expirience'] == 'yes') {
                    $this->savePrevWorks($request['workExperiences'], $cv->id);
                }

                return $cv;
            }
        );
    }

    public function getFormatDateAttribute($date)
    {
        return $date->format('Y-m-d');
    }


    /**
     * 
     */
    private function savePhoto(object $photo) : ImageImage
    {
        $imagePath = $photo->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        return $image;
    }

    /**
     * 
     */
    private function birthDateTransform(string $requestDate) : string
    {
        $birthDate = Carbon::createFromFormat('d.m.Y', $requestDate)->format('Y-m-d');
        return $birthDate;
    }

    /**
     * 
     * update current cv
     */
    public function update(EditRequest $request,int $cv_id) : void
    {
        $birthDate = $this->birthDateTransform($request['birth_date']);

        $age = Cv::age($birthDate);

        $prevYearsExpirience = Cv::prevYears($request['expirience'], $request['workExperiences']);

        $old_cv = $this->getUserCv($cv_id);

        $old_cv->update(
            $request->only(
                [
                'photo',
                'name',
                'patronymic',
                'lastname',
                'birth_date',
                'sex',
                'locate_city',
                'email',
                'phone',
                'specialization',
                'salary',
                'expirience',
                'about',
                'user_id',
                'updated_at'
                ]
            )
        );

        $old_cv->update([
            'age'=>$age, 
            'prevYearsExpirience' => $prevYearsExpirience
        ]);

        $this->updateBusyness($request['busyness'], $cv_id);
        $this->updateSheduleType($request['shedule_types'], $cv_id);

        if (!empty($request['workExperiences'])) {
            $this->updatePrevWorks($request['workExperiences'], $cv_id);
        } else {
            $this->removePrevWorks($cv_id);
        }
    }

    /**
     * 
     * remove current cv
     */
    public function remove($cv_id) : void
    {
        $this->cvQueries->remove($cv_id);
    }

    /**
     * 
     * get one user cv
     */
    public function getUserCv($cv_id) : object
    {
        return $this->cvQueries->getUserCv($cv_id);
    }

    /**
     * 
     * get cv collection for log in user
     */
    public function getUserCvs($user_id) : object
    {
        return $this->cvQueries->getUserCvs($user_id);
    }

    /**
     * 
     * get all cv
     */
    public function getAllCv() : object
    {
        return $this->cvQueries->getAllCv();
    }

    /**
     * 
     */
    public function getAllCvWithPaginate($request) : object
    {
        return $this->cvQueries->getAllCvWithPaginate($request);
    }

    /**
     * 
     * save busyness relation from current cv
     */
    private function saveBusyness(array $array,int $cv_id) : void
    {
        $this->busynessQueries->save($array, $cv_id);
    }

    /**
     * 
     * save sheduleType relation from current cv
     */
    private function saveSheduleType(array $array,int $cv_id) : void
    {
        $this->sheduleTypeQueries->save($array, $cv_id);
    }

    /**
     * 
     * update busyness relation from current cv
     */
    private function updateBusyness(array $array,int $cv_id) : void
    {
        $this->busynessQueries->update($array, $cv_id);
    }

    /**
     * 
     * update sheduleType relation from current cv
     */
    private function updateSheduleType(array $array,int $cv_id) : void
    {
        $this->sheduleTypeQueries->update($array, $cv_id);
    }

    /**
     * 
     */
    public function getPrevWorks(int $cv_id) : object
    {
        return $this->prevWorks->getPrevWorksExp($cv_id);
    }

    /**
     * 
     */
    private function savePrevWorks(array $array, int $cv_id) : void
    {
        $this->prevWorks->save($array, $cv_id);
    }

    /**
     * 
     */
    private function updatePrevWorks(array $array, int $cv_id) : void
    {
        $this->prevWorks->update($array, $cv_id);
    }

    /**
     * 
     */
    private function removePrevWorks(int $cv_id) : void
    {
        $this->prevWorks->remove($cv_id);
    }
}
