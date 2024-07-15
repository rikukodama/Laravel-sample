<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCUSTOMER
 *
 * @property int $CST_ID
 * @property int $CMP_ID
 * @property int $USR_ID
 * @property int $UPDATE_USR_ID
 * @property string $NAME
 * @property string|null $NAME_KANA
 * @property string|null $POSTCODE1
 * @property int $HONOR_CODE
 * @property string $HONOR_TITLE
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
 * @property string|null $WEBSITE
 * @property int|null $CUTOOFF_SELECT
 * @property int|null $CUTOOFF_DATE
 * @property int|null $PAYMENT_MONTH
 * @property int|null $PAYMENT_SELECT
 * @property int|null $PAYMENT_DAY
 * @property int|null $EXCISE
 * @property int|null $FRACTION
 * @property int $TAX_FRACTION
 * @property int $TAX_FRACTION_TIMING
 * @property int|null $CHR_ID
 * @property string $NOTE
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TCUSTOMER extends Model
{
	protected $table = 'T_CUSTOMER';
	protected $primaryKey = 'CST_ID';
	public $timestamps = false;

	protected $casts = [
		'CMP_ID' => 'int',
		'USR_ID' => 'int',
		'UPDATE_USR_ID' => 'int',
		'HONOR_CODE' => 'int',
		'CNT_ID' => 'int',
		'CUTOOFF_SELECT' => 'int',
		'CUTOOFF_DATE' => 'int',
		'PAYMENT_MONTH' => 'int',
		'PAYMENT_SELECT' => 'int',
		'PAYMENT_DAY' => 'int',
		'EXCISE' => 'int',
		'FRACTION' => 'int',
		'TAX_FRACTION' => 'int',
		'TAX_FRACTION_TIMING' => 'int',
		'CHR_ID' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'CMP_ID',
		'USR_ID',
		'UPDATE_USR_ID',
		'NAME',
		'NAME_KANA',
		'POSTCODE1',
		'HONOR_CODE',
		'HONOR_TITLE',
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
		'WEBSITE',
		'CUTOOFF_SELECT',
		'CUTOOFF_DATE',
		'PAYMENT_MONTH',
		'PAYMENT_SELECT',
		'PAYMENT_DAY',
		'EXCISE',
		'FRACTION',
		'TAX_FRACTION',
		'TAX_FRACTION_TIMING',
		'CHR_ID',
		'NOTE',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
