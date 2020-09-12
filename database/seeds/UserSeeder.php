<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Tenant =  \App\Tenant::query()->where([
            'name'=>"localhost"
        ])->first();

        factory(\App\User::class,300)->create([
            'tenant_id'=>$Tenant->id
        ]);
    }
}
