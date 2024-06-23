<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'user_id', 'store_number', 'address'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function financials()
    {
        return $this->hasMany(Journal::class)->orderBy('date', 'desc');
    }

    public function getTotalRevenueAttribute()
    {
        return $this->financials->sum('revenue');
    }

    public function getTotalProfitAttribute()
    {
        return $this->financials->sum('profit');
    }
}
