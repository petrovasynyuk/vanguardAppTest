<?php

namespace Vanguard\Http\Controllers\Api;

use Vanguard\Repositories\Amphure\AmphureRepository;
use Vanguard\Transformers\AmphureTransformer;

/**
 * Class AmphuresController
 * @package Vanguard\Http\Controllers\Api
 */
class AmphureController extends ApiController
{
    /**
     * @var AmphureRepository
     */
    private $amphures;

    public function __construct(AmphureRepository $amphures)
    {
        $this->middleware('auth');
        $this->amphures = $amphures;
    }

    /**
     * Get list of all available amphures.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respondWithCollection(
            $this->amphures->all(),
            new AmphureTransformer
        );
    }

    public function list()
    {
        return $this->respondWithCollection(
            $this->amphures->lists($provinceId),
            new AmphureTransformer
        );
    }

    public function listByProvinceId($provinceId)
    {
        return $this->amphures->listByProvinceId($provinceId);
    }
}
