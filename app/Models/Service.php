<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function scopeActive($query)
    {
        return $query->where('status', 1); // Adjust the column name as needed
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
    public function innerService()
    {
        return $this->hasMany(InnerService::class);
    }
}
