<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\UserNotFoundException;

class UserController extends Controller
{
    function index(Request $request) {
        try {
            $users = User::findOrFail(4);
        } catch (\Exception $exception) {
            throw new UserNotFoundException();
        }

        return view('form');
    }
    //
    function store(Request $request) {
        return $request->input();
    }
}
