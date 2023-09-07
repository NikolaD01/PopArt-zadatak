<?php

namespace App\Http\Controllers;

// all data from form
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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
            
        // model user
        User::create($incomingFields);
        return 'Hello from register function';
    }
}
