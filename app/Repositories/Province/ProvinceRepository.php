<?php

namespace Vanguard\Repositories\Province;

interface ProvinceRepository
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

    public function listByCountryId($column = 'name_th', $key = 'id');
}
