<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use App\Models\Cashier;
use App\Http\Requests\BranchRequest;
use App\Http\Controllers\CashierController;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.assAS
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branch::paginate(25);
        $cashiers = Cashier::paginate(25);

        return view('branches.index', compact('branches','cashiers'));
    }

    /**
     * Show the form for crfgfeating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashiers = Cashier::all();
        return view('branches.create', compact('cashiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request, branch $branch)
    {
        $branch->create($request->all());

        return redirect()
            ->route('branches.index')
            ->withStatus('Branch successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(branch $branch)
    {
        return view('branches.show',  [
            'branch' => $branch,
            'cashiers'=> Cashier::where('cashier_id', $branch->id)->paginate(25)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\dResponse
     */
    public function update(BranchRequest $request, branch $branch)
    {
        $branch->update($request->all());

        $branch->branch_name = $request->branch_name;
        $branch->branch_street = $request->branch_street;
        $branch->branch_city = $request->branch_city;
        $branch->branch_state = $request->branch_state;
        $branch->branch_post_code = $request->branch_post_code;
        $branch->branch_country =  $request->branch_country;
        $branch->branch_contact_number = $request->branch_contact_number;
        $branch->branch_operating_hours = $request->branch_operating_hours;
        $branch->branch_other_info = $request->branch_other_info;

        return redirect()
            ->route('branches.index')
            ->withStatus('Branch successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(branch $branch)
    {
        $branch->delete();

        return redirect()
            ->route('branches.index')
            ->withStatus('Branch successfully deleted');
    }
}
