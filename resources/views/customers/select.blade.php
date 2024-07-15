<script>
        window.addEventListener("load", function() {
            initTableRollovers('index_table');
        }, false);
    </script>

    @if (session()->has('flash_message'))
        {{ session('flash_message') }}
    @endif

    {{ $paginator->withQueryString()->links('pagination::bootstrap-5') }}

<div id="contents">
    <form action="/customers/select" method="GET" novalidate>
        <div class="arrow_under"><img src="{{ asset('img/i_arrow_under.jpg') }}"></div>

        <h3>
            <div class="search">
                <span class="edit_txt">&nbsp;</span>
            </div>
        </h3>
        <div class="search_box">
            <div class="search_area">
                <table width="600" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <th>顧客名</th>
                        <td><input type="text" name="NAME" class="w350" value=""></td>
                    </tr>
                </table>

                <div class="search_btn">
                    <a href="#" onclick="$('#CustomerSelectForm').submit();" class="btn btn-primary">
                        <img src="{{ asset('img/bt_search.jpg') }}">
                    </a>
                </div>
            </div>
            <img src="{{ asset('/img/document/bg_search_bottom.jpg') }}" class='block'>
        </div>
    </form>

    <h3>
        <div class="edit_02_customer"><span class="edit_txt">&nbsp;</span></div>
    </h3>

    <div class="contents_box mb40">
        <div id='pagination'>
            {{ $paginator->data['Customer']["count"] }}
        </div>
        <div id='pagination'>
            {!! $paginator->prev('<< '.__(' 前へ', true), [], null, ['class'=> 'disabled', 'tag' => 'span']) !!}
                |
                {!! $paginator->numbers() !!}
                |
                {!! $paginator->next(__('次へ', true).' >>', [], null, ['tag' => 'span', 'class' => 'disabled']) !!}
        </div>
        {!! Html::image('bg_contents_top.jpg') !!}
        <div class="list_area">
            @if(is_array($list))
            <table width="900" cellpadding="0" cellspacing="0" border="0" style="break-word:break-all;"
                id="index_table">
                <thead>
                    <tr>
                        <th class="w50">{!! $customHtml->sortLink('No.', 'Customer.CST_ID') !!}</th>
                        <th class="w250">{!! $customHtml->sortLink('顧客名', 'Customer.NAME_KANA') !!}</th>
                        <th class="w100">{!! $customHtml->sortLink('電話番号', 'Customer.PHONE_NO1') !!}</th>
                        <th class="w100">{!! $customHtml->sortLink('担当者', 'Customer.CHR_ID') !!}</th>
                        <th class="w400">帳票</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $val)
                    <tr>
                        <td>{{ $val['Customer']['CST_ID'] }}</td>
                        <td>{{ $authcheck[$val['Customer']['CST_ID']]==1 ? Html::link($val['Customer']['NAME'], route('customers.check', $val['Customer']['CST_ID'])) : $customHtml->ht2br($val['Customer']['NAME']) }}
                        </td>
                        <td>{{ !(empty($val['Customer']['PHONE_NO1']) && empty($val['Customer']['PHONE_NO2']) && empty($val['Customer']['PHONE_NO3'])) ? $val['Customer']['PHONE_NO1']."-".$val['Customer']['PHONE_NO2']."-".$val['Customer']['PHONE_NO3'] : "&nbsp;" }}
                        </td>
                        <td>{{ $val['Customer']['CHR_ID'] ? $customHtml->ht2br($charges[$val['Customer']['CHR_ID']],'Charge','CHARGE_NAME') : '&nbsp;' }}
                        </td>
                        <td>
                            {{ Html::link('見積書', route('quotes.index', ['customer' => $val['Customer']['CST_ID']])) }}
                            ({{ $inv_num[$val['Customer']['CST_ID']]['Quote'] }}件)
                            /
                            {{ Html::link('請求書', route('bills.index', ['customer' => $val['Customer']['CST_ID']])) }}
                            ({{ $inv_num[$val['Customer']['CST_ID']]['Bill'] }}件)
                            /
                            {{ Html::link('納品書', route('deliveries.index', ['customer' => $val['Customer']['CST_ID']])) }}
                            ({{ $inv_num[$val['Customer']['CST_ID']]['Delivery'] }}件)
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        {!! Html::image('bg_contents_bottom.jpg', ['class' => 'block']) !!}
    </div>
</div>
