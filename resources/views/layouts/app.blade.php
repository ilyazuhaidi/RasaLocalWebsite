<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield('title', 'Malaysian Local Food')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Open+Sans&display=swap" rel="stylesheet"/>
    
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f5f4ef;
        }
        h1 {
            font-family: 'Merriweather', serif;
        }
    </style>
</head>
<body class="m-0 p-0 bg-[#f5f4ef]">
    @yield('content')
</body>
</html>
