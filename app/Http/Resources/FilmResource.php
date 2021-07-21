<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'caratula' => $this->getPath($this->caratula),
            'title' => $this->title,
            'description' => $this->description,
            'novelty' => $this->isNovelty($this->release_date),
            'total' => $this->average($this->rating->sum('rating'), $this->rating->count())
        ];
    }

    public function getPath($param)
    {
        return '/films/' . $param;
    }

    public function isNovelty($param)
    {
        $date = Carbon::today();
        return $param >= $date->subWeeks(3) ? true : false;
    }

    public function average($sum, $count)
    {
        if ($count) {
            $average = $sum / $count;
            return $average;
        }
        return 0;
    }
}
