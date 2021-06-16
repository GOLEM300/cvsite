<?php

namespace App\Repositories;

use App\Models\SheduleType;
use Illuminate\Support\Facades\DB;

class SheduleTypeRepository implements SheduleTypeInterface
{
    /**
     *
     */
    public function save(array $array, int $cv_id) : void
    {
        foreach ($array as $value) {
            $field = new SheduleType();
            $field->name = $value;
            $field->cv_id = $cv_id;
            $field->save();
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

    /**
     *
     */
    public function remove(int $cv_id) : void
    {
        $sheduleType = SheduleType::where('cv_id', $cv_id);
        $sheduleType->delete();
    }
}
