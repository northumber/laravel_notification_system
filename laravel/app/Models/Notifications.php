<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'id_user',
        'date',
        'content',
        'read'
    ];

    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime',
    ];

    public static function notify($text)
    {
        $users = User::all();

        foreach ($users as $user) {
            Notifications::create([
                'id_user' => $user->id,
                'date' => Carbon::now(),
                'content' => $text,
                'read' => 0
            ]);
        }

    }
}
