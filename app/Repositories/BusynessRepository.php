<?php

namespace App\Repositories;

use App\Models\Busyness;

class BusynessRepository implements BusynessInterface
{

    /**
     *
     */
    public function save(array $array, int $cv_id) : void
    {
        foreach ($array as $value) {
            Busyness::create([
                'name' => $value,
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
        $this->save($array,$cv_id);
    }

    /**
     *
     */
    public function remove(int $cv_id) : void
    {
        $busyness = Busyness::where('cv_id', $cv_id);
        $busyness->delete();
    }
}
