<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static latest()
 * @property array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\Request|mixed|string|null $title
 * @property array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\Request|mixed|string|null $description
 * @property array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\Request|mixed|string|null $long_description
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
        'completed',
    ];
}
