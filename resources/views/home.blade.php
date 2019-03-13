<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div class="bg-white rounded-b w-full flex" style="height: 400px;">
            <div class="w-1/4 border-r relative">
                <div class="p-5">
                    @if(!$lists->isEmpty())
                        @foreach($lists as $list)
                        <div class="flex border-b">
                            <p class="my-2">{{ $list->name }}</p>
                            <a href="{{ url('deletelist/' . $list->id) }}" class="text-red no-underline flex flex-1 my-auto justify-end hover:underline">X</a>
                        </div> 
                            <a href="/createlist" class="no-underline hover:underline text-blue absolute pin-b mb-4">+ Add list</a>
                        @endforeach
                    @else
                        <a href="/createlist" class="no-underline hover:underline text-blue">+ Add list</a>
                    @endif  
                </div> 
            </div>
            <div class="w-full relative">
                @if(!$tasks->isEmpty())
                    @foreach($tasks as $task)
                    <div class="flex justify-center mt-8 w-full">
                        <div class="flex border-b w-1/2">
                            <p class="">{{ $task->body }}</p>
                            <a href="{{ url('deletetask/' . $task->id) }}" class="text-red no-underline flex flex-1 my-auto justify-end">X</a>
                        </div>
                    </div> 
                    <div class="flex justify-center">
                        <a class="text-blue no-underline hover:underline absolute pin-b mb-4" href="/createtask">+ Create new task</a>  
                    </div>
                    @endforeach
                @else
                    <div class="mt-10">
                        <p class="text-center">There are no tasks.</p>
                        <div class="flex justify-center">
                            <a class="text-blue no-underline hover:underline" href="/createtask">Click here to make a task</a>  
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
