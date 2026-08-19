<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ajuste;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(['name' => 'SUPER ADMIN']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'VENDEDOR']);
        Role::create(['name' => 'CONTABILIDAD']);
        Role::create(['name' => 'OPERADOR']);
        Role::create(['name' => 'CLIENTE']); 

        User::create([
            'name' => 'Manuel Salazar',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'), 
        ])->assignRole('SUPER ADMIN');

        Ajuste::create([
            'nombre' => 'Comercio Manuel Salazar',
            'descripcion' => 'Tienda virtual de productos variados',
            'sucursal' => 'Matriz',
            'direccion' => 'Calle Principal 123, Ciudad',
            'telefonos' => '0998765432',
            'logo' => 'logos/logo_default.png',
            'imagen_login' => 'imagenes_login/login_default.png',
            'email' => 'hilariweb@gmail.com',
            'divisa' => 'S/.',
            'pagina_web' => 'www.hilariweb.com',

        ]);

        Categoria::factory(15)->create();

        Producto::factory(50)->create();

           
    }
}
