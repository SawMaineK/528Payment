<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentUser extends Model
{
    use SoftDeletes;

	public $table = "paymentUsers";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "user_id",
		"total_deposit",
		"remaining_deposit"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "user_id" => "integer",
		"total_deposit" => "integer",
		"remaining_deposit" => "integer"
    ];

	public static $rules = [
	    "user_id" => "required",
		"total_deposit" => "required",
		"remaining_deposit" => "required"
	];

    	/**
	 * Get the user object.
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}


}
