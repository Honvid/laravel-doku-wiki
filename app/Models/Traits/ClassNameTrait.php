<?php

namespace App\Models\Traits;

trait ClassNameTrait
{
    public function getClassName()
    {
        return self::class;
    }
}