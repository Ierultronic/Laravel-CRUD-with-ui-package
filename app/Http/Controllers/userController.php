<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //to redirect to add another user page
    public function addUser(){
        return view('AddUser');
    }

    //store new user into database
    public function saveUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ]);
        $user = new User();
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return redirect('ListUser')->with('success_add', 'Successfully added a new user.');
        }else{
            return back()->with('fail', 'Something wrong, please try again.');
        }
    }

    //retrieve all data from database
    public function ListUser(){
        $users = DB::select('select * from users');
        return view('ListUser', compact('users'));
    }
    
    //Admin: to edit your data and other user's data
    //User: to edit only your own data
    public function editUser($id){
        $isUser = DB::table('users')->where('id', $id)->first();
        if(Session::get('loginId')==$id || auth()->user()->is_admin == 1){
            return view('editUser', compact('isUser'));   
        }else{
            return back()->with('error', 'You cannot edit that guy :(');
        }
    }

    //Update the database with new user data
    public function UpdateUser(Request $request, $id){
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if(auth()->user()->is_admin == 1){

        return redirect('admin/ListUser')->with('success_update', 'Successfully updated.');

        }else{
            
        return redirect('ListUser')->with('success_update', 'Successfully updated.');
        }
    }

    //to delete the user data from database(only admin)
    public function deleteUser($id){
    DB::table('users')->where('id', $id)->delete();
    return redirect('admin/ListUser')->with('success_delete', 'Successfully deleted.');
    }
}