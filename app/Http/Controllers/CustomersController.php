<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Config;

class CustomersController extends Controller
{
    private $common;
    private $customer;




    
    public function __construct(Common $common, Customer $customer)
    {
        $this->common = $common;
        $this->customer = $customer;

    }
    public function index()
    {
        $main_title = "取引先一覧";
        $title_text = "顧客管理";

        $company_ID = 1;

        // Deleting
        if ($request->has('delete_x')) {
            // Token check
            $this->isCorrectToken($request->input('Security.token'));

            $error = [];

            // Success
            if ($customer = Customer::index_delete($request->all(), $error)) {
                session()->flash('success', '取引先を削除しました');
                return redirect('/customers');
            } // Failure
            else {
                session()->flash('error', '取引先の削除に失敗しました');
                return redirect('/customers');
            }
        } else {
            $condition = [];
            $charge = Customer::select_charge($company_ID, $condition);

            // Set data
            return view('customers.index', [
                'page_title' => 'Customer',
                'charges' => $charge,
                'countys' => Config::get('PrefectureCode'),
            ]);
        }
    }

    public function select(Request $request)
    {
        // Set the main title
        $mainTitle = "顧客から絞り込み";

        // Set the title text
        $titleText = "帳票管理";

        // Get the invoice number
        $invoiceNum = $this->customer->getInvoiceNum();

        // Get the search columns from the request
        $searchColumns = $request->all();
        unset($searchColumns['url']);

        if (!empty($searchColumns)) {
            // Define the search column array
            $searchColumnArray = [
                'NAME' => [
                    'Customer.NAME',
                    'Customer.NAME_KANA'
                ],
                'CST_ID' => 'Customer.CST_ID'
            ];

            // Paginate the results using the search columns
            $paginator = $this->common->paginate($searchColumnArray);
        } else {
            // Paginate the results without any search columns
            $paginator = $this->common->paginate();
        }

        // Get the company ID (hardcoded to 1 in the original code)
        $companyId = 1;

        // Get the charge data
        $charge = $this->customer->selectCharge($companyId, []);

        // Set the data to be passed to the view
        return view('your.view.name', [
            'mainTitle' => $mainTitle,
            'titleText' => $titleText,
            'invoiceNum' => $invoiceNum,
            'paginator' => $paginator,
            'charges' => $charge,
            'counties' => config('app.prefecture_code'),
        ]);
    }
    protected function isCorrectToken($token)
    {
        // Implement token verification logic
    }

