<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentReceiver extends Model
{
    use SoftDeletes;

	public $table = "paymentReceivers";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "user_id",
		"total_payable_deposit",
		"current_payable_deposit",
		"receiver_percentage",
		"total_percentage_amount"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "user_id" => "integer",
		"total_payable_deposit" => "integer",
		"current_payable_deposit" => "integer",
		"receiver_percentage" => "double",
		"total_percentage_amount" => "double"
    ];

	public static $rules = [
	    "user_id" => "required",
		"total_payable_deposit" => "required",
		"current_payable_deposit" => "required",
		"receiver_percentage" => "required",
		"total_percentage_amount" => "required"
	];

    	/**
	 * Get the user object.
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}


}
