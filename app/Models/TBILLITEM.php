<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TBILLITEM
 *
 * @property int $ITM_ID
 * @property int|null $MBL_ID
 * @property string|null $ITEM_NO
 * @property string|null $ITEM_CODE
 * @property string|null $ITEM
 * @property string|null $QUANTITY
 * @property string|null $UNIT
 * @property string|null $UNIT_PRICE
 * @property string|null $DISCOUNT
 * @property int|null $DISCOUNT_TYPE
 * @property int $LINE_ATTRIBUTE
 * @property int $TAX_CLASS
 * @property string|null $AMOUNT
 * @property Carbon $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TBILLITEM extends Model
{
	protected $table = 't_bill_item';
	protected $primaryKey = 'ITM_ID';
	public $timestamps = false;

	protected $casts = [
		'MBL_ID' => 'int',
		'DISCOUNT_TYPE' => 'int',
		'LINE_ATTRIBUTE' => 'int',
		'TAX_CLASS' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'MBL_ID',
		'ITEM_NO',
		'ITEM_CODE',
		'ITEM',
		'QUANTITY',
		'UNIT',
		'UNIT_PRICE',
		'DISCOUNT',
		'DISCOUNT_TYPE',
		'LINE_ATTRIBUTE',
		'TAX_CLASS',
		'AMOUNT',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
