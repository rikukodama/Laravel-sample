<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TITEM
 * 
 * @property int $ITM_ID
 * @property int $USR_ID
 * @property int $UPDATE_USR_ID
 * @property string $ITEM
 * @property string $ITEM_KANA
 * @property string $ITEM_CODE
 * @property string $UNIT
 * @property string $UNIT_PRICE
 * @property int $TAX_CLASS
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TITEM extends Model
{
	protected $table = 'T_ITEM';
	protected $primaryKey = 'ITM_ID';
	public $timestamps = false;

	protected $casts = [
		'USR_ID' => 'int',
		'UPDATE_USR_ID' => 'int',
		'TAX_CLASS' => 'int',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'USR_ID',
		'UPDATE_USR_ID',
		'ITEM',
		'ITEM_KANA',
		'ITEM_CODE',
		'UNIT',
		'UNIT_PRICE',
		'TAX_CLASS',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
