<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id', 'image', 'status', 'is_on_home', 'order'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeHome($query)
    {
        return $query->where(['status' => 1, 'is_on_home' => 1]);
    }
    public function scopeMain($query)
    {
        return $query->where(['status' => 1, 'is_on_home' => 0]);
    }
   
}
