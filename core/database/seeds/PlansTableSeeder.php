<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = \Carbon\Carbon::now();
        try {
            Plan::query()->delete();
            Plan::insert([
                [
                    'style_id'                  => 1,
                    'name'                      => 'Starter invest',
                    'minimum'                   => 5.00,
                    'maximum'                   => 25.00,
                    'percentage'                => 2.00,
                    'start_duration'            => 2,
                    'repeat'                    => 14,
                    'status'                    => 1,
                    'availability_reinvestment' => 1,
                    'created_at'                => $time,
                    'updated_at'                => $time
                ],[
                    'style_id'                  => 2,
                    'name'                      => 'Beginner invest',
                    'minimum'                   => 50.00,
                    'maximum'                   => 800.00,
                    'percentage'                => 2.50,
                    'start_duration'            => 2,
                    'repeat'                    => 12,
                    'status'                    => 1,
                    'created_at'                => $time,
                    'updated_at'                => $time
                ],[
                    'style_id'                  => 2,
                    'name'                      => 'Silver invest',
                    'minimum'                   => 100.00,
                    'maximum'                   => 10000.00,
                    'percentage'                => 3.50,
                    'start_duration'            => 2,
                    'repeat'                    => 18,
                    'status'                    => 1,
                    'created_at'                => $time,
                    'updated_at'                => $time
                ],[
                    'style_id'                  => 3,
                    'name'                      => 'Bronze invest',
                    'minimum'                   => 500.00,
                    'maximum'                   => 100000.00,
                    'percentage'                => 5.25,
                    'start_duration'            => 2,
                    'repeat'                    => 10,
                    'status'                    => 1,
                    'created_at'                => $time,
                    'updated_at'                => $time
                ],[
                    'style_id'                  => 4,
                    'name'                      => 'Gold invest',
                    'minimum'                   => 1000.00,
                    'maximum'                   => 1000000.00,
                    'percentage'                => 7.50,
                    'start_duration'            => 2,
                    'repeat'                    => 7,
                    'status'                    => 1,
                    'created_at'                => $time,
                    'updated_at'                => $time
                ]
            ]);
        } catch (Exception $ex) {
            $this->command->error("SQL Error: " . $ex->getMessage() . "\n");
        }
    }
}
