
<div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products">
                            <div class="row justify-content-center">
                                @php
                                $products=App\Models\Product::all();
                             

                               
                                @endphp
                                @foreach($products as $product)
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product product-11 text-center">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{!empty($product->image)? url('upload/product_image/'.$product->image) : url('upload/no_image.jpg')}}" alt="Product image" class="product-image">
                                                <img src="{{!empty($product->image)? url('upload/product_image/'.$product->image) : url('upload/no_image.jpg')}}" alt="Product image" class="product-image-hover">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$product->category->name}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">{{$product->name}}</a></h3><!-- End .product-title -->
                                            @php 

                                            $productPrice=$product->selling_price-$product->discount_price;
                                            
                                            @endphp
                                            
                                            <div class="product-price">
                                                {{$productPrice}}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                @endforeach

                            
                </div><!-- End .tab-content -->
                </div><!-- End .container -->