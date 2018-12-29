<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
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
            'word' => $this->word,
            'transcription' => $this->transcription,
            'translation' => $this->translation,
            'translation_yandex' => $this->translation_yandex,
            'oxfordNormalized' => $this->oxfordNormalized,
            'isFavorite' => $this->isFavorite,
        ];
    }
}
