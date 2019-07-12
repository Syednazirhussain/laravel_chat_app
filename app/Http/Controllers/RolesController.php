<?php

namespace App\Http\Controllers;

use App\Roles;
use Session;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:3|max:30'
        ]);

        $role = new Roles;
        $role->name = $request->input('name');
        $role->save();

        Session::flash('success', 'Role added successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Roles::findOrFail($id);
        if (empty($role)) {

            Session::flash('error', 'Roles cannot found!');
            return redirect()->route('roles.index');
        }

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::findOrFail($id);
        if (empty($role)) {

            Session::flash('error', 'Role cannot found.');
            return redirect()->route('roles.index');
        }

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|min:3|max:30'
        ]);

        $role = Roles::findOrFail($id);
        if (empty($role)) {

            Session::flash('error', 'Role cannot found.');
            return redirect()->route('roles.index');
        }

        $role->update([
            'name'  => $request->input('name')
        ]);
        
        Session::flash('success', 'Role updated successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Roles::findOrFail($id);
        if (empty($role)) {

            Session::flash('error', 'Roles cannot found!');
            return redirect()->route('roles.index');
        }

        $role->delete();

        Session::flash('success', 'Role delete successfully');
        return redirect()->route('roles.index');
    }
}
