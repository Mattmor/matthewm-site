<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagetitle = "Roles";
        $roles = Role::all()->sortByDesc('level');
        return view('roles.index')->with(['roles' => $roles, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = "Create new role";
        return view('roles.create')->with('pagetitle', $pagetitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role($request->all());
        $role->slug = $role->name;
        $role->save();
        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $users = $role->users;
        $usersWithoutRole = DB::table('users')->where('role_id', '<>', $role->id)->get();
        $pagetitle = $role->name.' role';
        return view('roles.show')->with(['role' => $role, 'users' => $users, 'usersWithoutRole' => $usersWithoutRole, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $pagetitle = "Edit: ".$role->slug;
        return view('roles.edit')->with(['role' => $role, 'pagetitle' => $pagetitle]);
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
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('roles');
    }
    public function linkUser(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $user = User::findOrFail($request->user);
        $user->role_id = $role->id;
        $user->save();
        return redirect('roles/'.$role->slug);
    }
    public function unlinkUser($id)
    {
        $user = User::findOrFail($id);
        $user->role_id = 1;
        $user->save();
        return redirect('roles');
    }
}
