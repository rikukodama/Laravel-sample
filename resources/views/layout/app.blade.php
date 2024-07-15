<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="copyright" content="" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="-1">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    @php
    $controller = request()->route()->getName();
    $action = request()->route()->getActionName();
@endphp

    <title>
    {{$main_title}}
    ｜
    @if (preg_match('/^home/', $controller))
        {{$title}}
    @else
        {{$title_text}}
        ｜
        {{$customHtml->ht2br($title)}}
    @endif
</title>

    <script>
        var controller_name @isset($this){{ '=\'' . $this->name . '\'' }} @endisset;
        </script>

    @if(isset($rb_flag) && $rb_flag)
    <script src="{{asset('js/jkl-calendar.js')}}"></script>
    @else
    <script src="{{asset('js/jkl-calendar.js')}}"></script>
    @endif

    <script src="{{ asset('js/jquery-1.4.4.min.js') }}"></script>
    <script src="{{ asset('js/mathcontext.js') }}"></script>
    <script src="{{ asset('js/bigdecimal.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/ready.js') }}"></script>
    <script src="{{ asset('js/rollover.js') }}"></script>
    <script src="{{ asset('js/rollover-table.js') }}"></script>
    <script @php echo 'defer'; @endphp></script>

 

    <link rel="stylesheet" type="text/css" href="{{ asset('css/import.css')}}" />
</head>

<body>
<div id="wrapper">

<!-- header_Start -->


<!-- footer_End -->
@include('layout.header')

<!-- header_End -->
@yield('content')
<!-- contents_End -->

<!-- footer_Start -->
@include('layout.footer')
</div>
</dody>

</html>
