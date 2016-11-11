<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Input;

class UserController extends Controller
{
    public function index()
    {	
    	$users = User::all();
    	return view('admin.user.index', compact('users'));
    }

    public function edit($id)
    {
    	$user = User::find($id);
        echo __DIR__;
    	return view('admin.user.edit', compact('user'));
    }

    public function update(Request $inputs, $id)
    {
        try {
            if(empty($inputs['password'])) {
                unset($inputs['password']);
            }
            if (isset($inputs['avatar'])) {
                $image = $this->uploadAvatar(Auth::user()->avatar);
                $data = User::where('id', $id)->update([
                    'name' => $inputs['name'],
                    'email' => $inputs['email'],
                    'password' => bcrypt($inputs['password']),
                    'avatar' => $image,
                    ]);
            } else {
                unset($inputs['avatar']);
                $data = User::where('id', $id)->update([
                    'name' => $inputs['name'],
                    'email' => $inputs['email'],
                    'password' => bcrypt($inputs['password']),
                ]);
            }
            
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
        $destinationPath = base_path() . trans('user.avatar_path');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Input::file('avatar')->move($destinationPath, $fileName);
        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }
        return $fileName;
    }
}
