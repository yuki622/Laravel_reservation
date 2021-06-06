<?php

use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
            'user_id' => '1',
            'room_id' => 1,
            'num_of_guests' => 4,
            'start' => '2020-05-24 12:00:00',
            'finish' => '2020-05-24 14:00:00'
            ],
            [
            'user_id' => '2',
            'room_id' => 2,
            'num_of_guests' => 5,
            'start' => '2020-05-29 16:00:00',
            'finish' => '2020-05-29 19:00:00'
            ],
            [
            'user_id' => '3',
            'room_id' => 3,
            'num_of_guests' => 7,
            'start' => '2020-06-01 20:00:00',
            'finish' => '2020-06-01 23:00:00'
            ]
        ]);
    }
}
