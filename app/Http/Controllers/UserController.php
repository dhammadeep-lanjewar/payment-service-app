<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exceptions\UserNotFoundException;

class UserController extends Controller
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

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

    public function getUser($userId)
    {
        return $this->userModel->find($userId);
    }
}
