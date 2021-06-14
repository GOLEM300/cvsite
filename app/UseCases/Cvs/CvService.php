<?php

namespace App\UseCases\Cvs;

use App\Models\Busyness;
use App\Models\Cv;
use App\Models\SheduleType;
use App\Http\Requests\Cv\CreateRequest;
use App\Models\PreviosExpirience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Intervention\Image\Image as ImageImage;
use App\Repositories\CvQueriesInterface;

class CvService
{
    private $cvQueries;

    /** cv class for get data from db
     *  
     */
    public function __construct(CvQueriesInterface $cvQueries)
    {
        $this->cvQueries = $cvQueries;
    }
    
    /** create and store cv from request
     * 
     */
    public function create($user_id, CreateRequest $request) : Cv
    {
        return DB::transaction(function () use ($request, $user_id) {
            $image = $this->savePhoto($request);

            dd(gettype($user_id));

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

            $this->saveAttribute($request, 'App\Models\SheduleType', $cv->id, 'shedule_types');
            $this->saveAttribute($request, 'App\Models\Busyness', $cv->id, 'busyness');

            if ($request['radio-expirience'] == 'yes') {
                $this->savePrevExp($request, 'App\Models\PreviosExpirience', $cv);
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

    /**
     * 
     */
    private function saveAttribute(CreateRequest $request, string $modelName, int $id, $argument) : void
    {
        $loop = $request[$argument];
        foreach ($loop as $value) {
            $field = new $modelName();
            $field->name = $value;
            $field->cv_id = $id;
            $field->save();
        }
    }

    /**
     * 
     */
    private function savePrevExp(CreateRequest $request, string $modelName, Cv $cv) : void
    {
        $work_experiencess = $request['workExperiences'];
        foreach ($work_experiencess as $value) {
            $work_experiences = new $modelName();
            $work_experiences->workStartMonth = $value['workStartMonth'];
            $work_experiences->workStartYear = $value['workStartYear'];
            $work_experiences->workEndMonth = $value['workEndMonth'];
            $work_experiences->workEndYear = $value['workEndYear'];
            $work_experiences->stillWork = $value['stillWork'] ?? 'off';
            $work_experiences->vacancy = $value['vacancy'];
            $work_experiences->organisation = $value['organisation'];
            $work_experiences->duty = $value['duty'];
            $work_experiences->cv_id = $cv->id;
            $work_experiences->save();
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
}
