<!doctype html>
@include('layouts.header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div class="bg-white rounded-b w-full" style="height: 400px;">
			<form class="flex justify-center" method="POST" action="{{ url('edittask/' . $task->id) }}">
        		@csrf
        		<div class="">
        			<p class="text-blue mt-10 text-3xl">Edit task: {{ $task->body }}</p>
		            @if ($errors)
		                <div class="text-red rounded my-2">
		                    <span class="invalid-feedback" role="alert">
		                    	<strong class="block">{{ $errors->first('body') }}</strong>
		                        <strong>{{ $errors->first('list_id') }}</strong>
		                    </span>
		                </div>
		            @endif
            		<div class="mb-5">
                		<p class=" text-xl">Enter name of task</p>
                		<input type="hidden" name="user_id" value='{{ auth()->user()->id }}'">
            			<input class="border rounded text-xl" type="text" value="{{ $task->body }}" name="body" style="height: 30px; width: 200px" value="{{ old('body') }}">
            		</div>
            		<select class="block text-l w-full border" name="list_id">
            			<option value="" selected disabled>Select a list</option>
        				@foreach($lists as $list)
        					<option required @if($list->id == $task->list_id) selected @endif value="{{ $list->id }}">{{ $list->name }}</option>
        				@endforeach
        			</select>
            		<button class="bg-blue rounded p-2 px-4 mt-2 text-white shadow" type="submit">Submit</button>
            	</div>
        	</form>
        </div>
    </body>
</html>