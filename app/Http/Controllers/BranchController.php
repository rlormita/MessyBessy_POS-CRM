<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use App\Http\Requests\BranchRequest;

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

        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.create');
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
        return view('branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(branch $branch, BranchRequest $request)
    {
        $branch->update($request->all());

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
