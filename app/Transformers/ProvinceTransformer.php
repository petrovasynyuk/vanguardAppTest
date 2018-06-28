<?php

namespace Vanguard\Transformers;

use League\Fractal\TransformerAbstract;
use Vanguard\Province;

class ProvinceTransformer extends TransformerAbstract
{
    public function transform(Province $province)
    {
        return [
            'id' => (int) $province->id,
            'name' => $province->name_th
        ];
    }
}
