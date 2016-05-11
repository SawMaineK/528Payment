<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

	public $table = "staff";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "user_id",
		"position"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "user_id" => "integer",
		"position" => "string"
    ];

	public static $rules = [
	    "user_id" => "required",
		"position" => "required"
	];

    	/**
	 * Get the user object.
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}


}
