<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 25)->create();

        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'viewAny posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'update posts']);
        Permission::create(['name' => 'delete posts']);


    }
}
