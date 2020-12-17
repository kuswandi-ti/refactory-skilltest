<?php 

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type; 
use Rebing\GraphQL\Support\Type as GraphQLType; 

use App\Booking; 

class BookingType extends GraphQLType 
{ 
    protected $attributes = [ 
        'name'        => 'Booking',
        'description' => 'Details Booking',
        'model'       => Booking::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'Id of the booking',
            ],
            'user_id' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'Id user',
            ],
            'room_id' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'Id room',
            ],
            'total_person' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'Total person booking',
            ],
            'booking_time' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'Date of booking',
            ],
            'noted' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'Noted of booking',
            ],
            'check_in_time' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'Check in date of booking',
            ],
            'check_out_time' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'Check out date of booking',
            ],
        ];
    }
}