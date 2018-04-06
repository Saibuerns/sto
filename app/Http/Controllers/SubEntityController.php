<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\SubEntity;
use App\Http\Requests\Entity\SubEntity\StoreRequest;
use App\Http\Requests\Entity\SubEntity\UpdateRequest;

class SubEntityController extends Controller
{

    public function __construct(SubEntity $subEntity)
    {
        $this->model = $subEntity;
    }

    public function index(Entity $entity)
    {
        $disabled = 'disabled';
        $subEntitys = $this->model->all();
        if (!empty($entity->first())) {
            $disabled = '';
        } else {
            alert()->warning('Debe cargar al menos una entidad, antes de poder cargar una sub entidad',
                '¡No hay entidades cargadas!');
        }
        return view('subentity.index')->with(['subEntitys' => $subEntitys, 'disabled' => $disabled]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idEntity = null, Entity $entity)
    {
        if (is_null($idEntity)) {
            $entitys = $entity->all();
        } else {
            $entitys = $entity->find($idEntity);
        }
        return view('subentity.create')->with('entitys', $entitys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->model->setAttribute('name', $request->get('subEntityName'));
        $this->model->setAttribute('idEntity', $request->get('entity'));
        if ($request->has('subEntityDescription')) {
            $this->model->setAttribute('description', $request->get('subEntityDescription'));
        }
        $saved = $this->model->save();
        if ($saved) {
            alert()->success('Sub Entidad creada exitosamente', '¡Exito!');
            return redirect()->route('subentity.index');
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
        $subEntity = $this->model->find($id);
        return view('subentity.show')->with('subEntity', $subEntity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subEntity = $this->model->find($id);
        return view('subentity.edit')->with('subEntity', $subEntity);
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
        $subEntity = $this->model->find($id);
        $subEntity->setAttribute('name', $request->get('subEntityName'));
        $subEntity->setAttribute('idEntity', $request->get('idEntity'));
        if ($request->has('subEntityDescription')) {
            $subEntity->setAttribute('description', $request->get('subEntityDescription'));
        }
        $updated = $subEntity->save();
        if ($updated) {
            alert()->success('Sub Entidad actualizada con exito', '¡Sub Entidad Actualizada!');
            return redirect()->route('subentity.index');
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
            return redirect()->route('subentity.index');
        }
    }

    public function getSubEntitys($idEntity)
    {
        return response()->json($this->model->where('idEntity', $idEntity)->get());
    }
}
