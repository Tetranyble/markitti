@props(['card' => 'summary_large_card', 'title', 'twitter', 'image' => false, 'description'])
<title>Book Store | {{ $title }}</title>

<meta name="twitter:card" content="{{ $card }}"/>
<meta name="twitter:site" content="{{ $twitter }}"/>

<meta property="og:title" content="{{ $title }}"/>
<meta property="og:description"  content="{{ $description }}"/>

<meta property="og:url"  content="{{ url()->current() }}"/>
@if($image)
    <meta property="og:image"  content="{{ $image }}"/>
@endif

