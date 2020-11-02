@extends('dashboard.main', ['page' => 'List of Products', 'pageSlug' => 'stocks', 'section' => 'inventory'])

@section('content')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</span>
                @if (is_null(Auth::user()->profile_image))
                <img src="{{ asset('img/user/default.jpg') }}" width="30" style="border-radius:50%;">
               @else
                <img src="{{ asset('./img/uploads/profile_image/'.Auth::user()->profile_image) }}" width="30" style="border-radius:50%;" />
               @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Profile') }}
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('/logout')}}" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<div class="overview-wrapper product-index">
    <div class="overview-content">
        <div class="overview-header">
            <h3 class="overview-header-title">
                <strong>Stocks</strong> Overview
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>Add stock</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            Branch
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Location
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Region
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Sold
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Unsold
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Action
                        </span>
                    </div>
                </div>
                @foreach($branches as $branch)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $branch->branch_name }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $branch->branch_city }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>{{ $branch->branch_state }}</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>10</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <strong>70</strong>
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('stocks.show', $branch->id ) }}">View Stock Level</a>
                        </span>
                    </div>
                </div>
                @endforeach
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Unsold = 69
                        </span><br/>
                        <span class="col-title">
                            Sold = 19
                        </span><br/>
                        <span class="col-title">
                            Total = 79
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('stocks.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Stock</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="product_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                @foreach ($products as $product)
                                    @if($product['id'] == old('document'))
                                        <option value="{{$product['id']}}" selected>{{$product['name']}}</option>
                                    @else
                                        <option value="{{$product['id']}}">{{$product['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-group">
                            <select name="branch_id" id="input-branch" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                            @foreach ($branches as $branch)
                                @if($branch['id'] == old('document'))
                                    <option value="{{$branch['id']}}" selected>{{$branch['branch_name']}}</option>
                                @else
                                    <option value="{{$branch['id']}}" >{{$branch['branch_name']}}</option>
                                @endif
                            @endforeach
                            </select>
                            <label for="description">Branch</label>
                        </div>
                        <div class="form-group">
                            <select name="product_category_id" id="category" required pattern="\S+.*" value="{{ old('product_category_id') }}">
                                <option value="1">Man's Care</option>
                                <option value="2">Home and House Care</option>
                            </select>
                            <label for="category">Category</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="stock_qty" id="stock_count" required pattern="\S+.*" value="{{ old('stock_qty') }}">
                            <label for="stock_count">Stock Count</label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="minimum_stock" id="min_stock" required pattern="\S+.*" value="{{ old('stock_defective') }}">
                            <label for="min_stock">Minimum Stock</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success mt-4">Save</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

<!-- div id="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Stocks</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('stocks.create') }}" class="btn btn-sm btn-primary">Add stock</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Branch</th>
                            <th scope="col">Stocks of Branch</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->branch_name }}</td>
                                <td><a href="{{ route('stocks.show', $branch->id ) }}">View Stock Level</a></td>
                                <td class="td-actions text-right">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end">
                    {{ $branches->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
</div -->