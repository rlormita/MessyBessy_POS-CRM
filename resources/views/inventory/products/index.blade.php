@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])
@section('content')
<div class="sidenav">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('categories.index') }}"> Categories </a>
    <a href="{{ route('products.index') }}"> Products </a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Products</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">New product</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Category</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Minimum Stocks</th>
                            <th scope="col">Total Sold</th>
                            <th scope="col">Image</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ ($product->price) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->stock_defective }}</td>
                                <td>{{ $product->solds }}</td>
                                <td><img src="{{ url('img/products') }}/{{ ($product->image) }}" width=75; height=75;/></td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end">
                    {{ $products->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection