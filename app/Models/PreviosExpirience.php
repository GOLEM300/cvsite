<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviosExpirience extends Model
{
    use HasFactory;

    protected $table = 'previous_expirience';

    protected $guarded = ['id'];

    public $timestamps = false;

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

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    /** get full years from one previous job and return it
     *
     */
    public static function totalYears(array $work) : int
    {
        $years = 0;
        if (!array_key_exists('stillWork', $work)) {
            $years = $work['workEndYear'] - $work['workStartYear'];
            return $years;
        }
        $years = date("Y") - $work['workStartYear'];
        return $years;
    }

    /** get interval express to string between start work and end work
     *
     */
    public function period() : string
    {
        $startMonth = self::$months[$this->workStartMonth];
        $endMonth = self::$months[$this->workEndMonth];
        
        if ($this->stillWork == 'off') {
            return $startMonth.' '.$this->workStartYear.' - '.$endMonth.' '.$this->workEndYear;
        } else {
            return $startMonth.' '.$this->workStartYear.' - '.'По настоящее время';
        }
    }

    /** calculate work period express to string with years and months
     *
     */
    public function dateDiff() : string
    {
        $startDate = $this->workStartYear.'-'.$this->workStartMonth;
        if ($this->stillWork == 'off') {
            $endDate = $this->workEndYear.'-'.$this->workEndMonth;
        } else {
            $endDate = date("Y-m");
        }

        $datetime1 = new DateTime($startDate);
        $datetime2 = new DateTime($endDate);
        $interval = $datetime1->diff($datetime2);

        return ltrim($interval->format('%Y'), '0').' лет '.$interval->format('%m').' месяцев';
    }
}
