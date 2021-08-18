<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Traits\ForwardsCalls;

class LitNavigationResource extends JsonResource
{
    use ForwardsCalls;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return array_merge(
            $this->translation[app()->getLocale()],
            [
                'route'    => $this->route->route(),
                'active'   => $this->active,
                'children' => self::collection($this->children),
            ]
        );
    }
}
