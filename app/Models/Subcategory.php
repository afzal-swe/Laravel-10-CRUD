<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id ',
        'subcategory_name',
        'subcategory_slug',
    ];

    //__ BelongsTo__//
    public function category() // function name mone rakhar jonno j model er satha query hoba oi numbe dibo
    {
        return $this->belongsTo(Category::class, 'category_id');  // foreng key
    }
}
