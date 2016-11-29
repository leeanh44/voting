<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Input;
use File;

class UserController extends Controller
{
    public function index()
    {	
    	$users = User::all();
    	return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
    	$user = User::find($id);
    	return view('admin.user.edit', compact('user'));
    }

    public function update(Request $inputs, $id)
    {
        $oldImage = Auth::user()->avatar;
        try {
            if(empty($inputs['password'])) {
                unset($inputs['password']);
            }
            if (isset($inputs['avatar'])) {
                $image = $this->uploadAvatar($oldImage);
            } else {
                $image = Auth::user()->avatar;
            }
            $data = User::where('id', $id)->update([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
            'avatar' => $image,
            ]);
        } catch (Exception $e) {
            return view('user/home')->withError(trans('message.update_error'));
        }
        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }
        return redirect(route('user.index'));
    }
    public function uploadAvatar($oldImage)
    {
        $file = Input::file('avatar');
        $destinationPath = public_path() . trans('user.avatar_path');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Input::file('avatar')->move($destinationPath, $fileName);
        if (!empty($oldImage) && file_exists(public_path() . trans('user.avatar_path').'/'.$oldImage)) {
            File::delete(public_path() . trans('user.avatar_path').'/'.$oldImage);
        }
        return $fileName;
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show', compact('user'));
    }
    public function destroy($id){
        $user = User::find($id);
        if(User::destroy($user)){
            return redirect(route('user.index'));
        }
        return redirect(route('user.index'));
    }
}
