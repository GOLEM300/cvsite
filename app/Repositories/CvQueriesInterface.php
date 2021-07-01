<?php

namespace App\Repositories;

interface CvQueriesInterface {

    public function getUserCv($cv_id);

    public function getUserCvs($user_id);

    public function getAllCv();

    public function getAllCvWithPaginate(object $request);
    
    public function remove($cv_id);

}