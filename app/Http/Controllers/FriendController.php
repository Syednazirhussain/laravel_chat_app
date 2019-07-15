<?php

namespace App\Http\Controllers;

use App\User;
use App\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $user_id = auth()->user()->id;
        $users = User::where('id', '!=', $user_id)->get();

        return view('friends.people');
    }
}
