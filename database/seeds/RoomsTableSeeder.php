<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'room_name' 	=> 'Ruangan Meeting 01',
                'room_capacity' => '15',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-01.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 02',
                'room_capacity' => '14',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-02.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 03',
                'room_capacity' => '13',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-03.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 04',
                'room_capacity' => '12',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-04.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 05',
                'room_capacity' => '11',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-05.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 06',
                'room_capacity' => '10',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-06.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 07',
                'room_capacity' => '20',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-07.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 08',
                'room_capacity' => '19',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-08.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 09',
                'room_capacity' => '18',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-09.jpg',
                'created_at'    => Carbon::now(),
            ],
            [
                'room_name' 	=> 'Ruangan Meeting 10',
                'room_capacity' => '17',
                'photo' 		=> 'https://kuswandi.scriptproject.web.id/refactory/room-10.jpg',
                'created_at'    => Carbon::now(),
            ]
		]);
    }
}
