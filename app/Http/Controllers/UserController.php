<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Exports\UsersExport;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function create()
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');;
    }

    public function login()
    {
        // Store prev link in session
        session()->put('prevLink', url()->previous());

        App::setLocale(session()->get('lang', 'en'));
        return view('users.login');
    }

    public function authanticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields)) {
            $request->session()->regenerate();
            if (Auth::user()->role) {
                return redirect('dashboard')->with('message', 'you are now logged in!');
            }
            return redirect(session()->get('prevLink', '/'))->with('message', 'you are now logged in as admin!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function show()
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('users.settings', [
            'user' => Auth::user()
        ]);
    }

    public function updateInfo(Request $request, User $user)
    {
        if ($user['id'] != Auth::id()) {
            return abort(401);
        }

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user['id'])],
        ]);

        $user->update($formFields);
        return redirect('/')->with('message', 'Information Saved!');
    }

    public function updatePassword(Request $request, User $user)
    {
        if ($user['id'] != Auth::id()) {
            return abort(401);
        }

        if (!password_verify($request['current_password'], $user['password'])) {
            return back()->withErrors([
                'current_password' => 'current password is wrong'
            ]);
        }

        $formFields = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user->update($formFields);
        return redirect('/')->with('message', 'Information Saved!');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'items.xlsx');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        // // only allow people with @company.com to login
        // if (explode("@", $user->email)[1] !== 'company.com') {
        //     return redirect()->to('/');
        // }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // log them in
            Auth::login($existingUser, true);
        } else {
            // create a new user
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('')
            ]);
            Auth::login($newUser, true);
        }

        // Redirect
        if (Auth::user()->role) {
            return redirect('dashboard')->with('message', 'you are now logged in as admin!');
        }
        return redirect(session()->get('prevLink', '/'))->with('message', 'you are now logged in!');
    }
}
