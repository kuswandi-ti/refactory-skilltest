<?php 

namespace App\GraphQL\Queries; 

use GraphQL\Type\Definition\Type; 
use Rebing\GraphQL\Support\Query; 
use Rebing\GraphQL\Support\Facades\GraphQL; 

use App\Booking; 

class BookingQuery extends Query 
{ 
    protected $attributes = [ 
        'name' => 'booking',
    ];

    public function type(): Type
    {
        return GraphQL::type('Booking');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name'  => 'id',
                'type'  => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Booking::findOrFail($args['id']);
    }
}