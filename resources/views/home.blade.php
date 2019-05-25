<!doctype html>
{{-- @include('layouts.header') --}}
@include('layouts.header', ['list' => $lists])
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="animated fadeIn">
        <div class="bg-white rounded-b w-full flex" style="min-height: 400px;">
            <div class="w-1/4 border-r relative">
                <div class="p-5">
                    @if(!$lists->isEmpty())
                        @foreach($lists as $list)
                        <div class="flex border-b">
                            <a class="text-black no-underline" href="/list/{{ $list->id }}/name">
                                <p class="my-2 hover:underline">{{ $list->name }}</p>
                            </a>

                            <div class="flex flex-1 justify-end my-auto">
                                <a href="{{ url('editlist/' . $list->id) }}" class="no-underline mx-2 text-{{ auth()->user()->color }}"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ url('deletelist/' . $list->id) }}" class="text-red text-sm font-bold no-underline hover:underline">X</a>
                            </div>
                        </div> 
                            <a href="/createlist" class="no-underline hover:underline text-{{ auth()->user()->color }} absolute pin-b mb-4">+ Add list</a>
                        @endforeach
                    @else
                        <a href="/createlist" class="no-underline hover:underline text-{{ auth()->user()->color }}">+ Add list</a>
                    @endif  
                </div> 
            </div>
            <div class="w-full relative">
                @if(!$tasks->isEmpty())
                    <div class="flex justify-center mt-4">
                        <a class="no-underline text-black mr-2" href="/list/{{ $list->id }}/name">Sort by Name</a>
                        <a class="no-underline text-black" href="/list/{{ $list->id }}/status">Sort by Status</a>
                    </div>
                    @foreach($tasks as $task)
                    <div class="flex justify-center mt-8 w-full">
                        <div class="flex border-b w-1/2">
                            <form name="statusForm{{ $task->id }}" method="POST" action="{{ url('changestatus/'. $task->id) }}" autocomplete="off">
                                @csrf
                                @if($task->completed == 0)
                                    <input type="hidden" name="completed" value="1">
                                    <div onclick="document.statusForm{{ $task->id }}.submit()" class="relative border border-grey-light my-auto rounded-full mr-2 text-center text-grey-dark cursor-pointer hover:border-{{ auth()->user()->color }}-dark hover:text-{{ auth()->user()->color }}" style="min-width: 1.25rem; min-height: 1.25rem;"></div>
                                @else
                                    <input type="hidden" name="completed" value="0">
                                    <div onclick="document.statusForm{{ $task->id }}.submit()" class="relative border border-grey-light my-auto rounded-full mr-2 text-center text-grey-dark cursor-pointer hover:border-{{ auth()->user()->color }}-dark hover:text-{{ auth()->user()->color }}" style="min-width: 1.25rem; min-height: 1.25rem;"><svg xmlns="http://www.w3.org/2000/svg" height="10px" width="10px" viewBox="0 0 24 24" class="absolute fill-current" style="margin-bottom: 1px; left: 23%; top: 27%;"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"></path></svg></div>
                                @endif
                            </form>
                            <p class="my-auto">{{ $task->body }}</p>   
                            <div class="flex flex-1 my-auto justify-end">
                                <a href="{{ url('edittask/' . $task->id) }}" class="no-underline mx-2 text-{{ auth()->user()->color }}"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ url('deletetask/' . $task->id) }}" class="text-red no-underline hover:underline"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    <div class="flex justify-center mt-10">
                        <a class="text-{{ auth()->user()->color }} no-underline hover:underline absolute pin-b mb-4" href="/createtask">+ Create new task</a>  
                    </div>
                @else
                    <div class="mt-10">
                        <p class="text-center">There are no tasks.</p>
                        <div class="flex justify-center">
                            <a class="text-{{ auth()->user()->color }} no-underline hover:underline" href="/createtask">Click here to make a task</a>  
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
