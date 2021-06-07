<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Specialization extends Model
{
    use HasFactory;

    protected $table = 'specializations';

    public $timestamps = false;

    public function list() : object
    {
        $specialization_name = DB::table('specializations')->pluck('specialization','id');
        return $specialization_name;
    }

}
