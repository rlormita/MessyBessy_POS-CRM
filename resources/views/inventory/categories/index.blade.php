@extends('layouts.app', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
<div class="sidenav">
    <a href="{{ route('categories.index') }}"> Categories </a>
    <a href="{{ route('products.index') }}"> Products </a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Categories</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">New Category</a>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Name</th>
                                <th scope="col">products</th>
                                <th scope="col">Total Stock</th>
                                <th scope="col">Defective Stock</th>
                                <th scope="col">Average Price of Product</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ count($category->products) }}</td>
                                    <td>{{ $category->products->sum('stock') }}</td>
                                    <td>{{ $category->products->sum('stock_defective') }}</td>
                                    <td>{{ $category->products->avg('price') }}</td>


                                    <td class="td-actions text-right">
                                        <a href="{{ route('categories.show', $category) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
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
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $categories->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @endsection