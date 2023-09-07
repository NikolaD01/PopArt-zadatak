<?php

namespace App\Http\Controllers;

// all data from form
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', ' You are now logged out');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'loginusername' => 'required',
                'loginpassword' => 'required'
            ]);
            // auth returns object and we match data 
        if( auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']]))
        {   
            // session object
            $request->session()->regenerate(); // user is saved as coockie, sends it on every request
            // redirect here with following messege
            return redirect('/')->with('success', 'You have successfully loged in to PopArt Market');
        }
        else
        {
            return redirect('/')->with('failure', 'Invalid login.');
        }
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate(
            [
                // username has to be filled, min 3 letters, max 20, unique username
                'username' => ['required', 'min:3', 'max:20', Rule::unique('users','username')],
                'email' => ['required', 'email', Rule::unique('users','email')],
                // min 6 letter, have to confirm it -> retaype
                'password' => ['required', 'min:6', 'confirmed']
            ]);


            // hashing passwrod with bcrypt
            $incomingFields['password'] = bcrypt($incomingFields['password']) ;

        // new user item
        $user = User::create($incomingFields);

        // login after register
        auth()->login($user);

        return redirect('/')->with('success','Thank you for joining PopArt Market');
    }

    public function showCorrectHomepage()
    {
        // true or false
        if(auth()->check())
        {
            return view('homepage-feed');
        }
        else
        {
            return view('homepage');
        }
    }
}
