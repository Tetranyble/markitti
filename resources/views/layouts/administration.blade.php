
<!DOCTYPE html>
<html lang="en" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{ $head ?? '' }}
    <link rel="shortcut icon" href="../images/favicon.png">


    <link rel="stylesheet" href="{{ mix('assets/css/dashboard.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ mix('assets/css/dashboard.css') }}">
</head>
<body class="nk-body bg-lighter npc-general has-sidebar ui-bordered ">
  {{ $slot }}

  <script src="{{ mix('assets/js/bundle.js') }}"></script>
  <script src="{{ mix('assets/js/scripts.js') }}"></script>
  <script src="{{ mix('assets/js/settings.js') }}"></script>
  <script src="{{ mix('assets/js/charts.js') }}"></script>
</body>
</html>
