<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(ItemStock::class);
    }
}
