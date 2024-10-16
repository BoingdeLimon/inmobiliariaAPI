<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comments::create([
            'id_user' => 1,
            'id_real_estate' => 1,
            'comment' => 'Me gustó mucho esta casa',
            'rating' => 5
        ]);
    }
}
