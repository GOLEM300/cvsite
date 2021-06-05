<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model 
{
    protected $table = 'cv_photo';

    public $timestamp = false;

    protected $fillable = ['file'];
}