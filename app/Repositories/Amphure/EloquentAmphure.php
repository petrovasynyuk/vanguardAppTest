<?php

namespace Vanguard\Repositories\Amphure;

use Vanguard\Amphure;

class EloquentAmphure implements AmphureRepository
{
    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name_th', $key = 'id')
    {
        return Amphure::orderBy('name_th')->pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Amphure::all();
    }

    public function listByProvinceId($provinceId, $column = 'name_th', $key = 'id')
    {
        return Amphure::where('province_id', $provinceId)->orderBy('name_th')->pluck($column, $key);
    }
}
