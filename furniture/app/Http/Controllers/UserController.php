<?php namespace Furniture\Http\Controllers;

use Furniture\Http\Requests;
use Furniture\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Furniture\User;
use Auth;
use Storage;

class UserController extends Controller {
	
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show','photo']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return view('user.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		$models = array();

		foreach ($user->connections as $connection) {
			$model = $connection->model;
			$model->price = $connection->price;
			$models[] = $model;
		}

		return view('user.show',['user'=>$user, 'models'=>$models]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile(Request $request)
	{
		$user = Auth::user();

    if ($request->isMethod('post')) {
    	if ($request->input('password') != "") {
    		$user->password = bcrypt($request->input('password'));
    	}
    	
    	$user->title = $request->input('title');
    	$user->phone_number = $request->input('phone');
    	$user->address = $request->input('address');
    	$user->description = $request->input('description');

			if ($request->hasFile('photo')) {
	    	$file = $request->file('photo');

				$filename = str_random(40);
        Storage::put(
            'photos/'.$filename,
            file_get_contents($file->getRealPath())
        );

        $user->photo = $filename;  	
			}

			$user->save();
		}

		return view('user.profile', ['user'=>$user]);
	}

	public function photo($hash)
	{
		$contents = Storage::get('photos/'.$hash);
		if (!$contents) {
			$contents = Storage::get('photos/avatar.jpg');
		}
		return response($contents);
	}
}
