<div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

        @foreach($productRecommended as $keyRecommended => $productRecommendedItem)
            
            @if($keyRecommended % 3 === 0)
            <div class="item {{$keyRecommended === 0 ? 'active' : ''}}">
            @endif
                <a href="{{route('product.detail', ['id' => $productRecommendedItem->id])}}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{config('app.base_url'). $productRecommendedItem->feature_image_path}}" alt="" style="width: 150px; height:75px;" />
                                <h2>{{number_format($productRecommendedItem->price)}} VNĐ</h2>
                                <p>{{$productRecommendedItem->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i 
                                class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                </a>
            @if($keyRecommended % 3 === 2)
            </div>
            @endif
        @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>