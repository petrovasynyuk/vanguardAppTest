<?php

namespace Vanguard\Transformers;

use League\Fractal\TransformerAbstract;
use Vanguard\District;

class DistrictTransformer extends TransformerAbstract
{
    public function transform(District $district)
    {
        return [
            'id' => (int) $district->id,
            'name' => $district->name_th
        ];
    }
}
