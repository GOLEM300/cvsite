<?php

namespace App\Repositories;

use App\Models\Cv;

class CvRepository implements CvQueriesInterface
{
    /**
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
     */
    public function getAllCvWithPaginate(object $request)
    {

        if (!empty($value = $request->sorted_by)) {
            switch ($value) {
            case "newest":
                $query = Cv::orderBy('id', 'desc');
                break;
            case "desc":
                $query = Cv::orderBy('salary', 'desc');
                break;
            case 'asc':
                $query = Cv::orderBy('salary', 'asc');
                break;
            }
        } else {
            $query = Cv::orderBy('id', 'desc');
        }

        if (!empty($value = $request->sex)) {
            if ($value != 'all') {
                $query->where('sex', $value);
            }
        }

        if (!empty($value = $request->locate_city)) {
            $query->where('locate_city', $value);
        }

        if (!empty($value = $request->salary)) {
            $query->where('salary', $value);
        }

        if (!empty($value = $request->specialization)) {
            $query->where('specialization ', $value);
        }

        if (!empty($min_age = $request->min_age) && (!empty($max_age = $request->max_age)) ) {
            $query->whereBetween('age', [$min_age, $max_age]);
        }

        $cvs = $query->with(
            [
            'previosExpirience'
            ]
        )->paginate(2);
        return $cvs;
    }

    /**
     * remove cv
     */
    public function remove($cv_id) : void
    {
        $cv = Cv::findOrFail($cv_id);
        $cv->delete();
    }
}
