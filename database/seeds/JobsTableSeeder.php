<?php
use App\Job;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Job::create([
                'title' => 'title' . $i,
                'description' => 'description' . $i,
                'location' => 'location' . $i,
                'reward' => 'reward' . $i,
            ]);
        }
    }
}
