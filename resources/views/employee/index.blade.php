@extends('dashboard.main', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

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
                <strong>Employees Overview</strong> - Admin  <br>
            </h3>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('register') }}'" class="new-item">
                    <i class="fas fa-plus"></i>
                    <span>Add Employee</span>
                </button>
            </div>
            <div class="overview-new">
                <button onclick="window.location.href='{{ route('cashier.view') }}'" class="new-item">
                    <i class="fas"></i>
                    <span>View Cashier</span>
                </button>
            </div>
        </div>
        <div class="overview-table">
            <div class="table">
                <div class="row row-header">
                    <div class="col">
                        <span class="col-title">
                            {{ __('Profile Image') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('First Name') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Last Name') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Email') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Created at') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Last Login') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ __('Actions') }}
                        </span>
                    </div>
                </div>
                @foreach($users as $user)
                <div class="row">
                    <div class="col">
                        <span class="col-title">
                            @if (is_null($user->profile_image))
                                <img src="{{ asset('img/user/default.jpg') }}" style="width:50px; height:50px; border-radius:50%;">
                            @else
                                <img src="{{ asset('./img/uploads/profile_image/'.$user->profile_image) }}" style="width:50px; height:50px; border-radius:50%;" />
                            @endif
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->firstName }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->lastName }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->email }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">

                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            {{ $user->last_login_at }}
                        </span>
                    </div>
                    <div class="col">
                        <span class="col-title">
                            <span class="col-title">
                                <form action="{{ route('employee.destroy') }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this cashier? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </span>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('employee.create') }}" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee</h5>
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
