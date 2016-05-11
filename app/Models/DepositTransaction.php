<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepositTransaction extends Model
{
    use SoftDeletes;

	public $table = "depositTransactions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "payment_user_id",
		"deposit_type",
		"deposit_amount",
		"deposit_date",
		"deposit_code",
		"deposit_status"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "payment_user_id" => "integer",
		"deposit_type" => "string",
		"deposit_amount" => "integer",
		"deposit_date" => "string",
		"deposit_code" => "string",
		"deposit_status" => "string"
    ];

	public static $rules = [
	    "payment_user_id" => "required",
		"deposit_type" => "required",
		"deposit_amount" => "required",
		"deposit_date" => "required",
		"deposit_code" => "required",
		"deposit_status" => "required"
	];

    	/**
	 * Get the paymentUser object.
	 */
	public function paymentUser()
	{
	    return $this->belongsTo('App\Models\PaymentUser','payment_user_id');
	}


}
