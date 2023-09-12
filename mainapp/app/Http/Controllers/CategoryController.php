<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function delete(Category $category)
    {
        if(!(isset(auth()->user()->isAdmin)))
        {  
            return back()->with('failure','You dont have this permission');
        }
        $category->delete();
        return redirect('/categories')->with('success','Location is deleted');
    }

    public function store(Request $request)
    {       
        if(!(isset(auth()->user()->isAdmin)))
        {  
            return back()->with('failure','You dont have this permission');
        }

        $incomingFields = $request->validate([
            'categoryName' => 'required'
        ]);

        $parentId = $request->get('parentId');
        $incomingFields['categoryName'] = strip_tags($incomingFields['categoryName']);
        $incomingFields['parent_id'] = $parentId;
        Category::create($incomingFields);

        return back()->with('success','You created product !');


    }

    public function viewPage()
    {
        if(!(isset(auth()->user()->isAdmin)))
        {  
            return back()->with('failure','You dont have this permission');
        }
        $categories= Category::all();
        return view('categories', ['categories' => $categories]);
    }
   

    public function showProducts($categoryId)
    {
        $mainCategory = Category::find($categoryId);

        if (!$mainCategory) {
            abort(404); // Category not found
        }

        $products = $mainCategory->allProducts();
        return view('category-products', compact('mainCategory', 'products'));
    } 
    
}

