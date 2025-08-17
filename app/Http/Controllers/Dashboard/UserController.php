<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index()
    {
   $userId = session('user_id');
        $user_name = session('user_name');
        $userEmail = session('user_email');

        $current_hour = now()->hour;
        

        $greeting_message = '';

        if ($current_hour < 12) {

            $greeting_message = 'A very Good Morning';

        } elseif ($current_hour < 17) {

            $greeting_message = 'A very Good Afternoon';

        } elseif ($current_hour > 19) {

            $greeting_message = "I hope you work very nice, so let's meet tomorrow";

        } else {
            $greeting_message = "A very Good Evening";
        }

        $user_details = User::getAccountDetails();

        return view('employees.index',
        compact('userId', 'user_name', 'userEmail', 'greeting_message', 'user_details'));
    }
}
