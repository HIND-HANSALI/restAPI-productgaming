<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $editMyProfil = 'edit my profil';
        $editAllProfil = 'edit all profil';
        $deleteMyProfil = 'delete my profil';
        $deleteAllProfil = 'delete all profil';
        $viewMyprofil = 'view my profil';
        $viewAllprofil = 'view all profil';

        $addProduct = 'add product';
        $editAllProduct = 'edit All product';
        $editMyProduct = 'edit My product';
        $deleteAllProduct = 'delete All product';
        $deleteMyProduct = 'delete My product';

        $addCategory = 'add category';
        $editCategory = 'edit category';
        $deleteCategory = 'delete category';
        $viewCategory = 'view category';

            // create permissions
        Permission::create(['name' => $editMyProfil]);
        Permission::create(['name' => $editAllProfil]);
        Permission::create(['name' => $deleteMyProfil]);
        Permission::create(['name' => $deleteAllProfil]);
        Permission::create(['name' => $viewMyprofil]);
        Permission::create(['name' => $viewAllprofil]);

        Permission::create(['name' => $addProduct]);
        Permission::create(['name' => $editAllProduct]);
        Permission::create(['name' => $editMyProduct]);
        Permission::create(['name' => $deleteAllProduct]);
        Permission::create(['name' => $deleteMyProduct]);

        Permission::create(['name' => $addCategory]);
        Permission::create(['name' => $editCategory]);
        Permission::create(['name' => $deleteCategory]);
        Permission::create(['name' => $viewCategory]);

        // Define roles available
        $admin = 'admin';
        $vendeur = 'vendeur';
        $user = 'user';

         // create roles and assign created permissions
        Role::create(['name' => $admin])->givePermissionTo(Permission::all());

        Role::create(['name' =>  $vendeur])->givePermissionTo([
            $addProduct,
            $editMyProduct,
            $deleteMyProduct,
            $editMyProfil,
            $deleteMyProfil,
            $viewMyprofil,
        ]);

        Role::create(['name' => $user])->givePermissionTo([
            $editMyProfil,
            $deleteMyProfil,
            $viewMyprofil,
        ]);
    
    }
}
