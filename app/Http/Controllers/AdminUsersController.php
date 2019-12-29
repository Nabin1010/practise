<?php

namespace App\Http\Controllers;

use App\role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        // $users=user::orderBy('id','desc')->paginate(7);
        return view('admin.users.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles  = role::all();

       
        return view('admin.users.create',compact('roles'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( AddUserRequest  $request)
    {
       $user=$request->all();
       $user['password']= bcrypt(trim($request->password));

       User::create($user);
       Session::flash('flash_admin','the user has been created');
       return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles= Role::all();

        return view('admin.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
       $user= User::FindOrFail($id);
       $input= $request->all();

       if (empty(trim($request->password))) {
           $input=$request->except('password');
       } else {
         $input['password'] =bcrypt($request->password);
       }
       $user->update($input);
       Session::flash('flash_admin','the user has been edited');
       return redirect('/admin/users');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Session::flash('flash_admin','The user has been deleted');
        return redirect('admin/users');
    }
}
