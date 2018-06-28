<?php

namespace Vanguard\Repositories\Province;

use Vanguard\Province;

class EloquentProvince implements ProvinceRepository
{
    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name_th', $key = 'id')
    {
        return Province::orderBy('name_th')->pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Province::all();
    }

    public function listByCountryId($column = 'name_th', $key = 'id')
    {
        return Province::orderBy('name_th')->pluck($column, $key);
    }
}
