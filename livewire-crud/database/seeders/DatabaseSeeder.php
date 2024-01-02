<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $classNames = ['One', 'Two', 'Three', 'Four', 'Five'];

        foreach ( $classNames as $className ) {
            Classes::create( [
                'name' => $className,
            ] );
}
        \App\Models\Section::factory( 10 )->create();
        \App\Models\Student::factory( 10 )->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create( [
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make( '12345678' ),
        ] );


    }
}
