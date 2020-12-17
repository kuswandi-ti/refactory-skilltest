<?php 

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type; 
use Rebing\GraphQL\Support\Type as GraphQLType; 
use Rebing\GraphQL\Support\Facades\GraphQL;  

use App\User; 

class UserType extends GraphQLType 
{ 
    protected $attributes = [ 
        'name'        => 'User',
        'description' => 'Details User',
        'model'       => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'Id of the booking',
            ],
            'name' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The name of the User',
            ],
            'email' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'Email of the User',
            ],
            'password' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'Password of the User',
            ],
            // 'bookings' => [
            //     'type'        => Type::listOf(GraphQL::type('Booking')),
            //     'description' => 'User booking',
            // ],
        ];
    }
}