<?php namespace Furniture\Http\Controllers;

use Furniture\Http\Requests;
use Furniture\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Furniture\User;
use Furniture\FModel;
use Furniture\FPhoto;
use Furniture\MConnection;
use Furniture\MFile;
use Auth;
use Storage;
use Log;

class ModelController extends Controller {
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'photo', 'file']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();

		$models = FModel::where('created_by', $user->id)->get();

		return view('model.index', ['models' => $models]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('model.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = Auth::user();

    $model = new FModel;
    $model->title = $request->input('title');
    $model->description = $request->input('description');
    $model->created_by = $user->id;

    $model->save();

    if ($request->hasFile('photo')) {
	  	$file = $request->file('photo');

			$filename = str_random(40);
	    Storage::put(
	        'model_photos/'.$filename,
	        file_get_contents($file->getRealPath())
	    );

			$photo = new FPhoto;
			$photo->photo = $filename;
			
	    $model->photos()->save($photo);
	    
	    $model->main_photo = $filename;
	    $model->save();
		}

		$connection = new MConnection;
		$connection->price = $request->input('price');
		$connection->user_id = $user->id;
		$model->connections()->save($connection);

    return redirect('/model');
  }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$model = FModel::findOrFail($id);
    $connection = $model->connections()->where('user_id', $model->owner->id)->first();
		if ($connection)
			$model->price = $connection->price;

		$users = array();
		$model->owner->price = $model->price;
		$users[] = $model->owner;

		foreach ($model->connections as $key => $connection) {
			if ($connection->user->id != $model->owner->id){
				$connection->user->price = $connection->price;
				$users[] = $connection->user;
			}
		}

		if (Auth::check()) {
	    view()->share(['auth_user'=>Auth::user()]);
		}		

		return view('model.show', ['model'=>$model, 'users' => $users]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		try{
			$model = FModel::findOrFail($id);

			if ($model->created_by == Auth::user()->id)
			{
				$photos = $model->photos;
				$files = $model->files;
				$price = 0;

		    $connection = $model->connections()->where('user_id', Auth::user()->id)->first();
				if ($connection)
					$price = $connection->price;

				$file_error = $request->session()->get('file_error');

				return view('model.edit', ['model'=>$model, 'price'=>$price, 'photos'=> $photos, 'files'=>$files, 'file_error'=>$file_error]);			
			}			
		}catch(ModelNotFoundException $e)
		{
		}
		return redirect("/model");
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = Auth::user();

    $model = FModel::findOrFail($id);
    if ($model->created_by == $user->id) {
	    $model->title = $request->input('title');
	    $model->description = $request->input('description');
	    $model->main_photo = $request->input('main_photo');
	    $model->save();

	    $connection = $model->connections()->where('user_id', $user->id)->first();
			$connection->price = $request->input('price');
			$connection->save();
    }

    return redirect("/model/".$id."/edit");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    $model = FModel::findOrFail($id);
    if ($model->created_by == Auth::user()->id) {
    	$model->photos()->delete();
    	$model->connections()->delete();
    	$model->delete();
		}

		return redirect("/model");
	}

	public function photo($hash)
	{
		$contents = Storage::get('model_photos/'.$hash);
		if (!$contents) {
			$contents = Storage::get('model_photos/product1.jpg');
		}
		return response($contents);
	}

	public function photo_add(Request $request, $id)
	{
		$redirect = $request->input('redirectTo');

		$model = FModel::find($id);
		if ($model->created_by != Auth::user()->id)
			return redirect($redirect);

    if ($request->hasFile('photo')) {
	  	$file = $request->file('photo');

			$filename = str_random(40);
	    Storage::put(
	        'model_photos/'.$filename,
	        file_get_contents($file->getRealPath())
	    );

			$photo = new FPhoto;
			$photo->photo = $filename;
			
	    $model->photos()->save($photo);
		}		

		return redirect($redirect);
	}

	public function photo_delete(Request $request, $id)
	{
		$user = Auth::user();
		$photo = FPhoto::find($id);
		$model = $photo->model;
		if ($model->created_by == $user->id) {
			$photo->delete();
		}

		$redirect = $request->input('redirectTo');
		return redirect($redirect);
	}

	public function photo_set_main(Request $request, $id)
	{
		$redirect = $request->input('redirectTo');

		$model = FModel::find($id);
		if ($model->created_by != Auth::user()->id)
			return redirect($redirect);

		$model->main_photo = $request->input('photo');
		$model->save();

		return redirect($redirect);
	}

	public function file($hash)
	{
		if (!Storage::exists('model_files/'.$hash)) {
			return abort(404);
		}

		$mfile = MFile::where('hash', $hash)->first();
		if (!$mfile)
		{
			return abort(404);	
		}

		$path = storage_path().'/app/model_files/' . $hash;

		return response()->download($path, $mfile->filename);
	}

	public function file_add(Request $request, $id)
	{
		$redirect = $request->input('redirectTo');
		$file_error = "";

		$model = FModel::find($id);
		if ($model->created_by != Auth::user()->id)
			return redirect($redirect);

    if ($request->hasFile('file') && $request->file('file')->isValid()) {
	  	$file = $request->file('file');
	  	$filename = $file->getClientOriginalName();
			$hash = str_random(40);

			$file->move(storage_path().'/app/model_files/', $hash);

			$mfile = new MFile;
			$mfile->filename = $filename;
			$mfile->hash = $hash;
			
	    $model->files()->save($mfile);
		}	else {
			$request->session()->flash('file_error', $request->file('file')->getErrorMessage());
		}

		return redirect($redirect);
	}

	public function file_delete(Request $request, $id)
	{
		$user = Auth::user();
		$file = MFile::find($id);
		$model = $file->model;
		if ($model->created_by == $user->id) {
			$file->delete();
		}

		$redirect = $request->input('redirectTo');
		return redirect($redirect);
	}

	public function execute(Request $request, $id)
	{
		$model = FModel::find($id);
		if ($request->input('can') == 'true')
		{
			$connection = new MConnection;
			$connection->price = $request->input('price');
			$connection->user_id = Auth::user()->id;
			$model->connections()->save($connection);
		}
		else 
		{
			$connection = $model->connections()->where('user_id', Auth::user()->id)->first();
			$connection->delete();
		}

		return redirect('/model/'.$id);
	}
}
