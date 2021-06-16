<?php

namespace App\Repositories;

interface SheduleTypeInterface {
    
    public function save(array $array, int $cv_id) : void;

    public function update(array $array, int $cv_id) : void;

    public function remove(int $cv_id) : void;
}