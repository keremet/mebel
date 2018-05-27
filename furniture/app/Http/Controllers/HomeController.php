<?php namespace Furniture\Http\Controllers;

use DB;
use Auth;
use Furniture\User;
use Furniture\FModel;
use Furniture\FPhoto;
use Furniture\MConnection;

use Furniture\Http\Requests;
use Furniture\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$vars = array();
		$auth_user = Auth::user();
		
		if ($auth_user)
		{
			$vars['auth_user'] = $auth_user;
		}

    view()->share($vars);		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{ 
		$result = DB::select('select * from models order by rand() limit 6');

		$models = array();
		foreach($result as $row)
		{
			$model = FModel::find($row->id);

	    $connection = $model->connections()->where('user_id', $model->owner->id)->first();
			if ($connection)
			{
				$price = $connection->price;			
				$model->price = $price;
			}
			$models[] = $model;
		}

		$result = DB::select('select * from users order by rand() limit 4');
		$users = array();
		foreach($result as $row)
		{
			$user = User::find($row->id);
			$users[] = $user;
		}

		return view('home', ['models'=>$models, 'users'=>$users]);
	}

	public function executors(Request $request)
	{
		$users = User::paginate(10);
		return view('executors', ['users'=>$users]);
	}

	public function modelsearch(Request $request)
	{
		$models = array();
		if ($request->input('q')) {
			$query = "%".$request->input('q')."%";
			$models = FModel::where('title', 'like', $query)->paginate(6);
		} else {
			$models = FModel::paginate(6);
		}

		foreach ($models as $key=>$model)
		{
	    $connection = $model->connections()->where('user_id', $model->owner->id)->first();
			if ($connection)
			{
				$price = $connection->price;
				$models[$key]->price = $price;
			}			
		}

		return view('search', ['models'=>$models]);
	}	
}
