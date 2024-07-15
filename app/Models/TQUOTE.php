<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TQUOTE
 *
 * @property int $MQT_ID
 * @property int $CST_ID
 * @property int|null $CHR_ID
 * @property int|null $CHRC_ID
 * @property int $USR_ID
 * @property int $UPDATE_USR_ID
 * @property Carbon|null $ISSUE_DATE
 * @property string|null $DUE_DATE
 * @property string|null $SUBJECT
 * @property int $HONOR_CODE
 * @property string $HONOR_TITLE
 * @property int $CMP_SEAL_FLG
 * @property int $CHR_SEAL_FLG
 * @property string|null $NO
 * @property int $STATUS
 * @property string|null $MEMO
 * @property int|null $DECIMAL_QUANTITY
 * @property int|null $DECIMAL_UNITPRICE
 * @property int $EXCISE
 * @property int $FRACTION
 * @property int $TAX_FRACTION
 * @property int $TAX_FRACTION_TIMING
 * @property string|null $DISCOUNT
 * @property int $DISCOUNT_TYPE
 * @property string|null $DELIVERY
 * @property string|null $DEADLINE
 * @property string|null $DEAL
 * @property string|null $NOTE
 * @property string|null $SUBTOTAL
 * @property string|null $SALES_TAX
 * @property string|null $TOTAL
 * @property string|null $FIVE_RATE_TAX
 * @property string|null $FIVE_RATE_TOTAL
 * @property string|null $EIGHT_RATE_TAX
 * @property string|null $EIGHT_RATE_TOTAL
 * @property string|null $REDUCED_RATE_TAX
 * @property string|null $REDUCED_RATE_TOTAL
 * @property string|null $TEN_RATE_TAX
 * @property string|null $TEN_RATE_TOTAL
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TQUOTE extends Model
{
	protected $table = 'T_QUOTE';
	protected $primaryKey = 'MQT_ID';
	public $timestamps = false;

	protected $casts = [
		'CST_ID' => 'int',
		'CHR_ID' => 'int',
		'CHRC_ID' => 'int',
		'USR_ID' => 'int',
		'UPDATE_USR_ID' => 'int',
		'ISSUE_DATE' => 'datetime',
		'HONOR_CODE' => 'int',
		'CMP_SEAL_FLG' => 'int',
		'CHR_SEAL_FLG' => 'int',
		'STATUS' => 'int',
		'DECIMAL_QUANTITY' => 'int',
		'DECIMAL_UNITPRICE' => 'int',
		'EXCISE' => 'int',
		'FRACTION' => 'int',
		'TAX_FRACTION' => 'int',
		'TAX_FRACTION_TIMING' => 'int',
		'DISCOUNT_TYPE' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'CST_ID',
		'CHR_ID',
		'CHRC_ID',
		'USR_ID',
		'UPDATE_USR_ID',
		'ISSUE_DATE',
		'DUE_DATE',
		'SUBJECT',
		'HONOR_CODE',
		'HONOR_TITLE',
		'CMP_SEAL_FLG',
		'CHR_SEAL_FLG',
		'NO',
		'STATUS',
		'MEMO',
		'DECIMAL_QUANTITY',
		'DECIMAL_UNITPRICE',
		'EXCISE',
		'FRACTION',
		'TAX_FRACTION',
		'TAX_FRACTION_TIMING',
		'DISCOUNT',
		'DISCOUNT_TYPE',
		'DELIVERY',
		'DEADLINE',
		'DEAL',
		'NOTE',
		'SUBTOTAL',
		'SALES_TAX',
		'TOTAL',
		'FIVE_RATE_TAX',
		'FIVE_RATE_TOTAL',
		'EIGHT_RATE_TAX',
		'EIGHT_RATE_TOTAL',
		'REDUCED_RATE_TAX',
		'REDUCED_RATE_TOTAL',
		'TEN_RATE_TAX',
		'TEN_RATE_TOTAL',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
