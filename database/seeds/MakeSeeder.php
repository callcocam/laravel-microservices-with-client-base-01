<?php

use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
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

        factory(\App\Make::class)->create([
            'tenant_id'=>$Tenant->id,
            'name'=>"User",
            'slug'=>'user',
            'route'=>'admin.users.index',
            'model'=>\App\User::class,
            'url'=>'admin/users',
            'icon'=>'chevron-right',
            'method'=>'crud',
            'description'=>'Crud de usuários'
        ]);


        factory(\App\Make::class)->create([
            'tenant_id'=>$Tenant->id,
            'name'=>"Role",
            'slug'=>'role',
            'route'=>'admin.roles.index',
            'model'=>\App\Role::class,
            'url'=>'admin/roles',
            'icon'=>'chevron-right',
            'method'=>'crud',
            'description'=>'Crud de roles'
        ]);

        factory(\App\Make::class)->create([
            'tenant_id'=>$Tenant->id,
            'name'=>"Permission",
            'slug'=>'permission',
            'route'=>'admin.permissions.index',
            'model'=>\App\Permission::class,
            'url'=>'admin/permissions',
            'icon'=>'chevron-right',
            'method'=>'crud',
            'description'=>'Crud de permissions'
        ]);

    }
}
