@extends('layouts.master')


<?php

use Gloudemans\Shoppingcart\Facades\Cart;

$baseUrl = config('app.base_url');
?>
@section('title')
<title>Home Page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
<link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection

@section('content')

	
	<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-9 padding-right">

                
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<?php 
			$contents = Cart::content();
			?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@foreach($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{$baseUrl . $content->options->image}}" alt="" width="90px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								<p>ID: {{$content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($content->price)}}</p>
							</td></p>
							</td>
							
							<td class="cart_quantity">
								<form action="{{route('cart.update_quantity')}}" method="get">
								<div class="cart_quantity_button">
								@csrf
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$content->qty}}" autocomplete="off" size="2">
									<input class="form-control" type="hidden" name="cart_rowId" value="{{$content->rowId}}">
									<input class="btn btn-default btn-sm" type="submit" name="update_qty" value="Update">
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
								<?php
									$total = $content->price * $content->qty;
									echo number_format( $total);
								?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('delete.cart', ['id' => $content->rowId ])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
					
				</div>
			</div>
		</div>
	</section>
	
 @endsection

  



