@extends('layouts.app', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

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
            <li style="margin-bottom: 0px !important;" class="nav-item">
                <a style="padding: 15px; padding-bottom:0px" class="nav-link" href="{{url('/employee')}}">
                    <i class="fas fa-table"></i>
                    <span>Employees</span>
                </a>
            </li>
        </div>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Cashier Roles</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('cashier_role.create')}}" class="btn btn-sm btn-primary">New Cashier Role</a>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Cashier Role</th>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->cashier_role_title }}</td>
                                    <td>{{ $role->description }}</td>

                                    <td class="td-actions text-right">
                                        {{-- <a href="{{ route('categories.show', $role) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="far fa-eye"></i>
                                        </a> --}}
                                        <a href="{{ route('cashier_role.edit', $role) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cashier_role.destroy', $role) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Cashier Role" onclick="confirm('Are you sure you want to remove this Cashier Role? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
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
                        {{ $roles->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @endsection
