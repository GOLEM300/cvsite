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
    
    /** create and store cv from request
     * 
     */
    public function create($user_id, CreateRequest $request) : Cv
    {
        return DB::transaction(function () use ($request, $user_id) {
            //$image = $this->savePhoto($request);

            $request['birth_date'] = Carbon::createFromFormat('d.m.Y', $request['birth_date'])->format('Y-m-d');
    
            $request['sex'] = request('radio-sex') ?? 'male';
    
            $request['expirience'] = request('radio-expirience') ?? 'no';
    
            $request['user_id'] = $user_id;

            $cv = Cv::make([
                'photo' => 'hjk',//$image->basename,
                'name' => $request['name'],
                'patronymic' => $request['patronymic'],
                'lastname' => $request['lastname'],
                'birth_date' => $request['birth_date'],
                'sex' => $request['sex'],
                'locate_city' => $request['locate_city'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'specialization' => $request['specialization'],
                'salary' => $request['salary'],
                'busyness' => 1,
                'shedule_type' => 1,
                'expirience' => $request['radio-expirience'],
                'about' => $request['about'],
                'user_id' => $request['user_id']
                ]);

            $cv->saveOrFail();

            $this->saveBusyness($request['busyness'],$cv->id);
            $this->saveSheduleType($request['shedule_types'],$cv->id);

            if ($request['radio-expirience'] == 'yes') {
                $this->savePrevWorks($request['workExperiences'],$cv->id);
            }

            return $cv;
        });
    }

    /**
     * 
     */
    private function savePhoto(CreateRequest $request) : ImageImage
    {
        // dd($request);
        $imagePath = $request['photo']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        return $image;
    }

    /** update current cv
     * 
     */
    public function update(EditRequest $request,int $cv_id) : void
    {
        $old_cv = $this->getUserCv($cv_id);
        $old_cv->update($request->only([
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
        ]));
        
        $this->updateBusyness($request['busyness'],$cv_id);
        $this->updateSheduleType($request['shedule_types'],$cv_id);

        if ($request['radio-expirience'] == 'yes') {
            $this->updatePrevWorks($request['workExperiences'], $cv_id);
        }
    }

    /** remove current cv
     * 
     */
    public function remove($cv_id) : void
    {
        $this->cvQueries->remove($cv_id);
    }

    /** get one user cv
     * 
     */
    public function getUserCv($cv_id) : object
    {
        return $this->cvQueries->getUserCv($cv_id);
    }

    /** get cv collection for log in user
     * 
     */
    public function getUserCvs($user_id) : object
    {
        return $this->cvQueries->getUserCvs($user_id);
    }

    /** get all cv
     * 
     */
    public function getAllCv() : object
    {
        return $this->cvQueries->getAllCv();
    }

    /** get busyness relation from current cv
     * 
     */
    public function getBusyness($cv) : array
    {
        return $cv->getRelation('busyness')->toArray();
    }

    /** get sheduleType relation from current cv
     * 
     */
    public function getSheduleType($cv) : array
    {
        return $cv->getRelation('sheduleType')->toArray();
    }

    /** save busyness relation from current cv
     * 
     */
    private function saveBusyness(array $array,int $cv_id) : void
    {
        $this->busynessQueries->save($array,$cv_id);
    }

    /** save sheduleType relation from current cv
     * 
     */
    private function saveSheduleType(array $array,int $cv_id) : void
    {
        $this->sheduleTypeQueries->save($array,$cv_id);
    }

    /** update busyness relation from current cv
     * 
     */
    private function updateBusyness(array $array,int $cv_id) : void
    {
        $this->busynessQueries->update($array,$cv_id);
    }

    /** update sheduleType relation from current cv
     * 
     */
    private function updateSheduleType(array $array,int $cv_id) : void
    {
        $this->sheduleTypeQueries->update($array,$cv_id);
    }

    /**
     * 
     */
    private function savePrevWorks(array $array, int $cv_id) : void
    {
        $this->prevWorks->save($array,$cv_id);
    }

    /**
     * 
     */
    private function updatePrevWorks(array $array, int $cv_id) : void
    {
        $this->prevWorks->update($array,$cv_id);
    }
}
