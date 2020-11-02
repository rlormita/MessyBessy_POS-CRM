@extends('dashboard.dashboard', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

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
                <strong>Categories</strong> Overview
            </h3>
            <div class="overview-new">
                <button class="new-item" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i>
                    <span>New Category</span>
                </button>
            </div>
        </div>
        @include('alerts.success')
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            Name
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Product Count
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Stock Count
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Defective Stock Count
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Product Average Price
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            Actions
                        </span>
                    </div>
                </div>
                @foreach($categories as $category)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            {{ $category->name }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ count($category->products) }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ round($category->products->sum('stock_qty')) }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ round($category->products->avg('minimum_stock')) }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ round($category->products->avg('price')) }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                <i class="far fa-eye"></i>
                            </a>
                        </span>
                        <span class="col-title">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                <i class="far fa-edit"></i>
                            </a>
                        </span>
                        <span class="col-title">
                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this category? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('categories.store') }}" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <div class="modal-action">
                            <a @click="hideModal" class="close-btn" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" id="name" required pattern="\S+.*" value="{{ old('name') }}">
                            <label for="name">Name</label>
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