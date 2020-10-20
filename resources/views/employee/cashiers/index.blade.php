@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--7">
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
    </div>
@endsection
