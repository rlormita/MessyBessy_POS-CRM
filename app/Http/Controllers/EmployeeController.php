<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $model)
    {
        $users = User::paginate(25);

        return view('employee.index', compact('users'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function destroy($user)
    {
        $user = User::find($user);

        $user->delete();

        return back()->withStatus('User successfully deleted.');
    }

    /* Show all employees - Ding */
    public function result() {
        return EmployeeResource::collection(User::all());
    }


}
