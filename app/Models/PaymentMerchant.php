<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMerchant extends Model
{
    use SoftDeletes;

	public $table = "paymentMerchants";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "user_id",
		"merchant_type",
		"percentage",
		"total_percentage_amount"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "user_id" => "integer",
		"merchant_type" => "integer",
		"percentage" => "double",
		"total_percentage_amount" => "double"
    ];

	public static $rules = [
	    "user_id" => "required",
		"merchant_type" => "required",
		"percentage" => "required",
		"total_percentage_amount" => "required"
	];

    	/**
	 * Get the user object.
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}
	/**
	 * Get the merchantType object.
	 */
	public function merchantType()
	{
	    return $this->belongsTo('App\Models\MerchantType','merchant_type');
	}


}
