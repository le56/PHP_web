<style>
    .nk-post-image img {
        height: 100px !important;
        object-fit: cover;
        object-position: top center;
    }
    .nk-product-price {
        margin-bottom: 0.5rem !important;
        margin-top: 0.5rem !important;
    }
</style>
<li>
    <span class="nk-cart-toggle">
        <span class="fa fa-shopping-cart"></span>
        @if(auth()->check())
        <span id="quantity-cart-header" class="nk-badge"
            ><?php echo count($cartsHeader); ?></span
        >
        @else
        <span id="quantity-cart-header" class="nk-badge">0</span>
        @endif
    </span>
    <div class="nk-cart-dropdown" >
        <div id="list-cart-header">
        @if(auth()->check()) @forelse ($cartsHeader as $item)
        <div class="nk-widget-post" item-delete-cart-header="{{$item->id}}">
            <a
                href="{{asset('/product')}}/{{$item->product->id}}"
                class="nk-post-image"
            >
                <img
                    src="{{ asset('public/images/'.$item->product->image0) }}"
                    alt="{{$item->product->title}}"
                />
            </a>
            <h3 class="nk-post-title">
                <a
                    href="#"
                    data-delete-cart-header="{{$item->id}}"
                    class="nk-cart-remove-item"
                    ><span class="ion-android-close"></span
                ></a>
                <a href="{{asset('/product')}}/{{$item->product->id}}"
                    >{{$item->product->title}}</a
                >
            </h3>
            <div class="nk-product-price">
                <b>Price :</b> $ {{$item->product->price}}
            </div>
            <div class="nk-product-price nk-product-quantity">
                <b>Quantity :</b>{{$item->quantity}}
            </div>
        </div>
        @empty
        <h3 class="pt-3 pl-3 text-empty">
            Cart list is empty ! <a href="{{asset('/catalog')}}">Add now !</a>
        </h3>
        
        @endforelse
        </div>
        <div class="nk-gap-2"></div>
        <div class="text-center">
            <a
                href="{{asset('/checkout')}}"
                class="
                    nk-btn
                    nk-btn-rounded
                    nk-btn-color-main-1
                    nk-btn-hover-color-white
                "
                >Proceed to Checkout</a
            >
        </div>
        @else
        <h4 style="margin-bottom: -10px; color:#dd163b;text-align: center;"><b class="pt-2 pl-2">Please login</b></h4>
        
        @endif
        
    </div>
</li>
