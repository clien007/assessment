<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_number', 'color', 'logo'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
