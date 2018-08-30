<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    # Tetapan nama table yang perlu dihubungi
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'kod',
    ];

    # Relationships table category kepada table licenses
    public function senarai_licenses()
    {
        return $this->hasMany(License::class);
    }


}
