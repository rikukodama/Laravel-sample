<?php

/**
 * @copyright ICZ Corporation (http://www.icz.co.jp/)
 * @license See the LICENCE file
 * @author <matcha@icz.co.jp>
 * @version $Id$
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    use HasFactory;

    protected $table = 't_charge';
    protected $primaryKey = 'chr_id';
    public $timestamps = false;

    protected $fillable = [
        'status',
        'update_usr_id',
        'search_address',
        'insert_date',
        'cmp_id',
        'last_update',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id');
    }
    protected $accessible = [
        'Charge' => [
            'CHR_ID',
            'STATUS',
            'CHARGE_NAME',
            'CHARGE_NAME_KANA',
            'UNIT',
            'POST',
            'MAIL',
            'POSTCODE1',
            'POSTCODE2',
            'CNT_ID',
            'ADDRESS',
            'BUILDING',
            'PHONE_NO1',
            'PHONE_NO2',
            'PHONE_NO3',
            'FAX_NO1',
            'FAX_NO2',
            'FAX_NO3',
            'SEAL_METHOD',
            'SEAL_STR',
            'SEAL',
            'DEL_SEAL',
            'CHR_SEAL_FLG',
            'USR_ID',
            'UPDATE_USR_ID',
            'SEARCH_ADDRESS',
            'INSERT_DATE',
            'CMP_ID',
            'LAST_UPDATE',
        ]
    ];
    protected $validate = [
        'UNIT' => [
            "rule2" => [
                'rule' => [
                    'maxLengthW',
                    30
                ],
                'message' => '部署名が長すぎます'
            ]
        ],
            'POST' => [
                "rule2" => [
                    'rule' => [
                        'maxLengthW',
                        30
                    ],
                    'message' => '役職名が長すぎます'
                ]
            ],
            'CHARGE_NAME' => [
                "rule1" => [
                    'rule' => 'notEmpty',
                    'message' => '担当者名は必須項目です'
                ],
                "rule2" => [
                    'rule' => [
                        'maxLengthW',
                        30
                    ],
                    'message' => '担当者名が長すぎます'
                ]
            ],
            'CHARGE_NAME_KANA' => [
                "rule2" => [
                    'rule' => [
                        'maxLengthJP',
                        60
                    ],
                    'message' => '担当者名（カナ）が長すぎます'
                ],
                "rule3" => [
                    'rule' => [
                        'katakanaSpace'
                    ],
                    'message' => '担当者名（カナ）に入力できない値があります。'
                ],
                "rule4" => [
                    'rule' => [
                        'spaceOnly'
                    ],
                    'message' => 'スペース以外も入力してください'
                ]
            ],
            'MAIL' => [
                "rule1" => [
                    'rule' => [
                        'maxLengthJP',
                        256
                    ],
                    'message' => 'メールアドレスが長すぎます'
                ],
                "rule2" => [
                    'rule' => [
                        'email'
                    ],
                    'message' => '有効なメールアドレスではありません',
                    'allowEmpty' => true
                ]
            ],
            'POSTCODE1' => [
                "rule0" => [
                    'rule' => [
                        'spaceOnly'
                    ],
                    'message' => '正しい郵便番号を入力してください'
                ],
                "rule2" => [
                    'rule' => [
                        'maxLengthJP',
                        3
                    ],
                    'message' => '正しい郵便番号を入力してください'
                ],
                "rule3" => [
                    'rule' => 'Numberonly',
                    'message' => '正しい郵便番号を入力してください'
                ]
            ],
            'POSTCODE2' => [
                "rule0" => [
                    'rule' => [
                        'spaceOnly'
                    ],
                    'message' => '正しい郵便番号を入力してください'
                ],
                "rule2" => [
                    'rule' => [
                        'maxLengthJP',
                        4
                    ],
                    'message' => '正しい郵便番号を入力してください'
                ],
                "rule3" => [
                    'rule' => 'Numberonly',
                    'message' => '正しい郵便番号を入力してください'
                ]
            ],
            'ADDRESS' => [
                "rule0" => [
                    'rule' => [
                        'spaceOnly'
                    ],
                    'message' => 'スペース以外も入力してください'
                ],
                "rule2" => [
                    'rule' => [
                        'maxLengthW',
                        50
                    ],
                    'message' => '住所が長すぎます'
                ]
            ],
            'BUILDING' => [
                "rule2" => [
                    'rule' => [
                        'maxLengthW',
                        50
                    ],
                    'message' => '建物名が長すぎます'
                ]
            ],
            'SEAL_STR' => [
                "rule1" => [
                    'rule' => [
                        'maxLengthJP',
                        4
                    ],
                    'message' => '印鑑の名前が長すぎます'
                ]
            ],
            'SEAL_METHOD' => [
                "rule1" => [
                    'rule' => 'notEmpty',
                    'message' => '印鑑作成方法は必須です。'
                ]
            ]
        ];
        public function indexSelect($companyId)
{
    return $this->where('CMP_ID', $companyId)
        ->select('CHR_ID', 'CHARGE_NAME', 'UNIT', 'PHONE_NO1', 'PHONE_NO2', 'PHONE_NO3', 'STATUS')
        ->get();
}

public function indexDelete($params)
{
    $chargeIds = array_keys(array_filter($params['Charge'], function ($value) {
        return $value == 1;
    }));

    $customers = Customer::whereIn('CHR_ID', $chargeIds)
        ->select('CST_ID', 'CHR_ID')
        ->get();

    DB::beginTransaction();

    try {
        foreach ($customers as $customer) {
            $customer->CHR_ID = 0;
            $customer->save();
        }

        $this->whereIn('CHR_ID', $chargeIds)->delete();

        DB::commit();
        return true;
    } catch (\Exception $e) {
        DB::rollBack();
        return false;
    }
}

public function getCharge($chrId)
{
    $result = $this->where('CHR_ID', $chrId)
        ->select('CHARGE_NAME')
        ->first();

    return $result ? $result->CHARGE_NAME : null;
}
public function setData($param, $companyID, $perror, $ferror, &$chrID = null)
{
    // Create the search address
    $county = config('prefecture_code');
    $param['Charge']['SEARCH_ADDRESS'] = "";

    if ($param['Charge']['CNT_ID']) {
        $param['Charge']['SEARCH_ADDRESS'] .= $county[$param['Charge']['CNT_ID']];
    }

    $param['Charge']['SEARCH_ADDRESS'] .= $param['Charge']['ADDRESS'] . $param['Charge']['BUILDING'];

    $imageerror = 0;

    // Add the timestamp
    if (!isset($param['Charge']['CHR_ID'])) {
        // Only on the first update
        $param['Charge']['INSERT_DATE'] = now()->format('Y-m-d H:i:s');
    }
    $param['Charge']['LAST_UPDATE'] = now()->format('Y-m-d H:i:s');
    $param['Charge']['CMP_ID'] = $companyID;

    $other = app(OtherModel::class);

    // Register the seal
    if ($param['Charge']['SEAL_METHOD'] == 0) {
        $other->imageCreate($param, 'Charge', $imageerror);
    }

    // Start the transaction
    DB::beginTransaction();

    // Save to the database
    if ($this->create($this->permitParams($param))) {
        if ($perror != 1 && $ferror != 1 && empty($imageerror)) {
            DB::commit();
            $chrID = $this->id;
            return true;
        } else {
            // Failed
            DB::rollBack();
            if (!empty($imageerror)) {
                return $imageerror;
            }
            return false;
        }
    } else {
        DB::rollBack();

        if (!empty($imageerror)) {
            return $imageerror;
        }
        return false;
    }
}

// Edit the person in charge
public function editSelect($chargeID)
{
    $result = $this->where('CHR_ID', $chargeID)->first();
    return $result;
}

/**
 * Get the image
 *
 * @param array $companyID
 * @return $result
 */
