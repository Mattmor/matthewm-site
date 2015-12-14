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

    /**
     * Only admin's can access any RolesController functions.
     */
    public function __construct()
    {
        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of the roles.
     *
     * @return view(roles/index)
     */
    public function index()
    {
        $pagetitle = "Roles";
        $roles = Role::all()->sortByDesc('level');
        return view('roles.index')->with(['roles' => $roles, 'pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for creating a new role.
     *
     * @return view(roles/create)
     */
    public function create()
    {
        $pagetitle = "Create new role";
        return view('roles.create')->with('pagetitle', $pagetitle);
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * Save new role
     * @return redirect(roles)
     */
    public function store(Request $request)
    {
        $role = new Role($request->all());
        $role->slug = $role->name;
        $role->save();
        return redirect('roles');
    }

    /**
     * Display the specified role.
     *
     * @param  int  $id
     * @return view(roles.show)->with(role)
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
     * Show the form for editing the specified role.
     *
     * @param  int  $id
     * @return view(roles.edit) for role
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $pagetitle = "Edit: ".$role->slug;
        return view('roles.edit')->with(['role' => $role, 'pagetitle' => $pagetitle]);
    }

    /**
     * Update the specified role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return redirect(roles)
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect('roles');
    }

    /**
     * Remove the specified role from storage.
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

    /**
     * Link the specified user with the specified role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * Make new role_id the role id
     * @return redirect(roles/$role)
     */
    public function linkUser(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $user = User::findOrFail($request->user);
        $user->role_id = $role->id;
        $user->save();
        return redirect('roles/'.$role->slug);
    }

    /**
     * Unlink the specified user with the specified role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * Make new role_id 1 (member)
     * @return redirect(roles)
     */
    public function unlinkUser($id)
    {
        $user = User::findOrFail($id);
        $user->role_id = 1;
        $user->save();
        return redirect('roles');
    }
}
