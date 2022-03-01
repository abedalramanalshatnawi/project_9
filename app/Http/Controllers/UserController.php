<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('dashboard.users.index', compact('users'));

    }


    public function create()
    {

        return view('dashboard.users.create');

    }

    
    public function store(Request $request)
    {
        
        if($request->hasFile('user_img')){
                $file = $request->user_img;
                $new_file = time() . $file->getClientOriginalName();
                $file->move('uploads', $new_file);
        }
        User::create([
            "role_id"   => $request->role_id,
            "user_name" => $request->user_name,
            "email"     => $request->email,
            "password"  => $request->password,
            "user_img"  => './uploads/' . $new_file,
        ]);

        return redirect()->route('user.index');

    }


    public function show()
    {
        //
    }

   
    public function edit($id)
    {
        $userEdit = User::find($id);
        return view('dashboard.users.edit', compact('userEdit'));
    }


    public function update(Request $request, $id)
    {
        $userUpdate = User::find($id);
        if($request->hasFile('user_img')){
            $file = $request->user_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
            $userUpdate->user_img =  './uploads/' . $new_file ;
        }
        $userUpdate->user_name = $request->user_name ;
        $userUpdate->email     = $request->email ;
        $userUpdate->password  = $request->password ;
        
        $userUpdate->update();
        return redirect()->route('user.index');

    }


    public function destroy($id)
    {
        $userDestroy = User::find($id);
        $userDestroy->destroy($id);
        return redirect()->route('user.index');
    }
}
