<?php

namespace App\Models\Traits;

trait RouteSluggable
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
