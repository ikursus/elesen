<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    // protected $table = 'licenses';

    # Data yang dibenarkan masuk ke table licenses
    protected $fillable = [
        'category_id',
        'tarikh_mula',
        'tarikh_tamat',
        'provider',
        'remarks',
        'status'
    ];

    # Relationship one to one (inverse)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
