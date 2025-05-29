<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Game;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jose Luis Miranda',
            'email' => 'a@a.com',
            'password' => bcrypt('123'),
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
            'role' => 1, // Admin role
        ]);

        Game::Factory()->create([
            'name' => 'Valorant',
            'genre' => 'FPS',
            'image_url' => 'https://media.vandal.net/m/78531/valorant-202052910331074_1.jpg',
        ]);

        Game::Factory()->create([
            'name' => 'League of Legends',
            'genre' => 'MOBA',
            'image_url' => 'https://cdn1.epicgames.com/offer/24b9b5e323bc40eea252a10cdd3b2f10/EGS_LeagueofLegends_RiotGames_S1_2560x1440-80471666c140f790f28dff68d72c384b',
        ]);
        Game::Factory()->create([
            'name' => 'Counter Strike',
            'genre' => 'FPS',
            'image_url' => 'https://i.3djuegos.com/juegos/19026/counterstrike_2/fotos/ficha/counterstrike_2-5835304.webp',
        ]);
        Game::Factory()->create([
            'name' => 'Dota 2',
            'genre' => 'MOBA',
            'image_url' => 'https://i.pinimg.com/236x/d1/59/e9/d159e9ca272b73f56ef2b770a7c0b17b.jpg',
        ]);
        Game::Factory()->create([
            'name' => 'Call of Duty Black Ops 6',
            'genre' => 'FPS',
            'image_url' => 'https://i.3djuegos.com/juegos/19728/call_of_duty_black_ops_6/fotos/ficha/call_of_duty_black_ops_6-5892217.webp',
        ]);
        Game::Factory()->create([
            'name' => 'Apex Legends',
            'genre' => 'Battle Royale',
            'image_url' => 'https://i.pinimg.com/736x/59/60/2a/59602a6c2af52e7f9dd6028a985e56b2.jpg',
        ]);
        Game::Factory()->create([
            'name' => 'Fortnite',
            'genre' => 'Battle Royale',
            'image_url' => 'https://i.pinimg.com/736x/8f/16/e9/8f16e97ab5cc7873debc229c7a527a07.jpg',
        ]);
        Game::Factory()->create([
            'name' => 'Overwatch',
            'genre' => 'FPS',
            'image_url' => 'https://upload.wikimedia.org/wikipedia/en/thumb/8/89/Overwatch_2_Steam_artwork.jpg/250px-Overwatch_2_Steam_artwork.jpg',
        ]);


    }
}
