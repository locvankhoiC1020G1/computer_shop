@extends('layouts.master')
@section('title','List')
@section('content')
    <a href="{{route('product.create')}}" class="btn-success">Create Product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$product['name']}}</td>
                <td>{{$product['description']}}</td>
                <td>{{$product['price']}}</td>
                <td><img src="{{asset('storage/'.$product->image)}}" alt="ảnh lỗi" width="10%"></td>
                <td><a href="{{route('product.edit',$product->id)}}" class="btn-warning">Sửa</a><a
                        href="{{route('product.delete',$product->id)}}" class="btn-danger" onclick="confirm('Are you sure')">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
