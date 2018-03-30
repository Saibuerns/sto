<?php

namespace App\Http\Controllers;


use App\Models\Entity;
use Illuminate\Http\Request;
use App\Http\Requests\Entity\StoreRequest;

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
        $entitys = array();
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
        $entitys = array();
        $this->model->setAttribute('name', $request->get('entityName'));
        if ($request->has('entityDescription')) {
            $this->model->setAttribute('description', $request->get('entityDescription'));
        }
        if ($this->model->save()) {
            $entitys = $this->model->all();
        }
        return redirect()->route('entity.create')->with('entitys', $entitys);
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
        $entity->setAttribute($request->get('nameEntity'));
        if ($request->has('descriptionEntity')) {
            $entity->setAttribute($request->get('descriptionEntity'));
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
        $deleted = $this->model->find($id)->delete();
        if ($deleted) {
            return redirect()->route('entity.index');
        }
    }
}
