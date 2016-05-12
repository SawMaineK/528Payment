<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\UserRepository;
use App\Models\User;
use App\Models\PaymentUser;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class UserAPIController extends AppBaseController
{
	/** @var  UserRepository */
	private $userRepository;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepository = $userRepo;
	}

	/**
	 * Display a listing of the User.
	 * GET|HEAD /users
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->input('offset') ? $request->input('offset') : 1;
		$limit   = $request->input('limit') ? $request->input('limit') : 12;

		$offset  = ($offset - 1) * $limit;
		
		$users = User::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($users);
	}

	/**
	 * Show the form for creating a new User.
	 * GET|HEAD /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created User in storage.
	 * POST /users
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(User::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, User::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();
		$paymentUser = null;
		$user = User::where('email', $input['email'])->first();
		if($user){
			$users = $this->userRepository->updateRich($input, $user->id);
			if($users){
				$paymentUser = PaymentUser::with('user')->where('user_id', $users['id'])->first();
			}
			
		}else{
			$users = $this->userRepository->create($input);
			if($users){
				$paymentUser = new PaymentUser();
				$paymentUser->user_id = $users->id;
				$paymentUser->save();
				$paymentUser['user'] = $users;
			}
		}

		return $this->sendResponse($paymentUser->toArray(), "User saved successfully");
	}

	/**
	 * Display the specified User.
	 * GET|HEAD /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->userRepository->apiFindOrFail($id);

		return $this->sendResponse($user->toArray(), "User retrieved successfully");
	}

	/**
	 * Show the form for editing the specified User.
	 * GET|HEAD /users/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified User in storage.
	 * PUT/PATCH /users/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if(sizeof(User::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, User::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		/** @var User $user */
		$user = $this->userRepository->apiFindOrFail($id);

		$result = $this->userRepository->updateRich($input, $id);

		$user = $user->fresh();

		return $this->sendResponse($user->toArray(), "User updated successfully");
	}

	/**
	 * Remove the specified User from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->userRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "User deleted successfully");
	}
}
