<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TMAIL
 * 
 * @property int $TML_ID
 * @property int $FRM_ID
 * @property int $USR_ID
 * @property string $RECEIVER
 * @property string $SENDER
 * @property string $RCV_NAME
 * @property string $SND_NAME
 * @property string $SUBJECT
 * @property string $CUSTOMER
 * @property string $SND_MESSAGE
 * @property string|null $RCV_MESSAGE
 * @property int $STATUS
 * @property int $TYPE
 * @property string|null $TOKEN
 * @property string $PASSWORD
 * @property Carbon $SND_DATE
 * @property Carbon|null $RCV_DATE
 *
 * @package App\Models
 */
class TMAIL extends Model
{
	protected $table = 'T_MAIL';
	protected $primaryKey = 'TML_ID';
	public $timestamps = false;

	protected $casts = [
		'FRM_ID' => 'int',
		'USR_ID' => 'int',
		'STATUS' => 'int',
		'TYPE' => 'int',
		'SND_DATE' => 'datetime',
		'RCV_DATE' => 'datetime'
	];

	protected $fillable = [
		'FRM_ID',
		'USR_ID',
		'RECEIVER',
		'SENDER',
		'RCV_NAME',
		'SND_NAME',
		'SUBJECT',
		'CUSTOMER',
		'SND_MESSAGE',
		'RCV_MESSAGE',
		'STATUS',
		'TYPE',
		'TOKEN',
		'PASSWORD',
		'SND_DATE',
		'RCV_DATE'
	];
}
