<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['categoryName', 'parent_id'];
    

    public function products()
    {
        return $this->hasMany(Product::class);
    }
   
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    
    public function allProducts()
    {
        return $this->products->concat($this->subcategories->flatMap->allProducts());
    }
}
