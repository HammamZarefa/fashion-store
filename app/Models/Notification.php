<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'time'];

    public static function createNotification($message)
    {
        return self::create([
            'message' => $message,
            'time' => now(),
        ]);
    }

    public static function getAllNotifications()
    {
        return self::all();
    }
}

