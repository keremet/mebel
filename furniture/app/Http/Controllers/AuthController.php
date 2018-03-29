<?php namespace Furniture\Http\Controllers;

use Auth;

use Furniture\Http\Requests;
use Furniture\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Furniture\User;

class AuthController extends Controller {

  public function login(Request $request)
	{
    // If user input info
    if ($request->isMethod('post')) {
			$error = 'Invalid user info, please try again.';

      // Gather user information from request.
      $email = $request->input('email');
			$password = $request->input('password');

      if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $user = Auth::user();
        return redirect('/');
      }
    }

    return view('login', [
      'error' => isset($error) ? $error : null,
    ]); 
  }

  public function register(Request $request)
  {
    // If user input info
    if ($request->isMethod('post')) {
      $error = 'Register failed, please try again.';

      try {
        $user = new User;
        $user->email = $request->input('email');
        $user->name = $request->input('username');
        $user->password = bcrypt($request->input('password'));

        $user->save();    

        return redirect('/login');
      }  catch(Exception $e) {
        $error = 'Register failed, please try again.';
      }
    }

    return view('register', [
      'error' => isset($error) ? $error : null,
    ]); 
  }

  public function logout(Request $request)
  {
    Auth::logout();

    return redirect("/login");
  }
}
