<?php

namespace Modules\Attachments\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AttachmentableResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'path' => env('APP_URL').$this->path,
            'mime' => $this->mime
        ];
    }
}
