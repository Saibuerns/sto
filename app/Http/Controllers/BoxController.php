<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\SubEntity;
use App\Http\Requests\Entity\SubEntity\Box\StoreRequest;
use App\Http\Requests\Entity\SubEntity\Box\UpdateRequest;

class BoxController extends Controller
{

    function __construct(Box $box)
    {
        $this->model = $box;
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
        return view('box.create')->with('subEntity', $subEntity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->model->setAttribute('name', $request->get('boxName'));
        $idSubEntity = $request->get('idSubEntity');
        $this->model->setAttribute('idSubentity', $idSubEntity);
        if ($request->has('boxDescription')) {
            $this->model->setAttribute('description', $request->get('boxDescription'));
        }
        $saved = $this->model->save();
        if ($saved) {
            alert()->success('Nuevo box guardado exitosamente', '¡Box Guardado!');
            return redirect()->route('subentity.show', ['idSubEntity' => $idSubEntity]);
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
        $box = $this->model->find($id);
        return view('box.edit')->with('box', $box);
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
        $box = $this->model->find($id);
        $box->setAttribute('name', $request->get('boxName'));
        $idSubEntity = $request->get('idSubEntity');
        $box->setAttribute('idSubEntity', $idSubEntity);
        if ($request->has('boxDescription')) {
            $box->setAttribute('description', $request->get('boxDescription'));
        }
        $updated = $box->save();
        if ($updated) {
            alert()->success('Box actualizado exitosamente', '¡Box Actualizado!');
            return redirect()->route('subentity.show', ['idSubEntity' => $idSubEntity]);
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

    public function getBoxes($idSubEntity)
    {
        return response()->json($this->model->where('idSubEntity', $idSubEntity)->get());
    }
}
