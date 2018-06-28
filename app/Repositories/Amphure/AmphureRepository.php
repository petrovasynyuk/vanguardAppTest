<?php

namespace Vanguard\Repositories\Amphure;

interface AmphureRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name_th', $key = 'id');

    /**
     * Get all available countries.
     * @return mixed
     */
    public function all();

    public function listByProvinceId($provinceId, $column = 'name_th', $key = 'id');
}
