@extends('layouts.app')

@section('content')

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <img style="width: 90%;" src="{{ asset('img/icon.png') }}" />
            </div>
            <div class="sidebar-brand-text mx-3">EasyBessy Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>


        <div class="nav-items">
            <!-- Nav Item - Product Menu -->
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/products')}}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Products</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/categories')}}">
                    <i class="fas fa-table"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/stocks')}}">
                    <i class="fas fa-table"></i>
                    <span>Stocks</span>
                </a>
            </li>
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/branches')}}">
                    <i class="fas fa-table"></i>
                    <span>Branches</span>
                </a>
            </li>
        </div>

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Employee Management') }}</h3>
                                <h4 class="mb-0">{{ __('Cashiers') }}</h4>
                            </div>
                            <div class="createAccount-btn">
                            <a href="{{ route('cashier.create') }}" class="btn btn-primary card-shadow-hover">
                                    + Cashier
                                    <i class="far fa-chevron-right"></i>
                                </a>
                            </div>

                            <div class="login-btn">
                            <a href="{{ route('cashier_role.view')}}" class="btn btn-primary card-shadow-hover">
                                    View Cashier Roles
                                    <i class="far fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')

                            <div class="">
                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <th scope="col">{{ __('Cashier Role') }}</th>
                                        <th scope="col">{{ __('First Name') }}</th>
                                        <th scope="col">{{ __('Last Name') }}</th>
                                        <th scope="col">{{ __('Phone') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col">{{ __('Created at') }}</th>
                                        <th scope="col">{{ __('Updated at') }}</th>
                                        <th scope="col">{{ __('Last Login') }}</th>
                                        <th scope="col"></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cashiers as $cashier)
                                            <tr>
                                            <td>{{ $cashier->cashier_role_id}}</td>
                                                <td>{{ $cashier->firstName }}</td>
                                                <td>{{ $cashier->lastName }}</td>
                                                <td>{{ $cashier->phone}}</td>
                                                <td>
                                                    <a href="mailto:{{ $cashier->email }}">{{ $cashier->email }}</a>
                                                </td>
                                                <td>{{ $cashier->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $cashier->updated_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $cashier->last_login_at }}</td>
                                                <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="tim-icons icon-settings-gear-63"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                                <form action="{{ route('employee.destroy', $user) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                                                                                {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $cashiers->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
