<?php

namespace App\Http\Resources;

use App\Models\Cv;
use App\Repositories\PrevWorksInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class CvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return parent::toArray($request);
        // return [
        //     'ss' => []//self::$prevWorksExp->getPrevWorksExp($this->id)->toArray()
        // ];
    }
}
