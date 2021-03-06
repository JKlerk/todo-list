<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@0.7.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
@if (Auth::check())
<div class="flex mt-20 justify-center w-full antialiased">
    <div class="w-1/2 shadow">
        <div class="flex bg-{{ auth()->user()->color }} p-4 rounded-t">
            <h1 class="text-white"><a class="text-white no-underline" href="/">Todo list {{-- {{ $list[0]['name'] }} --}}</a></h1>
            <div class="flex flex-1 justify-end my-auto">
                <div class="my-auto">
                    <p class="text-white text-xl inline"><a class="text-white no-underline hover:underline" href="/profile">{{ auth()->user()->name }}</a></p>
                    <a href="/logout" class="text-white no-underline"><i class="fas fa-sign-out-alt hover:underline"></i></a>                             
                </div>
            </div>             
        </div>
@endif