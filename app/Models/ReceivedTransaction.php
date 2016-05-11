<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivedTransaction extends Model
{
    use SoftDeletes;

	public $table = "receivedTransactions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "payment_user_id",
		"receiver_id",
		"receive_amount",
		"receive_date",
		"percentage_amount"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "payment_user_id" => "integer",
		"receiver_id" => "integer",
		"receive_amount" => "integer",
		"receive_date" => "string",
		"percentage_amount" => "double"
    ];

	public static $rules = [
	    "payment_user_id" => "required",
		"receiver_id" => "required",
		"receive_amount" => "required",
		"receive_date" => "required",
		"percentage_amount" => "required"
	];

    	/**
	 * Get the paymentUser object.
	 */
	public function paymentUser()
	{
	    return $this->belongsTo('App\Models\PaymentUser','payment_user_id');
	}
	/**
	 * Get the paymentReceiver object.
	 */
	public function paymentReceiver()
	{
	    return $this->belongsTo('App\Models\PaymentReceiver','receiver_id');
	}


}
