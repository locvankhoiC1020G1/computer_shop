@extends('shop.master')
@section('title','Home')
@section('content')
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                       <img src="{{asset('shop/img/logo.png')}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <form action="{{route('shop.search')}}" method="get">
                            <input type="text" placeholder="Search" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a>
                        <a href="{{route('cart.index')}}" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{ (session()->has('cart')) ? session()->get('cart')->totalQuantity : 0 }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-plus-square"></i>New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-server"></i>VGA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-mouse-pointer"></i>Mouse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-keyboard"></i>Key Board</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img style="width: 600px; height: 400px" src="https://www.zotac.com/download/files/styles/w1024/public/product_gallery/graphics_cards/zt-t20810b-10p_image01_rgb_0.jpg?itok=kah3I5-H" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Play hard stay silient</p>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img style="width: 600px; height: 400px" src="https://i.ytimg.com/vi/E_QmJjQxxlA/maxresdefault.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Customer your PC</p>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img style="width: 600px; height: 400px" src="https://photo2.tinhte.vn/data/attachment-files/2020/09/5136088_Tinhte_30902.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>8K gaming</p>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img style="width: 400px; height:300px" src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSWz9XEg_ThRYF5uqsDWpJas1uV_l-pjgEPiUyq0qppH-tlJX86SK6WMPn7b8xtmrEdOOyyczq0y_yaG-fF2Vb2N2UJjoXeOkkXQ9z9Gh0vKs5b9kYXbaa9Hw&usqp=CAE" />
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img style="width: 400px; height:300px"  src="https://anphat.com.vn/media/product/32305_pic19400000000006810.jpg" />
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row">
                @foreach($products as $key=>$product)
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">{{$product->name}}</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                           <div class="product-image">
                            <a href="product-detail.html">
                                <img src="{{asset('storage/'.$product->image)}}" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a class="btn" href="{{ route('cart.addToCart', $product->id) }}" onclick="return alert('đã thêm sản phẩm vào giỏ hàng') "><i class="fa fa-cart-plus"></i></a>
                                <a href="{{route('detail',$product->id)}}"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>{{$product->price}}</h3>
                            <a class="btn" href="{{ route('cart.addToCart', $product->id) }}" onclick="return alert('đã thêm sản phẩm vào giỏ hàng')"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
