<?php

namespace App\Http\Controllers\Auth;

use App\Models\Box;
use App\Models\Entity;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->model->all();
        return view('auth.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Entity $entity)
    {
        $entitys = $entity->all();
        return view('auth.register2')->with('entitys', $entitys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model->setAttribute('lastName', $request->get('lastName'));
        $this->model->setAttribute('firstName', $request->get('firstName'));
        $this->model->setAttribute('email', $request->get('email'));
        $this->model->setAttribute('password', $request->get('password'));
        if ($request->has('box')) {
            $this->model->setAttribute('idBox', $request->get('box'));
        }
        $saved = $this->model->save();
        if ($saved) {
            alert()->success('Usuario creado exitosamente', '¡NUEVO USUARIO CREADO!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Entity $entity)
    {
        $user = $this->model->find($id);
        $entitys = $entity->all();
        return view('auth.edit')->with(['user' => $user, 'entitys' => $entitys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->model->find($id);
        $user->setAttribute('lastName', $request->get('lastName'));
        $user->setAttribute('firstName', $request->get('firstName'));
        $user->setAttribute('email', $request->get('email'));
        $user->setAttribute('idBox', $request->get('idBox'));
        $updated = $user->save();
        if ($updated) {
            alert()->success('Perfil actualizado correctamente', '¡Perfil Actualizado!');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
