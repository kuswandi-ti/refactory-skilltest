<?php 

namespace App\GraphQL\Queries; 

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query; 
use Rebing\GraphQL\Support\Facades\GraphQL; 

use App\Booking;

class BookingsQuery extends Query 
{ 
    protected $attributes = [ 
        'name' => 'bookings',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Booking'));
    }

    public function resolve($root, $args)
    {
        return Booking::all();
    }
}