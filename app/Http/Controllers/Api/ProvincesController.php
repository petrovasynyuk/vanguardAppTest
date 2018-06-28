<?php

namespace Vanguard\Http\Controllers\Api;

use Vanguard\Repositories\Province\ProvinceRepository;
use Vanguard\Transformers\ProvinceTransformer;

/**
 * Class ProvincesController
 * @package Vanguard\Http\Controllers\Api
 */
class ProvincesController extends ApiController
{
    /**
     * @var CountryRepository
     */
    private $provinces;

    public function __construct(ProvinceRepository $provinces)
    {
        $this->provinces = $provinces;
    }

    /**
     * Get list of all available provinces.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respondWithCollection(
            $this->provinces->all(),
            new ProvinceTransformer
        );
    }

    public function list()
    {
        return $this->respondWithCollection(
            $this->provinces->lists(),
            new ProvinceTransformer
        );
    }

    public function listByCountryId()
    {
        return $this->provinces->listByCountryId();
    }
}
