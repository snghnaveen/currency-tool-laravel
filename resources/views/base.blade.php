<html>
<head>
    @yield('title')

    @yield('javascriptcode')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: black;
            display: table;
            font-weight: bold;
            font-family: 'Lato';

        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .divider {
            width: 20px;
            height: 20px;
            display: inline-block;
        }

        .body {
            background: #AAFFA9; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #AAFFA9, #11FFBD); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #AAFFA9, #11FFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        @yield('css')
    </style>
</head>
<body class="body">
<div class="container">
    <div class="content">
        @yield('content')
        {{--        <div class="quote">{{ Inspiring::quote() }}</div>--}}
    </div>
</div>
@yield('footer')
</body>
</html>