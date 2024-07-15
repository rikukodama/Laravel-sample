<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TUSER
 *
 * @property int $USR_ID
 * @property string $LOGIN_ID
 * @property string $NAME
 * @property string|null $NAME_KANA
 * @property string $UNIT
 * @property string $MAIL
 * @property int $CMP_ID
 * @property string $PASSWORD
 * @property string|null $RANDOM_KEY
 * @property int $AUTHORITY
 * @property int $STATUS
 * @property Carbon|null $ADD_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TUSER extends Model
{
    use HasFactory, Notifiable;

	protected $table = 'T_USER';
	protected $primaryKey = 'USR_ID';
	public $timestamps = false;

	protected $casts = [
		'CMP_ID' => 'int',
		'AUTHORITY' => 'int',
		'STATUS' => 'int',
		'ADD_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'LOGIN_ID',
		'NAME',
		'NAME_KANA',
		'UNIT',
		'MAIL',
		'CMP_ID',
		'PASSWORD',
		'RANDOM_KEY',
		'AUTHORITY',
		'STATUS',
		'ADD_DATE',
		'LAST_UPDATE'
	];
}
