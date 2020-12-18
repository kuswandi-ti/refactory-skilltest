<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    public $timestamps 	= true;
    protected $table 	= 'bookings';

    use Notifiable;

    protected $fillable = [
        'id', 'user_id', 'room_id', 'total_person', 'booking_time', 'noted', 'check_in_time', 'check_out_time', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Bookings::class);
    }
}
