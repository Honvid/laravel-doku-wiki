<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait UpdateBy
{
    /**
     * Update the model in the database.
     *
     * @param  array  $attributes
     * @param  array  $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = [])
    {
        if (! $this->exists) {
            return false;
        }

        $attributes['last_modify_at'] = now();
        $attributes['last_modify_by'] = Auth::user()->getAuthIdentifier();

        return $this->fill($attributes)->save($options);
    }
}