<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function admin(){
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $users = User::where('roleid', 1)->get();
        return view('admin', ['blogs' => $blogs, 'users' => $users]);
    }
}
