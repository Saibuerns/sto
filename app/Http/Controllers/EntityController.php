<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Http\Requests\Entity\StoreRequest;
use App\Http\Requests\Entity\UpdateRequest;

class EntityController extends Controller
{

    public function __construct(Entity $entity)
    {
        $this->model = $entity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entitys = $this->model->all();
        return view('entity.index')->with('entitys', $entitys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->model->setAttribute('name', $request->get('entityName'));
        if ($request->has('entityDescription')) {
            $this->model->setAttribute('description', $request->get('entityDescription'));
        }
        $saved = $this->model->save();
        if ($saved) {
            return redirect()->route('entity.index');
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
    public function edit($id)
    {
        $entity = $this->model->find($id);
        return view('entity.edit')->with('entity', $entity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $entity = $this->model->find($id);
        $entity->setAttribute('name', $request->get('entityName'));
        if ($request->has('entityDescription')) {
            $entity->setAttribute('description', $request->get('entityDescription'));
        }
        $updated = $entity->save();
        if ($updated) {
            return redirect()->route('entity.index');
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
        $deleted = $this->model->delete($id);
        if ($deleted) {
            alert()->success('La entidad fue dada de baja correctamente', 'Exito!');
            return redirect()->route('entity.index');
        }
    }
}
