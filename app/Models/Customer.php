<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Quote;
use App\Models\Bill;
use App\Models\Delivery;
use App\Models\CustomerCharge;
use App\Models\Charge;
use Illuminate\Http\Request;
class Customer extends Model
{

    protected $table = 'T_CUSTOMER';

    protected $primaryKey = 'CST_ID';

    // Search fields
    protected $searchColumns = [
        'NAME' => ['Customer.NAME', 'Customer.NAME_KANA'], // OR search
        'ADDRESS' => 'Customer.SEARCH_ADDRESS',
        'CST_ID' => 'Customer.CST_ID'
    ];

    protected $joins;

    protected $order = 'CST_ID DESC';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'USR_ID');
    }

    protected $accessible = [
        'Customer' => [
            'CST_ID',
    				'NAME',
    				'NAME_KANA',
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
    				'HONOR_CODE',
    				'HONOR_TITLE',
    				'WEBSITE',
    				'CHR_NAME',
    				'CHR_ID',
    				'CUTOOFF_SELECT',
    				'CUTOOFF_DATE',
    				'PAYMENT_MONTH',
    				'PAYMENT_SELECT',
    				'PAYMENT_DAY',
    				'EXCISE',
    				'TAX_FRACTION',
    				'TAX_FRACTION_TIMING',
    				'FRACTION',
    				'NOTE',
    				'USR_ID',
    				'UPDATE_USR_ID',
    				'SEARCH_ADDRESS',
    				'CMP_ID',
    				'INSERT_DATE',
    				'LAST_UPDATE',
        ]
    ];

    protected $validate = [
        'NAME' => [
            "rule0" => [
                'rule' => [
                    'spaceOnly'
                ],
                'message' => 'スペース以外も入力してください'
            ],
            "rule1" => [
                'rule' => 'notEmpty',
                'message' => '社名は必須項目です'
            ],
            "rule2" => [
                'rule' => [
                    'maxLengthW',
                    30
                ],
                'message' => '社名が長すぎます'
            ]
        ],
        'NAME_KANA' => [
            "rule2" => [
                'rule' => [
                    'maxLengthJP',
                    100
                ],
                'message' => '社名カナが長すぎます'
            ],
            "rule3" => [
                'rule' => [
                    'katakanaSpace'
                ],
                'message' => '社名カナに入力できない値があります。'
            ],
            "rule4" => [
                'rule' => [
                    'spaceOnly'
                ],
                'message' => 'スペース以外も入力してください'
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
                'message' => 'スペース以外も入力してください'
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
            "rule1" => [
                'rule' => [
                    'maxLengthW',
                    50
                ],
                'message' => '建物名が長すぎます'
            ]
        ],
        'WEBSITE' => [
            "rule1" => [
                'rule' => [
                    'url',
                    true
                ],
                'message' => 'ホームページアドレスが正しくありません',
                'allowEmpty' => true
            ],
            "rule2" => [
                'rule' => [
                    'maxLengthJP',
                    100
                ],
                'message' => 'ホームページアドレスが長すぎます'
            ]
        ],
        'NOTE' => [
            "rule0" => [
                'rule' => [
                    'maxLengthJP',
                    1000
                ],
                'message' => '備考が長すぎます'
            ]
        ],
        'CUTOOFF_DATE' => [
            "rule0" => [
                'rule' => [
                    'RadioPairTxt',
                    'CUTOOFF_SELECT',
                    1
                ],
                'message' => '日付を入力してください'
            ],
            "rule1" => [
                'rule' => 'Numberonly',
                'message' => '正しい日付を入力してください'
            ],
            "rule2" => [
                'rule' => [
                    'range',
                    0,
                    32
                ],
                'message' => '正しい日付を入力してください',
                'allowEmpty' => true
            ]
        ],
        'PAYMENT_DAY' => [
            "rule0" => [
                'rule' => [
                    'RadioPairTxt',
                    'PAYMENT_SELECT',
                    1
                ],
                'message' => '日付を入力してください'
            ],
            "rule1" => [
                'rule' => 'Numberonly',
                'message' => '正しい日付を入力してください'
            ],
            "rule2" => [
                'rule' => [
                    'range',
                    0,
                    32
                ],
                'message' => '正しい日付を入力してください',
                'allowEmpty' => true
            ]
        ],
        'HONOR_TITLE' => [
            "rule0" => [
                'rule' => [
                    'maxLengthW',
                    4
                ],
                'message' => '敬称が長すぎます'
            ]
        ]
    ];
    protected $fillable = [
        'CNT_ID', 'ADDRESS', 'BUILDING', 'SEARCH_ADDRESS', 'CMP_ID', 'INSERT_DATE', 'LAST_UPDATE'
    ];


    public function setData($param, $companyId, $state = '', $phoneError = false, $faxError = false)
    {
        // Create the search address
        $county = config('prefecture_code');
        if (!isset($param['BUILDING'])) {
            $param['BUILDING'] = "";
        }

        if ($param['CNT_ID'] != 0) {
            $param['SEARCH_ADDRESS'] = $county[$param['CNT_ID']] . $param['ADDRESS'] . $param['BUILDING'];
        } else {
            $param['SEARCH_ADDRESS'] = "";
        }

        // Set the company information
        $param['CMP_ID'] = $companyId;

        // Set the timestamps
        if ($state === "new") {
            $param['INSERT_DATE'] = now();
        }
        $param['LAST_UPDATE'] = now();

        try {
            $customer = $this->create($param);
            return $customer->toArray();
        } catch (\Exception $e) {
            $errors = $this->getErrors();
            if ($phoneError) {
                $errors['PHONE'] = "正しい電話番号を入力してください";
            }
            if ($faxError) {
                $errors['FAX'] = "正しいfax番号を入力してください";
            }
            return ['error' => $errors];
        }
    }

    protected function getErrors()
    {
        return $this->getErrors();
    }
    public function indexDelete(Request $request)
    {
        $errors = [];

        $quote = new Quote();
        $bill = new Bill();
        $delivery = new Delivery();
        $customerCharge = new CustomerCharge();

        $ids = [];

        // Collect items to be deleted
        if ($request->has('Customer')) {
            foreach ($request->input('Customer') as $key => $value) {
                if ($value == 1) {
                    if ($quote->whereCST_ID($key)->exists()) {
                        $errors['Quote'] = 1;
                    } elseif ($bill->whereCST_ID($key)->exists()) {
                        $errors['Bill'] = 1;
                    } elseif ($delivery->whereCST_ID($key)->exists()) {
                        $errors['Delivery'] = 1;
                    } elseif ($customerCharge->whereCST_ID($key)->exists()) {
                        $errors['CustomerCharge'] = 1;
                    } else {
                        $ids[] = $key;
                    }
                }
            }
        }

        if ($errors) {
            return false;
        }

        if ($ids) {
            // Delete customers
            Customer::whereIn('CST_ID', $ids)->delete();
            return true;
        } else {
            return false;
        }
    }

    // Select charge function
    public function selectCharge($companyId, $condition = null)
    {
        $charge = new Charge();

        $result = $charge->select('CHR_ID', 'CHARGE_NAME')
                         ->when($condition, function ($query) use ($condition) {
                             return $query->where($condition);
                         })
                         ->get();

        $param = [];
        foreach ($result as $value) {
            $param[$value->CHR_ID] = $value->CHARGE_NAME;
        }

        return $param;
    }
    function getCharge($chrId)
{
    // Load the Charge model
    $charge = Charge::query()
        ->select('CHR_ID', 'CHARGE_NAME')
        ->where('CHR_ID', $chrId)
        ->first();

    // Prepare the response
    $param = '';
    if ($charge) {
        $param = $charge->CHARGE_NAME;
    }

    return $param;
}

// Get customer information
function editSelect($customerId)
{
    $result = Customer::query()
        ->where('CST_ID', $customerId)
        ->first();

    return $result;
}

// Get customer information
function selectCustomer($condition = null)
{
    $customers = Customer::query()
        ->select('CST_ID', 'NAME')
        ->when($condition, function ($query) use ($condition) {
            return $query->where($condition);
        })
        ->get();

    $result = [0 => 'Select a customer'];

    foreach ($customers as $customer) {
        $result[$customer->CST_ID] = $customer->NAME;
    }

    return $result;
}

// Get customer information
function getCustomer($custId)
{
    $customer = Customer::query()
        ->select('CST_ID', 'NAME')
        ->where('CST_ID', $custId)
        ->first();

    $param = '';
    if ($customer) {
        $param = $customer->NAME;
    }

    return $param;
}
function checkPegging($param)
{
    $id = collect($param)->pluck('Customer.CST_ID')->toArray();

    if (empty($id)) {
        return false;
    }

    $param = array_fill_keys($id, 0);

    $quote = Quote::whereIn('CST_ID', $id)->pluck('CST_ID')->keyBy(function ($item) {
        return $item;
    })->all();

    $bill = Bill::whereIn('CST_ID', $id)->pluck('CST_ID')->keyBy(function ($item) {
        return $item;
    })->all();

    $delivery = Delivery::whereIn('CST_ID', $id)->pluck('CST_ID')->keyBy(function ($item) {
        return $item;
    })->all();

    $customerCharge = CustomerCharge::whereIn('CST_ID', $id)->pluck('CST_ID')->keyBy(function ($item) {
        return $item;
    })->all();

    $param = array_merge($param, $quote, $bill, $delivery, $customerCharge);

    return $param;
}

function getHonor($companyId)
{
    $form = new FormModel();
    return $form->getHonor($companyId);
}
public function getPayment($companyId)
{
    // Load the company model
    $company = Company::find($companyId);

    if (!$company) {
        return false;
    }

    $param = [
        'Customer' => [
            'CUTOOFF_SELECT' => 0,
            'PAYMENT_SELECT' => 0,
            'EXCISE' => $company->EXCISE,
            'FRACTION' => $company->FRACTION,
            'TAX_FRACTION' => $company->TAX_FRACTION,
            'TAX_FRACTION_TIMING' => $company->TAX_FRACTION_TIMING,
        ]
    ];

    return $param;
}

/**
 * Get the number of invoices for each customer.
 *
 * @return array
 */
public function getInvoiceNum()
{
    $distinctCustomerIds = Customer::distinct()->pluck('CST_ID')->toArray();
    $invNum = [];

    foreach ($distinctCustomerIds as $customerId) {
        $invNum[$customerId] = [
            'Quote' => Quote::where('CST_ID', $customerId)->distinct('MQT_ID')->count(),
            'Bill' => Bill::where('CST_ID', $customerId)->distinct('MBL_ID')->count(),
            'Delivery' => Delivery::where('CST_ID', $customerId)->distinct('MDV_ID')->count(),
        ];
    }

    return $invNum;
}
}
