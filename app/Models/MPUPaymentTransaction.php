<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MPUPaymentTransaction extends Model
{
    use SoftDeletes;

	public $table = "mPUPaymentTransactions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "payment_user_id",
		"receiver_id",
		"payment_amount",
		"payment_status",
		"payment_date"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "payment_user_id" => "integer",
		"receiver_id" => "integer",
		"payment_amount" => "integer",
		"payment_status" => "string",
		"payment_date" => "string"
    ];

	public static $rules = [
	    "payment_user_id" => "required",
		"receiver_id" => "required",
		"payment_amount" => "required",
		"payment_status" => "required",
		"payment_date" => "required"
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
