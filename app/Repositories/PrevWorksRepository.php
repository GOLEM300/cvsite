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
            PreviosExpirience::create([
                'workStartMonth' => $value['workStartMonth'],
                'workStartYear' => $value['workStartYear'],
                'workEndMonth' => $value['workEndMonth'],
                'workEndYear' => $value['workEndYear'],
                'stillWork' => $value['stillWork'] ?? 'off',
                'vacancy' => $value['vacancy'],
                'organisation' => $value['organisation'],
                'duty' => $value['duty'],
                'cv_id' => $cv_id
            ]);
        }
    }

    /**
     *
     */
    public function update(array $array, int $cv_id) : void
    {
        $this->remove($cv_id);
        $this->save($array, $cv_id);
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
