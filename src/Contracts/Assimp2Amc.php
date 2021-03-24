<?php

namespace SoipoServices\Assimp2Amc\Contracts;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SoipoSoiposervices\Assimp2Amc\Assimp2Amc
 */
class Assimp2Amc extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'assimp2amc';
    }
}
