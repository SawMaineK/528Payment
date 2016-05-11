<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffReceiveTranscation extends Model
{
    use SoftDeletes;

	public $table = "staffReceiveTranscations";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "staff_id",
		"receiver_deposit_id",
		"received_amount",
		"received_date"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "staff_id" => "integer",
		"receiver_deposit_id" => "integer",
		"received_amount" => "integer",
		"received_date" => "string"
    ];

	public static $rules = [
	    "staff_id" => "required",
		"receiver_deposit_id" => "required",
		"received_amount" => "required",
		"received_date" => "required"
	];

    	/**
	 * Get the staff object.
	 */
	public function staff()
	{
	    return $this->belongsTo('App\Models\Staff','staff_id');
	}
	/**
	 * Get the receiverDepositTransaction object.
	 */
	public function receiverDepositTransaction()
	{
	    return $this->belongsTo('App\Models\ReceiverDepositTransaction','receiver_deposit_id');
	}


}
