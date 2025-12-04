<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // load job listings from a file
        $job_listings = include database_path('seeders/data/job_listings.php');
        
        // Get test user id
        $testUserId = User::where('email', 'johnwick@gmail.com')->pluck('id')->toArray();

        // Get user-ids from user model
        $user_Ids = User::where('email', '!=', 'johnwick@gmail.com')->pluck('id')->toArray();
        foreach($job_listings as $index => &$listing) {

            if($index < 2){
                // Assign test user id to listing
                $listing['user_id'] = $testUserId[array_rand($testUserId)];
            }
            else {
                // Assign other user ids to listing
                $listing['user_id'] = $user_Ids[array_rand($user_Ids)];
            }
            // Add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
            
        }
        DB::table('job_listings')->insert($job_listings);
        echo 'Jobs created successfully';
        
    }
}
