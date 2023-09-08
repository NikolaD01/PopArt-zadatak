<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','price','phonenumber','location','user_id','category_id'];

    public function user()
    {
        // our product belongs to User which is conected with user_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
