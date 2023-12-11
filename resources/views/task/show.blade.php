<h2>
    Task - {{ $task->id }}
</h2>

<div>
    <p>
       Title: {{ $task->title }}
    </p>
    <p>
       Description: {{ $task->description }}
    </p>
    @if($task->long_description)
        <p>
           Long Description: {{ $task->long_description }}
        </p>
    @endif
    <p>
       Created At: {{ $task->created_at }}
    </p>
    <p>
       Updated At: {{ $task->updated_at }}
    </p>
</div>
