<?php


use App\Models\Client\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'user_id'  => '9',
            'gender_id'  => '1',
            ]);
        Client::create([
            'user_id'  => '10',
            'gender_id'  => '2',
            ]);
    }
}
