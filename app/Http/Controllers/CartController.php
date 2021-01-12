<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function store(Request $request, $id){
        $productId = $request->productid_hidden;
        $product = Product::where('id', $id)->first();
        $data['id'] = $productId;
        $data['qty'] = $request->qty;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['options']['image'] = $product->feature_image_path;
        $data['weight'] = $product->price;
        Cart::add($data);
        return redirect()->route('cart.show_cart');
    }

    public function index(){
        $sliders = Slider::latest()->get();
        $categoryLimit = Category::where('parent_id',0)->take(3)->get();
        return view ('cart.cart_show', compact('sliders','categoryLimit'));
    }

    public function update(Request $request){
        
        $rowId_cart = $request->cart_rowId;
        $quantity = $request->cart_quantity;
        Cart::update($rowId_cart,$quantity);
        return redirect()->route('cart.show_cart');
    }

    public function delete($rowId){
        Cart::update($rowId,0);
        return redirect()->route('cart.show_cart');
    }
}
