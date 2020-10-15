<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $model)
    {
        $users = User::paginate(25);

        return view('employee.view', compact('users'));
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


}
