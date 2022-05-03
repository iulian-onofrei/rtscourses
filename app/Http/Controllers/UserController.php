<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FieldRequest;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = User::where('id', Auth::user()->id)->first();

        if ($user['img_src'] == null) {
            $user['img_src'] = 'user_img/default.jpg';
        }

        return View::make('user')->with(array('user' => $user));
    }

    public function store(FieldRequest  $request) 
    {   
        $request->validated();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->adress = $request->adress;

        if ($request->hasFile('file')) {
            $user->img_src = $request->file->store('user_img', 'public');
        }

        if (User::where('id', Auth::user()->id)->update($user->toArray())) {
            return redirect()->back();
        } else {

        }
    }
}
