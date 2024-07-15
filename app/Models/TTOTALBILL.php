<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TTOTALBILL
 *
 * @property int $TBL_ID
 * @property int $CST_ID
 * @property int|null $CHRC_ID
 * @property int $USR_ID
 * @property int $UPDATE_USR_ID
 * @property Carbon $ISSUE_DATE
 * @property string|null $DUE_DATE
 * @property string $SUBJECT
 * @property string $NO
 * @property int $HONOR_CODE
 * @property string $HONOR_TITLE
 * @property string|null $LASTM_BILL
 * @property string|null $DEPOSIT
 * @property string|null $CARRY_BILL
 * @property string|null $SALE
 * @property string|null $SALE_TAX
 * @property string|null $THISM_BILL
 * @property string|null $SUBTOTAL
 * @property bool|null $EDIT_STAT
 * @property bool|null $STATUS
 * @property Carbon|null $INSERT_DATE
 * @property Carbon|null $LAST_UPDATE
 *
 * @package App\Models
 */
class TTOTALBILL extends Model
{
	protected $table = 'T_TOTAL_BILL';
	protected $primaryKey = 'TBL_ID';
	public $timestamps = false;

	protected $casts = [
		'CST_ID' => 'int',
		'CHRC_ID' => 'int',
		'USR_ID' => 'int',
		'UPDATE_USR_ID' => 'int',
		'ISSUE_DATE' => 'datetime',
		'HONOR_CODE' => 'int',
		'EDIT_STAT' => 'bool',
		'STATUS' => 'bool',
		'INSERT_DATE' => 'datetime',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'CST_ID',
		'CHRC_ID',
		'USR_ID',
		'UPDATE_USR_ID',
		'ISSUE_DATE',
		'DUE_DATE',
		'SUBJECT',
		'NO',
		'HONOR_CODE',
		'HONOR_TITLE',
		'LASTM_BILL',
		'DEPOSIT',
		'CARRY_BILL',
		'SALE',
		'SALE_TAX',
		'THISM_BILL',
		'SUBTOTAL',
		'EDIT_STAT',
		'STATUS',
		'INSERT_DATE',
		'LAST_UPDATE'
	];
}
