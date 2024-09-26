@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Task List</h1>
    <a href="{{ route('tasks.create') }}" class=" text-2xl font-bold mb-4 " style="text-decoration:none;">Create Task</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Due Date</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Edit </th>
                <th class="px-4 py-2">Delete </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td class="border px-4 py-2">{{ $task->title }}</td>
                <td class="border px-4 py-2">{{ $task->description }}</td>
                <td class="border px-4 py-2">{{ $task->due_date }}</td>
                <td class="border px-4 py-2">{{ $task->status }}</td>
             
                <td class="border px-4 py-2">
                <a href="{{ route('tasks.edit', $task->id) }}"  style="text-decoration:none; display: block;">Edit Task</a>
                </td>
                <td class="border px-4 py-2 flex space-x-2">
                    
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Jeni i sigurt qe po ndermerrni kit veprim');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  style="background-color: white; color:red; border:none;">Delete Task</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
