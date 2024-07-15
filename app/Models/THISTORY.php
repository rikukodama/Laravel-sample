<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class THISTORY
 * 
 * @property int $HST_ID
 * @property int $USR_ID
 * @property int|null $RPT_ID
 * @property int $ACTION
 * @property Carbon $ACTION_DATE
 * @property string $BROWSER
 *
 * @package App\Models
 */
class THISTORY extends Model
{
	protected $table = 'T_HISTORY';
	protected $primaryKey = 'HST_ID';
	public $timestamps = false;

	protected $casts = [
		'USR_ID' => 'int',
		'RPT_ID' => 'int',
		'ACTION' => 'int',
		'ACTION_DATE' => 'datetime'
	];

	protected $fillable = [
		'USR_ID',
		'RPT_ID',
		'ACTION',
		'ACTION_DATE',
		'BROWSER'
	];
}
