<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TCOMPANY
 * 
 * @property int $CMP_ID
 * @property string $NAME
 * @property string|null $REPRESENTATIVE
 * @property string|null $POSTCODE1
 * @property string|null $POSTCODE2
 * @property int|null $CNT_ID
 * @property string|null $ADDRESS
 * @property string $SEARCH_ADDRESS
 * @property string|null $BUILDING
 * @property string|null $PHONE_NO1
 * @property string|null $PHONE_NO2
 * @property string|null $PHONE_NO3
 * @property string|null $FAX_NO1
 * @property string|null $FAX_NO2
 * @property string|null $FAX_NO3
 * @property string|null $INVOICE_NUMBER
 * @property int $HONOR_CODE
 * @property string $HONOR_TITLE
 * @property int|null $CUTOOFF_SELECT
 * @property int|null $CUTOOFF_DATE
 * @property int|null $PAYMENT_MONTH
 * @property int|null $PAYMENT_SELECT
 * @property int|null $PAYMENT_DAY
 * @property int|null $EXCISE
 * @property int|null $FRACTION
 * @property int $TAX_FRACTION
 * @property int $TAX_FRACTION_TIMING
 * @property int $DECIMAL_QUANTITY
 * @property int $DECIMAL_UNITPRICE
 * @property int $SERIAL_NUMBER
 * @property string|null $ACCOUNT_HOLDER
 * @property string|null $BANK_NAME
 * @property string|null $BANK_BRANCH
 * @property int|null $ACCOUNT_TYPE
 * @property string|null $ACCOUNT_NUMBER
 * @property string|null $SEAL
 * @property int $CMP_SEAL_FLG
 * @property int $COLOR
 * @property int $DIRECTION
 * @property Carbon $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TCOMPANY extends Model
{
	protected $table = 'T_COMPANY';
	protected $primaryKey = 'CMP_ID';
	public $timestamps = false;

	protected $casts = [
		'CNT_ID' => 'int',
		'HONOR_CODE' => 'int',
		'CUTOOFF_SELECT' => 'int',
		'CUTOOFF_DATE' => 'int',
		'PAYMENT_MONTH' => 'int',
		'PAYMENT_SELECT' => 'int',
		'PAYMENT_DAY' => 'int',
		'EXCISE' => 'int',
		'FRACTION' => 'int',
		'TAX_FRACTION' => 'int',
		'TAX_FRACTION_TIMING' => 'int',
		'DECIMAL_QUANTITY' => 'int',
		'DECIMAL_UNITPRICE' => 'int',
		'SERIAL_NUMBER' => 'int',
		'ACCOUNT_TYPE' => 'int',
		'CMP_SEAL_FLG' => 'int',
		'COLOR' => 'int',
		'DIRECTION' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'NAME',
		'REPRESENTATIVE',
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
		'INVOICE_NUMBER',
		'HONOR_CODE',
		'HONOR_TITLE',
		'CUTOOFF_SELECT',
		'CUTOOFF_DATE',
		'PAYMENT_MONTH',
		'PAYMENT_SELECT',
		'PAYMENT_DAY',
		'EXCISE',
		'FRACTION',
		'TAX_FRACTION',
		'TAX_FRACTION_TIMING',
		'DECIMAL_QUANTITY',
		'DECIMAL_UNITPRICE',
		'SERIAL_NUMBER',
		'ACCOUNT_HOLDER',
		'BANK_NAME',
		'BANK_BRANCH',
		'ACCOUNT_TYPE',
		'ACCOUNT_NUMBER',
		'SEAL',
		'CMP_SEAL_FLG',
		'COLOR',
		'DIRECTION',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
