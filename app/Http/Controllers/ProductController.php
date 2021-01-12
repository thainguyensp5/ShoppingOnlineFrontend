<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id',0)->get();
        $categoryLimit = Category::where('parent_id',0)->take(3)->get();
        $productRecommended = Product::latest()->take(9)->get();
        $product = Product::where('id', $id)->first();
        
        return view('product.product_detail', compact('sliders', 'categoryLimit', 'productRecommended', 'categorys','product'));
    }
}
