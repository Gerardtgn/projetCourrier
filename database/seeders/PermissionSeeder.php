<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'enregistrer un courrier',
            'gerer les utilisateurs',
            'gerer les services',
            'donner les permissions',
            'afficher les permissions',
            'affecter un courrier',
            'traiter un courrier',
            'afficher un document'
        ];
        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        $admin_role = Role::create(['name' => 'admin']);
        $agent_role = Role::create(['name' => 'chef service']);
        $chef_service_role = Role::create(['name' => 'agent']);
        $secretaire_role = Role::create(['name' => 'secretaire']);

        $admin_permissions = [];
        $agent_permissions = [];
        $chef_service_permissions = [];
        $secretaire_permissions = ['enregistrer un courrier'];
        // $users = [$admin_permissions, $agent_permissions, $chef_service_permissions];
        foreach($admin_permissions as $permission){
            $admin_role->givePermissionTo($permission);

        }
        foreach($agent_permissions as $permission){
            $agent_role->givePermissionTo($permission);

        }

        foreach($chef_service_permissions as $permission){
            $chef_service_role->givePermissionTo($permission);

        }
        foreach($secretaire_permissions as $permission){
            $secretaire_role->givePermissionTo($permission);

        }
    }

}
