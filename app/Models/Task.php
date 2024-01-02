<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static latest()
 * @method static create(mixed $validated)
 * @property string|null $title
 * @property string|null $description
 * @property string|null $long_description
 * @property int|null $id
 * @property bool|null $completed
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
    ];

    public function toggleComplete(): void
    {
        $this->completed = !$this->completed;
    }
}
