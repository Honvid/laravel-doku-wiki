<?php

namespace App\Http\Controllers;

use App\Models\Base;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * View Counter
     *
     * @param Base $object
     */
    protected function viewIncrement($object)
    {
        $view_key  = 'view-key-' . ip2long(request()->ip()) . '-' . $object->id;
        $view_flag = Cache::get($view_key);
        if (is_null($view_flag)) {
            $object->increments($object, 'view_count');
            Cache::put($view_key, true, now()->addMinutes(30));
        }
    }
}
