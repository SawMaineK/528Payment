<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    //use SoftDeletes;

	public $table = "users";
    
	//protected $dates = ['deleted_at'];


	public $fillable = [
	    "name",
		"email",
		"password",
		"phone"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
		"email" => "string",
		"password" => "string",
		"phone" => "string"
    ];

	public static $rules = [
	    "name" => "required",
		"email" => "required",
		"password" => "required",
		"phone" => "required"
	];

    

}
