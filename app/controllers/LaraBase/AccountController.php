<?php

class AccountController extends BaseController {

    //  Show Account Settings

	public function settings()
	{
        $user = Auth::user();
        $settings = [];
        return View::make('user.settings', compact('user', 'settings'));
	}


    //  Show User Dashboard

    public function dashboard()
    {
        $user = Auth::user();
        $users = DB::table('users')->count();
        $user_reports = DB::table('reports')->where('user_id', '=', $user->id)->count();
        $reports = Report::all()->count();
        $feedback = Feedback::all()->count();
        return View::make('user.dashboard', compact('user','reports','users','user_reports', 'feedback'));
    }

    // Show Public Profile of user

    public function profilePublic($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        return View::make('user.profile_public', compact('user'));
    }


    //  Show Account Profile of User

    public function profile()
    {
        $user = Auth::user();
        return View::make('user.profile', compact('user'));

    }


    // Edit User Profile

    public function profileEdit()
    {
        $user = Auth::user();
        return View::make('user.profile_edit', compact('user'));
    }


    // Save Changes to User Profile

    public function profileSave()
    {
        $user = Auth::user();
        $data = Input::all();
        $validator = User::validate_profile($data, $user);
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $user->update($data);
        return Redirect::to('profile')->withSuccess('Profile was updated Successfully');
    }


    // Change Account Password

    public function passwordChange()
    {
        return View::make('user.password_change');
    }


    // Save new Password

    public function passwordSave()
    {
        return Redirect::back()->withWarning('This feature is disabled for the live demo'); // Remove for production
        $data = Input::all();
        $validator = User::validate_change_password($data);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $user = Auth::user();
            $current_password = Input::get('current_password');
            $new_password = Input::get('new_password');
            if(Hash::check($current_password, $user->getAuthPassword()))
            {
                if ($current_password == $new_password) {
                    return Redirect::back()->withWarning('Your Current Password and New Password are the same');
                }
                $user->password = Hash::make($new_password);
                $user->save();
                return Redirect::to('profile')->withSuccess('Your Password was changed Successfully');
            }
            return Redirect::back()->withError('Your Current Password is incorrect');
        }
    }

}