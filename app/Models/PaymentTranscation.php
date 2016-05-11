<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTranscation extends Model
{
    use SoftDeletes;

	public $table = "paymentTranscations";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "payment_user_id",
		"payment_merchant_id",
		"payment_amount",
		"percentage_amount",
		"payment_date"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "payment_user_id" => "integer",
		"payment_merchant_id" => "integer",
		"payment_amount" => "integer",
		"percentage_amount" => "double",
		"payment_date" => "string"
    ];

	public static $rules = [
	    "payment_user_id" => "required",
		"payment_merchant_id" => "required",
		"payment_amount" => "required",
		"percentage_amount" => "required",
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
	 * Get the paymentMerchant object.
	 */
	public function paymentMerchant()
	{
	    return $this->belongsTo('App\Models\PaymentMerchant','payment_merchant_id');
	}


}
