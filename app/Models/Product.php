<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'name',
        'price',
        'discount',
        'label_id',
        'slug',
        'media',
        'head_photo',
        'head_photo_back',
        'size',
        'store',
        'color',
        'phone',
        'is_active',
        'category_id',
        'description',
        'link',
    ];

    /**
     * Set the media attribute.
     *
     * @param  array  $value
     * @return void
     */
    public function setMediaAttribute($value)
    {
        $this->attributes['media'] = json_encode($value);
    }

    /**
     * Get the media attribute.
     *
     * @param  string  $value
     * @return array
     */
    public function getMediaAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Get the category associated with the product.
     */
    public function categories()
    {
        return $this->belongsTo(categories::class);
    }
    public function label()
    {
        return $this->belongsTo(Label::class, 'labels_id');
    }
}
