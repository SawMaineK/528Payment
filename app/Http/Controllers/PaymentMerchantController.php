<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentMerchantRequest;
use App\Http\Requests\UpdatePaymentMerchantRequest;
use App\Libraries\Repositories\PaymentMerchantRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\PaymentMerchant;
use App\Models\User;
use App\Models\MerchantType;

class PaymentMerchantController extends AppBaseController
{

	/** @var  PaymentMerchantRepository */
	private $paymentMerchantRepository;

	function __construct(PaymentMerchantRepository $paymentMerchantRepo)
	{
		$this->paymentMerchantRepository = $paymentMerchantRepo;
	}

	/**
	 * Display a listing of the PaymentMerchant.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paymentMerchants = PaymentMerchant::with(['user', 'merchantType'])->paginate(10);

		return view('paymentMerchants.index')
			->with('paymentMerchants', $paymentMerchants);
	}

	/**
	 * Show the form for creating a new PaymentMerchant.
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

		$merchantType=MerchantType::all();
		$merchantTypes = [];
		foreach ($merchantType as $key => $value) {
			$merchantTypes[$value->id] = $value->name;
		}
		return view('paymentMerchants.create')->with(['users'=>$users, 'merchantTypes'=>$merchantTypes]);
	}

	/**
	 * Store a newly created PaymentMerchant in storage.
	 *
	 * @param CreatePaymentMerchantRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaymentMerchantRequest $request)
	{
		$input = $request->all();

		

		$paymentMerchant = $this->paymentMerchantRepository->create($input);

		Flash::success('PaymentMerchant saved successfully.');

		return redirect(route('administration.paymentMerchants.index'));
	}

	/**
	 * Display the specified PaymentMerchant.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$paymentMerchant = PaymentMerchant::with(['user', 'merchantType'])->where('id', $id)->first();

		if(empty($paymentMerchant))
		{
			Flash::error('PaymentMerchant not found');

			return redirect(route('administration.paymentMerchants.index'));
		}

		return view('paymentMerchants.show')->with('paymentMerchant', $paymentMerchant);
	}

	/**
	 * Show the form for editing the specified PaymentMerchant.
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

		$merchantType=MerchantType::all();
		$merchantTypes = [];
		foreach ($merchantType as $key => $value) {
			$merchantTypes[$value->id] = $value->name;
		}

		$paymentMerchant = $this->paymentMerchantRepository->find($id);

		if(empty($paymentMerchant))
		{
			Flash::error('PaymentMerchant not found');

			return redirect(route('administration.paymentMerchants.index'));
		}

		return view('paymentMerchants.edit')->with(['users'=>$users, 'merchantTypes'=>$merchantTypes, 'paymentMerchant'=>$paymentMerchant]);
	}

	/**
	 * Update the specified PaymentMerchant in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePaymentMerchantRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePaymentMerchantRequest $request)
	{
		$paymentMerchant = $this->paymentMerchantRepository->find($id);

		if(empty($paymentMerchant))
		{
			Flash::error('PaymentMerchant not found');

			return redirect(route('administration.paymentMerchants.index'));
		}

		$input = $request->all();

		

		$this->paymentMerchantRepository->updateRich($input, $id);

		Flash::success('PaymentMerchant updated successfully.');

		return redirect(route('administration.paymentMerchants.index'));
	}

	/**
	 * Remove the specified PaymentMerchant from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$paymentMerchant = $this->paymentMerchantRepository->find($id);

		if(empty($paymentMerchant))
		{
			Flash::error('PaymentMerchant not found');

			return redirect(route('administration.paymentMerchants.index'));
		}

		

		$this->paymentMerchantRepository->delete($id);

		Flash::success('PaymentMerchant deleted successfully.');

		return redirect(route('administration.paymentMerchants.index'));
	}
}
