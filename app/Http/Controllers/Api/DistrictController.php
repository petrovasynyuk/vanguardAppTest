<?php

namespace Vanguard\Http\Controllers\Api;

use Vanguard\Repositories\District\DistrictRepository;
use Vanguard\Transformers\DistrictTransformer;

/**
 * Class DistrictController
 * @package Vanguard\Http\Controllers\Api
 */
class DistrictController extends ApiController
{
    /**
     * @var CountryRepository
     */
    private $districts;

    public function __construct(DistrictRepository $districts)
    {
        $this->districts = $districts;
    }

    /**
     * Get list of all available districts.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respondWithCollection(
            $this->districts->all(),
            new DistrictTransformer
        );
    }

    public function list()
    {
        return $this->respondWithCollection(
            $this->districts->listByAmphureId($amphureId),
            new DistrictTransformer
        );
    }

    public function listByAmphureId($amphureId)
    {
        return $this->districts->listByAmphureId($amphureId);
    }
}
