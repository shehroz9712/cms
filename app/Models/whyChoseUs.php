<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whyChoseUs extends Model
{
    use HasFactory;
    public function scopeActive($query)
    {
        return $query->where('status', 1); // Adjust the column name as needed
    }
    public function scopeChoseUs($query)
    {
        return $query->where(['status' => 1, 'section' => 1]); // Adjust the column name as needed
    }
    public function scopeCounter($query)
    {
        return $query->where(['status' => 1, 'section' => 0]); // Adjust the column name as needed
    }
}
