<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCONFIG
 * 
 * @property int $CON_ID
 * @property string|null $HOST
 * @property int|null $SECURITY
 * @property int|null $PORT
 * @property string $FROM
 * @property string $FROM_NAME
 * @property int|null $PROTOCOL
 * @property string|null $USER
 * @property string|null $PASS
 * @property int $STATUS
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TCONFIG extends Model
{
	protected $table = 'T_CONFIG';
	protected $primaryKey = 'CON_ID';
	public $timestamps = false;

	protected $casts = [
		'SECURITY' => 'int',
		'PORT' => 'int',
		'PROTOCOL' => 'int',
		'STATUS' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'HOST',
		'SECURITY',
		'PORT',
		'FROM',
		'FROM_NAME',
		'PROTOCOL',
		'USER',
		'PASS',
		'STATUS',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
