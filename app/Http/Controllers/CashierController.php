<?php

namespace App\Http\Controllers;
use App\Models\Cashier;
use App\Models\branch;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CashierRequest;
use App\Models\CashierRole;
use Illuminate\Http\Request;

class CashierController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function view(Cashier $model)
    {
        $cashiers = Cashier::paginate(25);
        $branches = Branch::paginate(25);
        $roles = CashierRole::paginate(25);
        return view('employee.cashiers.index', compact('cashiers', 'branches', 'roles'));
    }

    public function create(branch $model)
    {
        $branches = Branch::paginate(25);
        return view('employee.cashiers.create', compact('branches'));
    }

    public function store(CashierRequest $request, Cashier $model)
    {
        $model->branch_id = $request->branch_id;
        $model->cashier_role_id = $request->cashier_role_id;
        $model->username = $request->username;
        $model->firstName = $request->firstName;
        $model->lastName = $request->lastName;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->password = Hash::make($request->password);

        $model->save();

        return redirect()
            ->route('cashier.view')
            ->withStatus('Product successfully registered.');
    }

    public function destroy(cashier $cashier)
    {
        $cashier->delete();

        return redirect()
            ->route('cashier.view')
            ->withStatus('Cashier successfully deleted');
    }

}
