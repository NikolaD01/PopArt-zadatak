<?php

namespace App\Http\Controllers;

// all data from form
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function profile(User $user)
    {
        return view('profile-products', ['username' => $user->username, 'products' => $user->products()->latest()->get(), 'productCount' => $user->products()->count()]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', ' You are now logged out');
    }

    public function login(Request $request, User $user)
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
            // return redirect('/')->with('success', 'You have successfully loged in to PopArt Market');
            return view('profile-products', ['username' => $user->username, 'products' => $user->products()->latest()->get(), 'productCount' => $user->products()->count()]);
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
// Admin -------------- Admin ---------- Admin ----------
    public function adminPage(User $user)
    {
        $users = User::all();
        $user = auth()->user();
        if(!isset($user->isAdmin))
        {
            return redirect('/')->with('failure','Access denied, you are not an administrator');;
        }
        if($user->isAdmin === 1)
        {
            return view('admins-only', ['users' => $users]);
        }
            return redirect('/')->with('failure','Access denied, you are not an administrator');;
        // return 'You are admmin';
    }

    public function deleteUser(User $user)
    {
        if(!(auth()->user()->isAdmin === 1))
        {
            return redirect('/homepage')->with('failure','Warning ! U are not admin !');
        }
        $user->delete();
        return redirect('/admins-only')->with('success','User successfuly deleted');
    }

    public function viewUser(User $user)
    {
        return view('edit-user', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $incomingFields = $request->validate([
            'username' => 'required',
            'email' => 'required'
        ]);

        $incomingFields['username'] = strip_tags($incomingFields['username']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);

        $user->update($incomingFields);

        return back()->with('success', 'Post sucessfuly updated');
    }
}
