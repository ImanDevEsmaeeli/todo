<?php

namespace App\Models\task;

use App\Enums\Status;
use App\Models\User;
use Database\Factories\Task\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Factories\Factory;

class Task extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'body',
      'deadline',
      'status',
      'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): TaskFactory|Factory
    {
        return TaskFactory::new();
    }

}
