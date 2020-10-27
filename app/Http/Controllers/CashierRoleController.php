<?php

namespace App\Http\Controllers;

use App\Models\CashierRole;
use App\Http\Requests\CashierRoleRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class CashierRoleController extends Controller
{
    public function view(CashierRole $model)
    {

        $roles = CashierRole::paginate(25);

        return view('employee.cashiers.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('employee.cashiers.roles.create');
    }


    public function edit(CashierRole $role)
    {

        return view('employee.cashiers.roles.edit', compact('role'));
    }

    public function store(CashierRoleRequest $request, CashierRole $role)
    {
        $role->create($request->all());
        return redirect()
            ->route('cashier_role.view')
            ->withStatus('Cashier Role successfully created.');
    }

    public function update(CashierRoleRequest $request, CashierRole $role)
    {
        $role = CashierRole::find($role);

        $data = $this->validate($request, [
            'cashier_role_title' => 'required',
            'description' => 'required',
        ]);


        $role->cashier_role_title = $data['cashier_role_title'];
        $role->description = $data['description'];

        $role->save();

        return redirect()
            ->route('cashier_role.view')
            ->withStatus('Cashier Role successfully updated.');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role = CashierRole::find($role);

        $role->delete();

        return back()->withStatus('Cashier Role successfully deleted.');
    }

}
