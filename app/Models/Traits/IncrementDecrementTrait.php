<?php

namespace App\Models\Traits;

use App\Models\Base;

trait IncrementDecrementTrait
{
    /**
     * @param int|Base $object
     * @param string   $column
     * @param int      $value
     *
     * @return mixed
     */
    public function increments($object, string $column, $value = 0)
    {
        $model = ($object instanceof Base) ? $object : self::find($object);

        return $value === 0 ? $model->increment($column) : $model->increment($column, $value);
    }

    /**
     * @param int|Base $object
     * @param string   $column
     * @param int      $value
     *
     * @return mixed
     */
    public function decrements($object, string $column, $value = 0)
    {
        $model = ($object instanceof Base) ? $object : self::find($object);

        return $value === 0 ? $model->decrement($column) : $model->decrement($column, $value);
    }
}