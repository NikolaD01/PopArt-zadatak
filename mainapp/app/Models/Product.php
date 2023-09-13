<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','price','phonenumber','location_id','user_id','category_id','status'];

    public function user()
    {
        // our product belongs to User which is conected with user_id
        return $this->belongsTo(User::class, 'user_id');
    }

    public function  category()
    {
       
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
