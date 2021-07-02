<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;

class Cv extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [];

    protected $dates = ['birth_date'];

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

    protected $table = 'cv';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class, 'cv_id', 'id');
    }

    public function busyness()
    {
        return $this->hasMany(Busyness::class);
    }

    public function sheduleType()
    {
        return $this->hasMany(SheduleType::class);
    }

    public function previosExpirience()
    {
        return $this->hasMany(PreviosExpirience::class);
    }

    /** get full expirience with years from previous jobs
     *
     */
    public static function prevYears(string $expirience, ?array $prevWorksExp) : int
    {
        $total = 0;
        if ($expirience == 'yes' && (!is_null($prevWorksExp))) {
            foreach ($prevWorksExp as $prevExp) {
                $total += PreviosExpirience::totalYears($prevExp);
            };
            return $total;
        } else {
            return $total;
        }
    }

    /** get full expirience with months and years from previous jobs
     *
     */
    public function fullExpirience() : string
    {
        $total = [];

        if ($this->expirience == 'yes') {
            $prevWorksExp = $this->getRelation('previosExpirience');
            foreach ($prevWorksExp as $prevExp) {
                array_push($total, $prevExp->dateDiff());
            };
        }
        return date_sum($total);
    }

    /** get full user name
     *
     */
    public function fullName() : string
    {
        return $this->patronymic.' '.$this->name.' '.$this->lastname;
    }

    /** calculate user age with Carbon
     *
     */
    public static function age(string $birth_date) : int
    {
        $age = Carbon::parse($birth_date)->age;
        return $age;
    }

    /** get data from array and transform it into string
     * 
     */
    public function transform(string $relation) : string
    {
        $total = [];

        $data = $this->getRelation($relation)->toArray();
        foreach ($data as $key => $value) {
            $total[$key] = $data[$key]['name'];
        }

        return implode(', ', $total);
    }

    /** date and time there cv was published
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

    /** date and time there cv was updated
     *
     */
    public function updated_at() : string
    {
        $monthName = self::$months[$this->updated_at->format('m')];
        $day = $this->updated_at->format('d');
        $year = $this->updated_at->format('Y');
        $time = $this->updated_at->format('H:m');

        return "Обновлено  ".$day.' '.$monthName.' '.$year. ' в '.$time;
    }
}
