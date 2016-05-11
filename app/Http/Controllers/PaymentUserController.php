<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentUserRequest;
use App\Http\Requests\UpdatePaymentUserRequest;
use App\Libraries\Repositories\PaymentUserRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\PaymentUser;
use App\Models\User;

class PaymentUserController extends AppBaseController
{

	/** @var  PaymentUserRepository */
	private $paymentUserRepository;

	function __construct(PaymentUserRepository $paymentUserRepo)
	{
		$this->paymentUserRepository = $paymentUserRepo;
	}

	/**
	 * Display a listing of the PaymentUser.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paymentUsers = PaymentUser::with(['user'])->paginate(10);

		return view('paymentUsers.index')
			->with('paymentUsers', $paymentUsers);
	}

	/**
	 * Show the form for creating a new PaymentUser.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$user=User::all();
		$users = [];
		foreach ($user as $key => $value) {
			$users[$value->id] = $value->name;
		}
		return view('paymentUsers.create')->with(['users'=>$users]);
	}

	/**
	 * Store a newly created PaymentUser in storage.
	 *
	 * @param CreatePaymentUserRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaymentUserRequest $request)
	{
		$input = $request->all();

		

		$paymentUser = $this->paymentUserRepository->create($input);

		Flash::success('PaymentUser saved successfully.');

		return redirect(route('administration.paymentUsers.index'));
	}

	/**
	 * Display the specified PaymentUser.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentUser = PaymentUser::with(['user'])->where('id', $id)->first();

		if(empty($paymentUser))
		{
			Flash::error('PaymentUser not found');

			return redirect(route('administration.paymentUsers.index'));
		}

		return view('paymentUsers.show')->with('paymentUser', $paymentUser);
	}

	/**
	 * Show the form for editing the specified PaymentUser.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		$user=User::all();
		$users = [];
		foreach ($user as $key => $value) {
			$users[$value->id] = $value->name;
		}

		$paymentUser = $this->paymentUserRepository->find($id);

		if(empty($paymentUser))
		{
			Flash::error('PaymentUser not found');

			return redirect(route('administration.paymentUsers.index'));
		}

		return view('paymentUsers.edit')->with(['users'=>$users, 'paymentUser'=>$paymentUser]);
	}

	/**
	 * Update the specified PaymentUser in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePaymentUserRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePaymentUserRequest $request)
	{
		$paymentUser = $this->paymentUserRepository->find($id);

		if(empty($paymentUser))
		{
			Flash::error('PaymentUser not found');

			return redirect(route('administration.paymentUsers.index'));
		}

		$input = $request->all();

		

		$this->paymentUserRepository->updateRich($input, $id);

		Flash::success('PaymentUser updated successfully.');

		return redirect(route('administration.paymentUsers.index'));
	}

	/**
	 * Remove the specified PaymentUser from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$paymentUser = $this->paymentUserRepository->find($id);

		if(empty($paymentUser))
		{
			Flash::error('PaymentUser not found');

			return redirect(route('administration.paymentUsers.index'));
		}

		

		$this->paymentUserRepository->delete($id);

		Flash::success('PaymentUser deleted successfully.');

		return redirect(route('administration.paymentUsers.index'));
	}
}
