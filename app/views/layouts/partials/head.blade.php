<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Web-App for interactive studies.">
<meta name="viewport" content="width=device-width, initial-scale=1">
@section('title')
@show
{{-- Browser Favicon --}}
<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
{{-- Apple und Android Touch Icon --}}
<link rel="apple-touch-icon-precomposed" href="{{asset('apple-touch-icon-precomposed.png')}}">
{{-- Windows Tile Tags --}}
<meta name="application-name" content="e:t:p:M – Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns">
<meta name="msapplication-TileColor" content="#5ebc3b">
<meta name="msapplication-TileImage" content="{{asset('metro-tile.png')}}">
<meta name="msapplication-starturl" content="{{url('home')}}">
<meta name="msapplication-navbutton-color" content="#5ebc3b">
<meta name="msapplication-tooltip" content="e:t:p:M – Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns">