    function check()
{
    $this->set("main_title", "取引先確認");
    $this->set("title_text", "顧客管理");

    $company_ID = 1;

    // IDの取得
    if (isset($this->params['pass'][0])) {
        $customer_ID = $this->params['pass'][0];
        $this->data = $this->Customer->find('first', [
            'conditions' => [
                'CST_ID' => $customer_ID
            ]
        ]);
    }

    $editauth = $this->Get_Edit_Authority($this->data['Customer']['USR_ID']);
    if (!$this->Get_Check_Authority($this->data['Customer']['USR_ID'])) {
        $this->Session->setFlash('ページを開く権限がありません');
        return redirect("/customers");
    }

    $charge = $this->Customer->get_charge($this->data['Customer']['CHR_ID']);

    $this->set("editauth", $editauth);
    $this->set("cstID", $customer_ID);
    $this->set("payment", config('app.PaymentMonth'));
    $this->set("cutooff_select", [
        0 => '末日',
        1 => '指定'
    ]);
    $this->set("payment_select", [
        0 => '末日',
        1 => '指定'
    ]);
    $this->set("countys", config('app.PrefectureCode'));
    $this->set("charge", $charge);
    $this->set("excises", config('app.ExciseCode'));
    $this->set("fractions", config('app.FractionCode'));
    $this->set("tax_fraction_timing", config('app.TaxFractionTimingCode'));
    $this->set("honor", config('app.HonorCode'));
}

// 登録用
function add()
{
    $this->set("main_title", "取引先登録");
    $this->set("title_text", "顧客管理");

    // キャンセルボタンを押下すると一覧にリダイレクト
    if (isset($this->params['form']['cancel_x'])) {
        return redirect("/customers");
    }

    // テスト用データ
    $company_ID = 1;
    $phone_error = 0;
    $fax_error = 0;

    if (isset($this->params['form']['submit_x'])) {
        // トークンチェック
        $this->isCorrectToken($this->data['Security']['token']);

        // 電話番号のバリデーション
        $phone_error = $this->phone_validation($this->params['data']['Customer']);
        // FAX番号のバリデーション
        $fax_error = $this->fax_validation($this->params['data']['Customer']);

        // 敬称がその他の場合
        if ($this->params['data']['Customer']['HONOR_CODE'] != 2) {
            $this->params['data']['Customer']['HONOR_TITLE'] = "";
        }
        // データのインサート
        $setdata = $this->Customer->set_data($this->params['data'], $company_ID, 'new', $phone_error, $fax_error);
        if (!isset($setdata['error'])) {
            // 成功
            $customer_ID = $setdata['Customer']['CST_ID'];
            $this->Session->setFlash('取引先を保存しました');
            return redirect("/customers/check/" . $customer_ID);
        }
    } else {
        // 自社情報の取得
        $this->data = $this->Customer->get_payment($company_ID);
        if ($default_honor = $this->Customer->get_honor($company_ID)) {
            $this->data['Customer']['HONOR_CODE'] = $default_honor[0]['Company']['HONOR_CODE'];
            if ($default_honor[0]['Company']['HONOR_CODE'] == 2) {
                $this->data['Customer']['HONOR_TITLE'] = $default_honor[0]['Company']['HONOR_TITLE'];
            }
        }
    }

    // 消費税
    $excise = [
        'type' => 'radio',
        'options' => config('app.ExciseCode'),
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'width:30px;'
    ];

    // 端数処理
    $fraction = [
        'type' => 'radio',
        'options' => config('app.FractionCode'),
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'width:30px;'
    ];
    // 消費税端数計算
    $tax_fraction_timing = [
        'type' => 'radio',
        'options' => config('app.TaxFractionTimingCode'),
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'margin-right: 10px; margin-left: 8px;',
        'class' => 'txt_mid'
    ];
    // 締日処理
    $cutooff_select = [
        'type' => 'radio',
        'options' => [
            0 => '末日',
            1 => '指定'
        ],
        'div' => false,
        'label' => false,
        'legend' => false,
        'class' => 'cutooff_select',
        'style' => 'width:30px;'
    ];

    // 締日処理
    $payment_select = [
        'type' => 'radio',
        'options' => [
            0 => '末日',
            1 => '指定'
        ],
        'div' => false,
        'label' => false,
        'legend' => false,
        'class' => 'payment_select',
        'style' => 'width:30px;'
    ];

    // ビューにセット
    $this->set("user_id", $this->Get_User_ID());
    $this->set("countys", config('app.PrefectureCode'));
    $this->set("payment", config('app.PaymentMonth'));
    $this->set("cutooff_select", $cutooff_select);
    $this->set("payment_select", $payment_select);
    $this->set("perror", $phone_error);
    $this->set("ferror", $fax_error);
    $this->set("excises", $excise);
    $this->set("fractions", $fraction);
    $this->set("tax_fraction_timing", $tax_fraction_timing);
    $this->set("honor", config('app.HonorCode'));
}

public function edit()
{
    $this->set("main_title", "取引先編集");
    $this->set("title_text", "顧客管理");

    // キャンセルボタンを押下すると一覧にリダイレクト
    if (isset($this->params['form']['cancel_x'])) {
        return redirect("/customers");
    }

    // テスト用データ
    $company_ID = 1;
    $phone_error = 0;
    $fax_error = 0;

    if (!isset($this->params['data'])) {
        // IDの取得
        if (isset($this->params['pass'][0])) {
            $customer_ID = $this->params['pass'][0];
        } else {
            // エラー処理
            return redirect("/customers");
        }

        // 顧客情報の取得
        if (!$this->data = $this->Customer->edit_select($customer_ID)) {
            // エラー処理
            return redirect("/customers");
        }
    } else {
        // 電話番号のバリデーション
        $phone_error = $this->phone_validation($this->params['data']['Customer']);

        // FAX番号のバリデーション
        $fax_error = $this->fax_validation($this->params['data']['Customer']);
        if ($this->params['data']['Customer']['HONOR_CODE'] != 2) {
            $this->params['data']['Customer']['HONOR_TITLE'] = "";
        }

        // 更新
        $customer_ID = $this->params['data']['Customer']['CST_ID'];
        $setdata = $this->Customer->set_data($this->params['data'], $company_ID, 'update', $phone_error, $fax_error);

        if (!isset($setdata['error'])) {
            // 成功
            session()->flash('message', '取引先を保存しました');
            return redirect("/customers/check/" . $customer_ID);
        }
    }

    if (!$this->Get_Edit_Authority($this->data['Customer']['USR_ID'])) {
        session()->flash('message', 'ページを開く権限がありません');
        return redirect("/customers/index/");
    }

    // 消費税
    $excise = [
        'type' => 'radio',
        'options' => config('ExciseCode'),
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'width:30px;',
        'class' => 'txt_mid'
    ];

    // 端数処理
    $fraction = [
        'type' => 'radio',
        'options' => config('FractionCode'),
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'width:30px;',
        'class' => 'txt_mid'
    ];

    // 消費税端数計算単位
    $tax_fraction_timing = [
        'type' => 'radio',
        'options' => config('TaxFractionTimingCode'),
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'margin-right: 10px; margin-left: 8px;',
        'class' => 'txt_mid'
    ];

    // 締日処理
    $cutooff_select = [
        'type' => 'radio',
        'options' => [
            0 => '末日',
            1 => '指定'
        ],
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'width:30px;',
        'class' => 'txt_mid'
    ];

    // 締日処理
    $payment_select = [
        'type' => 'radio',
        'options' => [
            0 => '末日',
            1 => '指定'
        ],
        'div' => false,
        'label' => false,
        'legend' => false,
        'style' => 'width:30px;',
        'class' => 'txt_mid'
    ];

    $charge = $this->Customer->get_charge($this->data['Customer']['CHR_ID']);

    // ビューにセット
    return view('customers.edit', [
        'payment' => config('PaymentMonth'),
        'countys' => config('PrefectureCode'),
        'charge' => $charge,
        'cutooff_select' => $cutooff_select,
        'payment_select' => $payment_select,
        'perror' => $phone_error,
        'ferror' => $fax_error,
        'excises' => $excise,
        'fractions' => $fraction,
        'tax_fraction_timing' => $tax_fraction_timing,
        'honor' => config('HonorCode'),
    ]);
}

}
