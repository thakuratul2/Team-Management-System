<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
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

        }  elseif ($current_hour < 20) {
            $greeting_message = "A very Good Evening";
        } else {
            $greeting_message = "I hope you work very nice, so let's meet tomorrow";
        }

        $user_details = User::getAccountDetails();



        return view('account.index',
            compact('userId', 'user_name', 'userEmail', 'greeting_message', 'user_details'));
    }


    public function store(Request $request)
    {
        try {


            if (empty($request->first_name)) {
                return back()->with('error', 'First name is required.');
            }
            if (empty($request->last_name)) {
                return back()->with('error', 'Last name is required.');
            }
            if (empty($request->email)) {
                return back()->with('error', 'Email is required.');
            }
            if (empty($request->organization)) {
                return back()->with('error', 'Organization is required.');
            }
            if (empty($request->designation)) {
                return back()->with('error', 'Designation is required.');
            }
            if (empty($request->phone_number)) {
                return back()->with('error', 'Phone number is required.');
            }
            if (empty($request->address)) {
                return back()->with('error', 'Address is required.');
            }

            if (empty($request->state)) {
                return back()->with('error', 'State is required.');
            }
            if (empty($request->country)) {
                return back()->with('error', 'Country is required.');
            }
            if (empty($request->zip_code)) {
                return back()->with('error', 'Zip code is required.');
            }
            if (empty($request->language)) {
                return back()->with('error', 'Language is required.');
            }
            if (empty($request->timezone)) {
                return back()->with('error', 'Timezone is required.');
            }

            return User::storeAccountDetails($request);

        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
