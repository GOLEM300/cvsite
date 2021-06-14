<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SheduleType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'shedule_types';

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
