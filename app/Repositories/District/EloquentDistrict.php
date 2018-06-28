<?php

namespace Vanguard\Repositories\District;

use Vanguard\District;

class EloquentDistrict implements DistrictRepository
{
    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name_th', $key = 'id')
    {
        return District::orderBy('name_th')->pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return District::all();
    }

    public function listByAmphureId($amphureId, $column = 'name_th', $key = 'id')
    {
        return District::where('amphure_id', $amphureId)->orderBy('name_th')->pluck($column, $key);
    }
}
