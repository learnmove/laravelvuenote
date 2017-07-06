<?php

use Illuminate\Database\Seeder;

class NoteBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\NoteBook::class,10)->create();
    }
}