function getImage($chargeID)
{
    $result = Charge::where('CHR_ID', $chargeID)
        ->select('Charge.SEAL')
        ->first();

    // If not found
    if (!$result) {
        return null;
    }

    return $result->Charge->SEAL;
}

/**
 * Delete the seal
 *
 * @param array $chargeID
 * @return bool
 */
function sealDelete($chargeID)
{
    $result = Charge::find($chargeID);
    $result->Charge->SEAL = null;
    if ($result) {
        // Delete process
        return $result->saveAll();
    } else {
        return false;
    }
}

// Get the seal setting flag
function getSealFlag($chargeID)
{
    $result = Charge::where('Charge.CHR_ID', $chargeID)
        ->select('Charge.CHR_SEAL_FLG')
        ->first();

    return $result->Charge->CHR_SEAL_FLG;
}

/*
 * Search
 */
// Fields
protected $searchColumnArray = [
    'CHARGE_NAME' => [ // OR search
        'Charge.CHARGE_NAME',
        'Charge.CHARGE_NAME_KANA'
    ],
    'UNIT' => [
        'Charge.UNIT'
    ],
    'STATUS' => 'Charge.STATUS'
];

// Order by
protected $order = [
    'CHR_ID' => 'DESC'
];
function checkPegging($param)
{
    $ids = [];
    $results = [];

    if (is_array($param)) {
        foreach ($param as $key => $value) {
            $ids[] = $value['Charge']['CHR_ID'];
            $results[$value['Charge']['CHR_ID']] = 0;
        }
    }

    if (empty($ids)) {
        return false;
    }

    // Load the Quote model
    $quote = Quote::whereIn('CHR_ID', $ids)
        ->select('CHR_ID')
        ->get();

    if ($quote->isNotEmpty()) {
        foreach ($quote as $q) {
            $results[$q->CHR_ID] = 1;
        }
    }

    // Load the Bill model
    $bill = Bill::whereIn('CHR_ID', $ids)
        ->select('CHR_ID')
        ->get();

    if ($bill->isNotEmpty()) {
        foreach ($bill as $b) {
            $results[$b->CHR_ID] = 1;
        }
    }

    // Load the Delivery model
    $delivery = Delivery::whereIn('CHR_ID', $ids)
        ->select('CHR_ID')
        ->get();

    if ($delivery->isNotEmpty()) {
        foreach ($delivery as $d) {
            $results[$d->CHR_ID] = 1;
        }
    }

    return $results;
}
}
