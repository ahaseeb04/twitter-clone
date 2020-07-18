<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="theme-color" content="#ffffff" />
<meta name="description" content="Twitter Clone built from scratch, using Laravel and Vue." />
<meta name="keywords" content="Twitter, Laravel, Vue, TailwindCSS" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:creator" content="@ahaseeb04" />
<meta name="twitter:title" content="Twitter Clone" />
<meta name="twitter:description" content="Twitter Clone built from scratch, using Laravel and Vue." />
<meta name="twitter:image" content="{{ asset('images/2bf32d5e-248b-472a-bb7e-920de936f92d.jpg') }}" />
<meta property="og:url" content="https://twitterclone.net" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Twitter Clone" />
<meta property="og:title" content="Twitter Clone" />
<meta property="og:description" content="Twitter Clone built from scratch, using Laravel and Vue." />
<meta property="og:image" content="{{ asset('images/2bf32d5e-248b-472a-bb7e-920de936f92d.jpg') }}" />
<title>@yield ('title')Twitter Clone</title>
<link rel="icon" href="{{ asset('images/favicon.ico') }}">
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script>window.User = {!! json_encode(optional(auth()->user())->only('id', 'name', 'username', 'avatar')) !!}</script>