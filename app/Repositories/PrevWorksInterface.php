<?php

namespace App\Repositories;

interface PrevWorksInterface {

    public function getPrevWorksExp($cv_id);

    public function getLastWork($cv_id);
}