<h2>
   Laravel Todo List
</h2>
@isset($tasks)
    <div>
        <ul>
            @forelse ($tasks as $task)
                <li><a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a></li>
            @empty
                <li>No tasks available!</li>
            @endforelse
        </ul>
    </div>
@endisset
