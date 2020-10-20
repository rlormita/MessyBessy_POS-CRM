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
                            </div>
                            <div class="createAccount-btn">
                                <a href="{{ route('employee.create') }}" class="btn btn-primary card-shadow-hover">
                                    + Admin Account
                                    <i class="far fa-chevron-right"></i>
                                </a>
                            </div>

                            <div class="login-btn">
                                <a href="{{ route('cashier.index') }}" class="btn btn-primary card-shadow-hover">
                                    View Cashiers
                                    <i class="far fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')

                            <div class="">
                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <th scope="col">{{ __('Profile Image') }}</th>
                                        <th scope="col">{{ __('First Name') }}</th>
                                        <th scope="col">{{ __('Last Name') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col">{{ __('Created at') }}</th>
                                        <th scope="col">{{ __('Updated at') }}</th>
                                        <th scope="col">{{ __('Last Login') }}</th>
                                        <th scope="col"></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    @if (is_null($user->profile_image))
                                                           <center> <img src="{{ asset('img/user/default.jpg') }}" style="width:50px; height:50px; border-radius:50%;"> </center>
                                                    @else
                                                            <center><img src="{{ asset('./img/uploads/profile_image/'.$user->profile_image) }}" style="width:50px; height:50px; border-radius:50%;" /> </center>
                                                    @endif
                                                </td>
                                                <td>{{ $user->firstName }}</td>
                                                <td>{{ $user->lastName }}</td>
                                                <td>
                                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                </td>
                                                <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $user->last_login_at }}</td>
                                                <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="tim-icons icon-settings-gear-63"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                @if (Auth::user()->id != $user->id)
                                                                <form action="{{ route('employee.destroy', $user) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                                                                                {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                                @else
                                                                <a class="dropdown-item" href="{{ route('profile.edit', $user->id) }}">{{ __('Edit') }}</a>
                                                                @endif
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
                                {{ $users->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
