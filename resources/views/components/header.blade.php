<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{$store->name}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset($store->favicon)}}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('/classic/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('/classic/vendor/bootstrap-icons/font/bootstrap-icons.css')}}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('classic/css/theme.minc619.css?v=1.0')}}">

    <!-- Social Tags -->
    <meta property="og:title" content="{{ $store->name }}">
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{$store->description}}">
    <meta property="og:image" content="{{ asset($store->logo) }}">
    <meta property="og:url" content="/">
    <meta name="twitter:card" content="summary_large_image">
    <livewire:styles/>
</head>

