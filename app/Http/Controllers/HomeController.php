<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id',0)->get();
        $categoryLimit = Category::where('parent_id',0)->take(3)->get();
        $products = Product::latest()->take(6)->get();
        $productRecommended = Product::latest()->take(9)->get();
        return view('home.home', compact('sliders','categorys', 'products', 'productRecommended', 'categoryLimit'));
    }
}
 