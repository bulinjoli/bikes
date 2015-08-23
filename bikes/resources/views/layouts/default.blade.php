<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    {!! HTML::style('css/styles.css') !!}


    @yield("header")
</head>
<body>
@yield("content")


@yield("footer")
{!! HTML::script('js/jquery-1.11.3.min.js') !!}
{!! HTML::script('js/js.js') !!}
</body>
</html>
