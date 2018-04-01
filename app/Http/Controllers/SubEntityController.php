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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idEntity, Entity $entity)
    {
        $entity = $entity->find($idEntity);
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
        $this->model->setAttribute('name', $request->get('subEntityName'));
        $this->model->setAttribute('idEntity', $request->get('idEntity'));
        if ($request->has('subEntityDescription')) {
            $this->model->setAttribute('description', $request->get('subEntityDescription'));
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
    public function show($idEntity, $id)
    {
        $subEntity = $this->model->find($id);
        return view('entity.subentity.show')->with(['idEntity' => $idEntity, 'subEntity' => $subEntity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEntity, $id, Entity $entity)
    {
        $entity = $entity->find($idEntity);
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
    public function update(UpdateRequest $request, $id)
    {
        $this->model->find($id);
        $this->model->setAttribute('name', $request->get('nameSubEntity'));
        $this->model->setAttribute('idEntity', $request->get('idEntity'));
        if ($request->has('descriptionSubEntity')) {
            $this->model->setAttribute('description', $request->get('descriptionSubEntity'));
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
        $deleted = $this->model->delete($id);
        if ($deleted) {
            return redirect()->route('entity.index');
        }
    }
}
