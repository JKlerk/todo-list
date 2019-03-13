<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div class="flex mt-20 justify-center w-full">
            <div class="w-1/2 shadow">
                <div class="flex bg-blue p-4 rounded-t">
                    <h1 class="text-white"><a class="text-white no-underline" href="/">Todo list</a></h1>
                    <div class="flex flex-1 justify-end my-auto">
                        <div class="my-auto">
                            <p class="text-white text-xl inline">{{ auth()->user()->name }}</p>
                            <a href="/logout" class="text-white no-underline"><i class="fas fa-sign-out-alt"></i></a>                             
                        </div>

                    </div>
                                  
                </div>
                <div class="bg-white rounded-b w-full flex" style="height: 400px;">
                    <div class="w-1/4 border-r relative">
                        <div class="p-5">
                            @if(!$lists->isEmpty())
                                @foreach($lists as $list)
                                <div class="flex border-b">
                                    <p class="my-2">{{ $list->name }}</p>
                                    <a href="{{ url('delete/' . $list->id) }}" class="text-red no-underline flex flex-1 my-auto justify-end">X</a>
                                </div> 
                                    <a href="/createlist" class="no-underline hover:underline text-blue absolute pin-b mb-4">+ Lijst toevoegen</a>
                                @endforeach
                            @else
                                <a href="/createlist" class="no-underline hover:underline text-blue">+ Lijst toevoegen</a>
                            @endif
                        </div> 
                    </div>
                    <div class="w-full">
                        @if(!$tasks->isEmpty())
                        @else
                            <div class="mt-10">
                                <p class="text-center">There are no tasks.</p>
                                <div class="flex justify-center">
                                    <a class="text-blue no-underline" href="/createtask">Click here to make a task</a>  
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
