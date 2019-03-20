<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin Panel | {{ $pageTitle }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="Vectorcoder" content="http://ionicecommerce.com">

        {{--<link href="{!! asset('css/app.css') !!} " media="all" rel="stylesheet" type="text/css"/>--}}

  <!-- Bootstrap 3.3.6 -->
  <link href="{!! asset('backend/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('backend/bootstrap/css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

  <!-- Select2 -->
  <link rel="stylesheet" href="{!! asset('backend/plugins/select2/select2.min.css') !!}">

    <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{!! asset('backend/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}">
  <!-- Ionicons -->
  <link href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="{!! asset('backend/plugins/daterangepicker/daterangepicker-bs3.css') !!}">
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{!! asset('backend/plugins/datepicker/datepicker3.css') !!}">
  <!-- jvectormap -->
  <link href="{!! asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{!! asset('backend/dist/css/AdminLTE.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{!! asset('backend/dist/css/skins/_all-skins.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{!! asset('backend/plugins/iCheck/all.css') !!}" media="all" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<style>
    #message_content {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index:9999;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #message_content.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }

    /***** test ****/

    .example.example2 {
        background-color: #fff;
    }

    .example.example2 * {
        font-family: Source Code Pro, Consolas, Menlo, monospace;
        font-size: 16px;
        font-weight: 500;
    }

    .example.example2 .row {
        display: -ms-flexbox;
        display: flex;
        margin: 0 5px 10px;
    }

    .example.example2 .field {
        position: relative;
        width: 100%;
        height: 50px;
        margin: 0 10px;
    }

    .example.example2 .field.half-width {
        width: 50%;
    }

    .example.example2 .field.quarter-width {
        width: calc(25% - 10px);
    }

    .example.example2 .baseline {
        position: absolute;
        width: 100%;
        height: 1px;
        left: 0;
        bottom: 0;
        background-color: #cfd7df;
        transition: background-color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .example.example2 label {
        position: absolute;
        width: 100%;
        left: 0;
        bottom: 8px;
        color: #cfd7df;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        transform-origin: 0 50%;
        cursor: text;
        transition-property: color, transform;
        transition-duration: 0.3s;
        transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .example.example2 .input {
        position: absolute;
        width: 100%;
        left: 0;
        bottom: 0;
        padding-bottom: 7px;
        color: #32325d;
        background-color: transparent;
    }

    .example.example2 .input::-webkit-input-placeholder {
        color: transparent;
        transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .example.example2 .input::-moz-placeholder {
        color: transparent;
        transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .example.example2 .input:-ms-input-placeholder {
        color: transparent;
        transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .example.example2 .input.StripeElement {
        opacity: 0;
        transition: opacity 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        will-change: opacity;
    }

    .example.example2 .input.focused,
    .example.example2 .input:not(.empty) {
        opacity: 1;
    }

    .example.example2 .input.focused::-webkit-input-placeholder,
    .example.example2 .input:not(.empty)::-webkit-input-placeholder {
        color: #cfd7df;
    }

    .example.example2 .input.focused::-moz-placeholder,
    .example.example2 .input:not(.empty)::-moz-placeholder {
        color: #cfd7df;
    }

    .example.example2 .input.focused:-ms-input-placeholder,
    .example.example2 .input:not(.empty):-ms-input-placeholder {
        color: #cfd7df;
    }

    .example.example2 .input.focused + label,
    .example.example2 .input:not(.empty) + label {
        color: #aab7c4;
        transform: scale(0.85) translateY(-25px);
        cursor: default;
    }

    .example.example2 .input.focused + label {
        color: #24b47e;
    }

    .example.example2 .input.invalid + label {
        color: #ffa27b;
    }

    .example.example2 .input.focused + label + .baseline {
        background-color: #24b47e;
    }

    .example.example2 .input.focused.invalid + label + .baseline {
        background-color: #e25950;
    }

    .example.example2 input, .example.example2 button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: none;
        border-style: none;
    }

    .example.example2 input:-webkit-autofill {
        -webkit-text-fill-color: #e39f48;
        transition: background-color 100000000s;
        -webkit-animation: 1ms void-animation-out;
    }

    .example.example2 .StripeElement--webkit-autofill {
        background: transparent !important;
    }

    .example.example2 input, .example.example2 button {
        -webkit-animation: 1ms void-animation-out;
    }

    .example.example2 button {
        display: block;
        width: calc(100% - 30px);
        height: 40px;
        margin: 40px 15px 0;
        background-color: #24b47e;
        border-radius: 4px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        cursor: pointer;
    }

    .example.example2 input:active {
        background-color: #159570;
    }

    .example.example2 .error svg {
        margin-top: 0 !important;
    }

    .example.example2 .error svg .base {
        fill: #e25950;
    }

    .example.example2 .error svg .glyph {
        fill: #fff;
    }

    .example.example2 .error .message {
        color: #e25950;
    }

    .example.example2 .success .icon .border {
        stroke: #abe9d2;
    }

    .example.example2 .success .icon .checkmark {
        stroke: #24b47e;
    }

    .example.example2 .success .title {
        color: #32325d;
        font-size: 16px !important;
    }

    .example.example2 .success .message {
        color: #8898aa;
        font-size: 13px !important;
    }

    .example.example2 .success .reset path {
        fill: #24b47e;
    }
</style>
