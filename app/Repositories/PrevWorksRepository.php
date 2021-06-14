<?php

namespace App\Repositories;

use App\Models\PreviosExpirience;

class PrevWorksRepository implements PrevWorksInterface
{
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
}