<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',

    ];

    // Mutetor // Working this name string style
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
