<?php

namespace Vanguard\Transformers;

use League\Fractal\TransformerAbstract;
use Vanguard\Amphure;

class AmphureTransformer extends TransformerAbstract
{
    public function transform(Amphure $amphure)
    {
        return [
            'id' => (int) $amphure->id,
            'name' => $amphure->name_th
        ];
    }
}
