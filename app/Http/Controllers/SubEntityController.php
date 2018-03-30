<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\SubEntity;
use Illuminate\Http\Request;
use App\Http\Requests\Entity\SubEntity\StoreRequest;

class SubEntityController extends Controller
{

    public function __construct(Entity $entity, SubEntity $subEntity)
    {
        $this->parent = $entity;
        $this->model = $subEntity;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idEntity)
    {
        $entity = $this->parent->find($idEntity);
        return view('entity.subentity.create')->with('entity', $entity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $idEntity = $request->get('idEntity');
        $this->model->setAttribute('name', $request->get('subEntityName'));
        if ($request->has('subEntityDescription')) {
            $this->model->setAttribute('description', $request->get('subEntityDescription'));
        }
        $saved = $this->parent->find($idEntity)->subEntitys()->save($this->model);
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
        $subEntity = $this->model->find($id);
        return view('entity.subentity.show')->with('subEntity', $subEntity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEntity, $id)
    {
        $entity = $this->parent->find($idEntity);
        $subEntity = $this->model->find($id);
        return view('entity.subEntity.edit')->with(['entity' => $entity, 'subEntity' => $subEntity]);
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
        $subEntity = $this->model->find($id);
        $subEntity->setAttribute($request->get('nameSubEntity'));
        if ($request->has('descriptionSubEntity')) {
            $subEntity->setAttribute($request->get('descriptionSubEntity'));
        }
        $updated = $this->model->save();
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
        $deleted = $this->model->find($id)->delete();
        if ($deleted) {
            return redirect()->route('entity.index');
        }
    }
}
