<?php

namespace App\Models;

use App\Models\Traits\RouteSluggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicity extends Model
{
    use HasFactory, RouteSluggable, Sluggable;

    protected $fillable = [
        'title',
        'url',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title'],
            ],
        ];
    }
}
