<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SpecializationsRepository implements SpecializationsInterface
{
    
    /**
     * 
     */
    public function list() : object
    {
        $specialization_name = DB::table('specializations')->pluck('specialization','id');
        return $specialization_name;
    }
}