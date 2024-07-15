<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCHARGE
 * 
 * @property int $CHR_ID
 * @property int $CMP_ID
 * @property int $USR_ID
 * @property int $UPDATE_USR_ID
 * @property string|null $UNIT
 * @property string|null $POST
 * @property string $CHARGE_NAME
 * @property string|null $CHARGE_NAME_KANA
 * @property string|null $MAIL
 * @property string $POSTCODE1
 * @property string $POSTCODE2
 * @property int $CNT_ID
 * @property string $ADDRESS
 * @property string $SEARCH_ADDRESS
 * @property string|null $BUILDING
 * @property string|null $PHONE_NO1
 * @property string|null $PHONE_NO2
 * @property string|null $PHONE_NO3
 * @property string|null $FAX_NO1
 * @property string|null $FAX_NO2
 * @property string|null $FAX_NO3
 * @property int $STATUS
 * @property string|null $SEAL
 * @property int $CHR_SEAL_FLG
 * @property Carbon $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TCHARGE extends Model
{
	protected $table = 'T_CHARGE';
	protected $primaryKey = 'CHR_ID';
	public $timestamps = false;

	protected $casts = [
		'CMP_ID' => 'int',
		'USR_ID' => 'int',
		'UPDATE_USR_ID' => 'int',
		'CNT_ID' => 'int',
		'STATUS' => 'int',
		'CHR_SEAL_FLG' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'CMP_ID',
		'USR_ID',
		'UPDATE_USR_ID',
		'UNIT',
		'POST',
		'CHARGE_NAME',
		'CHARGE_NAME_KANA',
		'MAIL',
		'POSTCODE1',
		'POSTCODE2',
		'CNT_ID',
		'ADDRESS',
		'SEARCH_ADDRESS',
		'BUILDING',
		'PHONE_NO1',
		'PHONE_NO2',
		'PHONE_NO3',
		'FAX_NO1',
		'FAX_NO2',
		'FAX_NO3',
		'STATUS',
		'SEAL',
		'CHR_SEAL_FLG',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
