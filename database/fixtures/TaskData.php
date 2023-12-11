<?php

namespace Database\Fixtures;

class TaskData
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }

    public static function noTasks(): array
    {
        return [];
    }

    public static function getTasks(): array
    {
        return [
            new self(
                1,
                'Buy groceries',
                'Task 1 description',
                'Task 1 long description',
                false,
                '2023-03-01 12:00:00',
                '2023-03-01 12:00:00'
            ),
            new self(
                2,
                'Sell old stuff',
                'Task 2 description',
                null,
                false,
                '2023-03-02 12:00:00',
                '2023-03-02 12:00:00'
            ),
            new self(
                3,
                'Learn programming',
                'Task 3 description',
                'Task 3 long description',
                true,
                '2023-03-03 12:00:00',
                '2023-03-03 12:00:00'
            ),
            new self(
                4,
                'Take dogs for a walk',
                'Task 4 description',
                null,
                false,
                '2023-03-04 12:00:00',
                '2023-03-04 12:00:00'
            ),
        ];
    }
}
