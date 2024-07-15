<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCUSTOMERCHARGE
 *
 * @property int $CHRC_ID
 * @property int $USR_ID
 * @property int $UPDATE_USR_ID
 * @property int|null $CST_ID
 * @property string|null $UNIT
 * @property string|null $POST
 * @property string $CHARGE_NAME
 * @property string|null $CHARGE_NAME_KANA
 * @property string|null $MAIL
 * @property string|null $POSTCODE1
 * @property string|null $POSTCODE2
 * @property int|null $CNT_ID
 * @property string|null $ADDRESS
 * @property string|null $SEARCH_ADDRESS
 * @property string|null $BUILDING
 * @property string|null $PHONE_NO1
 * @property string|null $PHONE_NO2
 * @property string|null $PHONE_NO3
 * @property string|null $FAX_NO1
 * @property string|null $FAX_NO2
 * @property string|null $FAX_NO3
 * @property int $STATUS
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TCUSTOMERCHARGE extends Model
{
	protected $table = 'T_CUSTOMER_CHARGE';
	protected $primaryKey = 'CHRC_ID';
	public $timestamps = false;

	protected $casts = [
		'USR_ID' => 'int',
		'UPDATE_USR_ID' => 'int',
		'CST_ID' => 'int',
		'CNT_ID' => 'int',
		'STATUS' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'USR_ID',
		'UPDATE_USR_ID',
		'CST_ID',
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
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
