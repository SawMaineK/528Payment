<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchantType extends Model
{
    use SoftDeletes;

	public $table = "merchantTypes";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "name"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string"
    ];

	public static $rules = [
	    "name" => "required"
	];

    

}
