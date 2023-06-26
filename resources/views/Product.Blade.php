<div class="product  ">
    <a href="{{route('Detail').'/'.$item->id}}">
        <div class="product-img">
            <img style="width:80%,margin:0 auto" src="/uploads/Product/{{$item->image_url}}" alt="">
            <div class="product-label">
                <span class="sale">-5%</span>
                <span class="new">NEW</span>
            </div>
        </div>
        <div class="product-body">
            <p class="product-category">{{$item->category->category_name}}</p>
            <h3 class="product-name"><a href="#">{{Str::limit($item->product_name ,$limit = 50, $end = '...')}}</a></h3>
            <h4 class="product-price">{{number_format($item->price)}}<del class="product-old-price">{{number_format($item->price -$item->price*5/100)}}</del></h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="product-btns">
                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
            </div>
        </div>
        <div class="add-to-cart">
            <a href="{{route('AddToCart').'/'.$item->id}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
        </div>
    </a>
</div>