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
            'room_id' => '1',
            'num' => '4',
            'datetime' => '2020-05-24 12:00:00',
            ],
            [
            'user_id' => '2',
            'room_id' => '2',
            'num' => '5',
            'datetime' => '2020-05-29 16:00:00',
            ]
        ]);
    }
}
