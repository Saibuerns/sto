<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Models\SubEntity;
use App\Http\Requests\Entity\SubEntity\Prefix\StoreRequest;
use App\Http\Requests\Entity\SubEntity\Prefix\UpdateRequest;

class PrefixController extends Controller
{

    function __construct(Prefix $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idSubEntity, SubEntity $subEntity)
    {
        $subEntity = $subEntity->find($idSubEntity);
        return view('prefix.create')->with('subEntity', $subEntity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->model->setAttribute('prefix', $request->get('prefix'));
        $this->model->setAttribute('from', $request->get('from'));
        $this->model->setAttribute('to', $request->get('to'));
        if ($request->has('priority')) {
            $this->model->setAttribute('priority', $request->get('priority'));
        }
        $idSubEntity = $request->get('idSubEntity');
        $this->model->setAttribute('idSubEntity', $idSubEntity);
        $saved = $this->model->save();
        if ($saved) {
            alert()->success('Prefijo asignado con exito', '¡Prefijo Asignado!');
            return redirect()->route('subentity.show')->with('idSubEntity', $idSubEntity);
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
        $prefix = $this->model->find($id);
        return view('prefix.edit')->with('prefix', $prefix);
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
        $prefix = $this->model->find($id);
        $prefix->setAttribute('prefix', $request->get('prefix'));
        $prefix->setAttribute('from', $request->get('from'));
        $prefix->setAttribute('to', $request->get('to'));
        $prefix->setAttribute('priority', $request->get('priority'));
        $idSubEntity = $request->get('idSubEntity');
        $prefix->setAttribute('idSubEntity', $idSubEntity);
        $updated = $prefix->save();
        if ($updated) {
            return redirect()->route('subentity.show')->with('idSubEntity', $idSubEntity);
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
            return redirect()->route('subentity.show');
        }
    }

    public function getPrefixByPrefix($idSubEntity, $prefix)
    {
        $exits = $this->model->where('idSubEntity', $idSubEntity)->where('prefix', $prefix)->get();
        return response()->json($exits);
    }
}
