<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'user_id',
        'product_category_id',
        'prod_nm',
        'desc',
        'price',
        'img_path',
        'condition',
    ];

    public function toSearchableArray()
    {
        return [
            'prod_nm' => $this->name,
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
