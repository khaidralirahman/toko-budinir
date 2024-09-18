<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'category',
        'media',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }
}
