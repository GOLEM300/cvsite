<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Carbon;

class Cv extends Model
{
    use HasFactory;

    protected $guarded = [];

    const UPDATED_AT = null;

    public static $months = [
        '01' => 'Январь',
        '02' => 'Февраль',
        '03' => 'Март',
        '04' => 'Апрель',
        '05' => 'Май',
        '06' => 'Июнь',
        '07' => 'Июль',
        '08' => 'Август',
        '09' => 'Сентябрь',
        '10' => 'Октябрь',
        '11' => 'Ноябрь',
        '12' => 'Декабрь'
    ];

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'cv';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class, 'cv_id', 'id');
    }

    /**
     * 
     */
    public function prevYears($id) : string
    {
        $total = 0;

        if ($this->expirience == 'yes') {
            $prevExps = PreviosExpirience::where('cv_id', $id)->get();
            foreach ($prevExps as $prevExp) {
                $total += $prevExp->totalYears();
            };
            if ((int)$total < 21) {
                return 'Опыт работы '.$total.' лет';
            } else {
                return 'Опыт работы '.$total.' года';
            }
        } else {
            return 'Нет опыта работы';
        }
    }

    /**
     * 
     */
    public function fullExpirience($id) : string
    {
        $total = [];

        if ($this->expirience == 'yes') {
            $prevExps = PreviosExpirience::where('cv_id', $id)->get();
            foreach ($prevExps as $prevExp) {
                array_push($total,$prevExp->dateDiff());
            };
        }
        return date_sum($total);
    }

    /**
     * 
     */
    public function prevWorks($id) : object
    {
        $prevWorks = PreviosExpirience::where('cv_id', $id)->get();
        return $prevWorks;
    }

    /** return cvs collection
     *  
     */
    public function getCvs($id) : object
    {
        return self::where('user_id', $id)->get();
    }

    /**
     * 
     */
    public function fullName() : string
    {
        return $this->patronymic.' '.$this->name.' '.$this->lastname;
    }

    /**
     * 
     */
    public function age() : string
    {
        $age = Carbon::parse($this->birth_date)->age;
        if ($age < 21) {
            return $age.' лет';
        } else {
            return $age.' года';
        }
    }

    /**
     * 
     */
    public function busyness($id) : string
    {
        $total = [];

        $lists = Busyness::where('cv_id', $id)->pluck('name');
        foreach ($lists as $key => $value) 
        {
            $total[$key] = $value;
        }
        return implode(', ',$total);
    }

    /**
     * 
     */
    public function sheduleType($id) : string
    {
        $total = [];
        
        $lists = SheduleType::where('cv_id', $id)->pluck('name');
        foreach ($lists as $key => $value) 
        {
            $total[$key] = $value;
        }
        return implode(', ',$total);
    }

    /**
     * 
     */
    public function published_at() : string
    {
        $monthName = self::$months[$this->created_at->format('m')];
        $day = $this->created_at->format('d');
        $year = $this->created_at->format('Y');
        $time = $this->created_at->format('H:m');

        return "Опубликовано ".$day.' '.$monthName.' '.$year. ' в '.$time;
    }
}
