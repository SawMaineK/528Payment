<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiverDepositTransaction extends Model
{
    use SoftDeletes;

	public $table = "receiverDepositTransactions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "receiver_id",
		"payable_deposit_amount",
		"deposit_type",
		"deposit_date"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "receiver_id" => "integer",
		"payable_deposit_amount" => "integer",
		"deposit_type" => "string",
		"deposit_date" => "string"
    ];

	public static $rules = [
	    "receiver_id" => "required",
		"payable_deposit_amount" => "required",
		"deposit_type" => "required",
		"deposit_date" => "required"
	];

    	/**
	 * Get the paymentReceiver object.
	 */
	public function paymentReceiver()
	{
	    return $this->belongsTo('App\Models\PaymentReceiver','receiver_id');
	}


}
