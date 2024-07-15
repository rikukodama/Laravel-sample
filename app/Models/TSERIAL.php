<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TSERIAL
 * 
 * @property int $FORM_ID
 * @property int $NUMBERING_FORMAT
 * @property string $PREFIX
 * @property string $NEXT
 * @property Carbon $LAST_UPDATE
 *
 * @package App\Models
 */
class TSERIAL extends Model
{
	protected $table = 'T_SERIAL';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FORM_ID' => 'int',
		'NUMBERING_FORMAT' => 'int',
		'LAST_UPDATE' => 'datetime'
	];

	protected $fillable = [
		'FORM_ID',
		'NUMBERING_FORMAT',
		'PREFIX',
		'NEXT',
		'LAST_UPDATE'
	];
}
