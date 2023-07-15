<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    //
    function report() {}
    function render() {
        return view('errors.user-not-found');
    }
}
