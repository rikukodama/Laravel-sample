<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TOPTION
 * 
 * @property int $OPTION_ID
 * @property string $OPTION_NAME
 * @property string $OPTION_NAME_JP
 * @property string $OPTION_VALUE
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TOPTION extends Model
{
	protected $table = 'T_OPTION';
	protected $primaryKey = 'OPTION_ID';
	public $timestamps = false;

	protected $casts = [
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'OPTION_NAME',
		'OPTION_NAME_JP',
		'OPTION_VALUE',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
