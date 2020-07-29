<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        /*$permissions = [
        'home',
        'search',
        'package-create',
        'package-delete',
        'package-edit',
        ];*/
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}