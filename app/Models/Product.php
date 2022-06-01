<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory , Notifiable;



    protected $fillable = ['name', 'description', 'image', 'subcategory_id', 'price' ];



 protected $appends = ['image_path'];

     public function getImagePathAttribute()
     {
         return asset('storage/' . $this->image);

     }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);

    }

}
