<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;


class Product_Post extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'user_id',
    //     'category_id',
    //     'subcategory_id',
    //     'title',
    //     'slug',
    //     'post_date',
    //     'image',
    //     'description',
    //     // 'tags',
    //     // 'status',

    // ];
    protected $guarded = [];

    //__ BelongsTo__// join with Category
    public function category() // function name mone rakhar jonno j model er satha query hoba oi numbe dibo
    {
        return $this->belongsTo(Category::class, 'category_id');  // foreng key
    }

    // Join With Subcategory //
    public function subcategory() // function name mone rakhar jonno j model er satha query hoba oi numbe dibo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');  // foreng key
    }

    // Join with user id //
    public function user() // function name mone rakhar jonno j model er satha query hoba oi numbe dibo
    {
        return $this->belongsTo(User::class, 'user_id');  // foreng key
    }
}
