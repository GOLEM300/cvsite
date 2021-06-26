<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busyness extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'busyness';

    protected $guarded = ['id'];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
