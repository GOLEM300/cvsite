<?php

namespace App\Repositories;

use App\Models\Cv;

class CvRepository implements CvQueriesInterface
{
    /**
     * 
     * get one user cv with relations
     */
    public function getUserCv($cv_id) : object
    {
        $cv = Cv::select()->where('id', $cv_id)->with(
            [
            'busyness:cv_id,name',
            'sheduleType:cv_id,name',
            'previosExpirience'
            ]
        )->first();
        return $cv;
    }

    /**
     * 
     * get user collection of cv
     */
    public function getUserCvs($user_id) : object
    {
        $cvs = Cv::where('user_id', $user_id)->with(
            [
            'previosExpirience'
            ]
        )->get();
        return $cvs;
    }

    /**
     * 
     * get all cv 
     */
    public function getAllCv()
    {
        $cvs = Cv::with(
            [
            'previosExpirience'
            ]
        )->get();
        return $cvs;
    }

    /**
     * 
     * remove cv
     */
    public function remove($cv_id) : void
    {
        $cv = Cv::findOrFail($cv_id);
        $cv->delete();
    }
}
