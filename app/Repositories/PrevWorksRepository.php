<?php

namespace App\Repositories;

use App\Models\PreviosExpirience;

class PrevWorksRepository implements PrevWorksInterface
{
    /**
     * 
     */
    public function save(array $array, int $cv_id) : void
    {
        foreach ($array as $value) {
            $work_experiences = new PreviosExpirience();
            $work_experiences->workStartMonth = $value['workStartMonth'];
            $work_experiences->workStartYear = $value['workStartYear'];
            $work_experiences->workEndMonth = $value['workEndMonth'];
            $work_experiences->workEndYear = $value['workEndYear'];
            $work_experiences->stillWork = $value['stillWork'] ?? 'off';
            $work_experiences->vacancy = $value['vacancy'];
            $work_experiences->organisation = $value['organisation'];
            $work_experiences->duty = $value['duty'];
            $work_experiences->cv_id = $cv_id;
            $work_experiences->save();
        }
    }

    /**
     * 
     */
    public function update(array $array, int $cv_id) : void
    {
        $this->remove($cv_id);
        $this->save($array,$cv_id);
    }


    /** get all previos jobs for current cv
     * 
     */
    public function getPrevWorksExp($cv_id) : object
    {
        $result = PreviosExpirience::where('cv_id', $cv_id)->get();
        return $result;
    }

    /** get only last job for current cv
     * 
     */
    public function getLastWork($cv_id) : ?object
    {
        $lastWork = PreviosExpirience::where('cv_id', $cv_id)->latest('id')->first();
        if ($lastWork !== null) {
            return $lastWork;
        } else {
            return null;
        }
    }

    /**
     *
     */
    public function remove(int $cv_id) : void
    {
        $prevWorks = PreviosExpirience::where('cv_id', $cv_id);
        $prevWorks->delete();
    }
}