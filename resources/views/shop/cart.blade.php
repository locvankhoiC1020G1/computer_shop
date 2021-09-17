@extends('shop.master')
@section('title','Cart')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Cart</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    @if(isset($cart->items))
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody class="align-middle">

                                    @foreach($cart->items as $key => $value)
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{asset('storage/'.$value['item']->image)}}"
                                                                     alt="Image"></a>
                                                    <p>{{ $value['item']->name }}</p>
                                                </div>
                                            </td>
                                            <td>{{ number_format($value['item']->price) }}</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{$value['quantity']}}" >
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>${{ number_format($value['price']) }}</td>
<!--                                            <td>
                                                <button><i class="fa fa-trash"><a
                                                            href="{{route('cart.deleteToCart',$key)}}"></a></i>
                                                </button>
                                            </td>-->
                                            <td class="action" data-title="Remove"><a class="btn" href="{{route('cart.deleteToCart',$key)}}" onclick="return confirm('Xóa sản phẩm khỏi giỏ hàng?') "><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button>Apply Code</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span>$99</span></p>
                                            <p>Shipping Cost<span>$1</span></p>
                                            <h2>Grand Total<span>$100</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <button>Update Cart</button>
                                            <button>Checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">Không có sản phẩm nào trong giỏ hàng</div>
    @endif
@endsection
