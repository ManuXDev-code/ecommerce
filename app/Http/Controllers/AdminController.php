<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;

class AdminController extends Controller
{
    public function index()
    {
       $total_roles = Role::count();
       $total_usuarios = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Super Admin');
        })->count();
        $total_categorias = Categoria::count();
        $total_productos = Producto::count();
       return view('admin.index', compact('total_roles', 'total_usuarios', 'total_categorias', 'total_productos'));
    }
}
