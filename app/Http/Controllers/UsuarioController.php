<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $query = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'SUPER ADMIN');
        })->withTrashed();
        if ($buscar) {
            $query->where('name', 'like', "%$buscar%")
                  ->orWhere('email', 'like', "%$buscar%");
        }
        $usuarios = $query->paginate(5);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rol' => 'required',    
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        $usuario->assignRole($request->rol);

        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Usuario creado exitosamente.')
        ->with('icono', 'success');
        //return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.show', compact('usuario'));
        //echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
        //echo $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'rol' => 'required',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $usuario = User::find($id);
    $usuario->name = $request->name;
    $usuario->email = $request->email;

    if ($request->password) {
        $usuario->password = bcrypt($request->password);
    }

    $usuario->save();
    $usuario->syncRoles($request->rol);

    return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Usuario actualizado exitosamente.')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //echo $id;
        $usuario = User::find($id);
        $usuario->estado = false;
        $usuario->save();
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Usuario eliminado exitosamente.')
        ->with('icono', 'success');
    }

    public function restore($id)
    {
        //echo $id;
        $usuario = User::withTrashed()->find($id);
         $usuario->restore();
        $usuario->estado = true;
        $usuario->save();
       
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Usuario restaurado exitosamente.')
        ->with('icono', 'success');
    }
}
