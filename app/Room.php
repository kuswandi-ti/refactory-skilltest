<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    public $timestamps 	= true;
    protected $table 	= 'rooms';

    use Notifiable;

    protected $fillable = [
        'id', 'room_name', 'room_capacity', 'photo', 'created_at', 'updated_at', 'deleted_at'
    ];
}
