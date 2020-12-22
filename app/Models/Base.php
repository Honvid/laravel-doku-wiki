<?php

namespace App\Models;

use App\Models\Traits\IncrementDecrementTrait;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use IncrementDecrementTrait;
}
