<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        if ($user->role_id == 1) {
            $allUsers = User::where('role_id', '!=', 1)->orderBy('id', 'desc')->paginate(9);
        } elseif ($user->role_id == 2) {
            $allUsers = User::whereNotIn('role_id', [1, 2])->orderBy('id', 'desc')->paginate(9);
        }

        return view('backend.admin.users.index', compact('allUsers'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.admin.users.edit',compact('user'));
    }

    public function changeRole(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->role_id = $request->role_id;
        $user->save();

        return response()->json(['success' => 'Role updated successfully']);
    }

    public function update(Request $request, $id)
    {


       /*  dd($request); */

        $user = User::findOrFail($id);

        // Update the attributes of the ToDoList model instance
        $user->name = $request->name;
        $user->email = $request->email;

        // Save the changes to the database
        $user->save();
        // Redirect to the index page
        return redirect()->route('users.index')->with('success', 'ToDo updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
