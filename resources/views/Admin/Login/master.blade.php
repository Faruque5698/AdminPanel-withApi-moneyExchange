<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset("Admin/Login")}}/css/style.css">

</head>
<body>
@yield("body")

<script src="{{asset("Admin/Login")}}/js/jquery.min.js"></script>
<script src="{{asset("Admin/Login")}}/js/popper.js"></script>
<script src="{{asset("Admin/Login")}}/js/bootstrap.min.js"></script>
<script src="{{asset("Admin/Login")}}/js/main.js"></script>

</body>
</html>

