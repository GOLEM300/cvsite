<?php

namespace App\Repositories;

interface PrevWorksInterface {

    public function save(array $array, int $cv_id) : void;

    public function update(array $array, int $cv_id) : void;

    public function getPrevWorksExp($cv_id) : object;

    public function remove(int $cv_id) : void;
}