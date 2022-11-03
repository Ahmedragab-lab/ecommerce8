<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Wishlist</span></li>
            </ul>
        </div>
        <style>
             .product-wish{
                position: absolute;
                top: 10%;
                left: 0;
                z-index: 99;
                right: 30px;
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color: #cbcbcb;
                font-size: 32px;
            }
            .product-wish .fa:hover{
                color: #ff7007;
            }
              .fill-heart{
                color: #ff7007 !important;
              }
        </style>
        <div class="row">
            @if (Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @foreach(Cart::instance('wishlist')->content() as $product)
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details',$product->model->slug) }}" title="{{ $product->model->product_name }}">
                                    <figure><img src="{{ asset('assets/images/products/'. $product->model->image) }}" alt="{{ $product->model->product_name }}"></figure>
                                </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('product.details',$product->model->slug) }}" class="product-name"><span>{{ $product->model->product_name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{ $product->model->original_price }}</span></div>
                                    <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="moveProductFromWishlistToCart('{{ $product->rowId }}')">
                                        Move To Cart
                                    </a>
                                    <div class="product-wish">
                                        <a href="#" wire:click.prevent=" removeWishlist({{ $product->model->id }}) ">
                                            <i class="fa fa-heart fill-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h4> No items in wishlist </h4>
            @endif
        </div>
    </div>
</main>
