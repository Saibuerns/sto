<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\SubEntity;
use Illuminate\Http\Request;

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
        $name = $subEntity->find($idSubEntity)->name;
        return view('entity.subentity.box.create')->with('subEntity', $name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, SubEntity $subEntity)
    {
        $idSubEntity = $request->get('idSubEntity');
        $this->model->setAttribute('name', $request->get('boxName'));
        if ($request->has('boxDescription')) {
            $this->model->setAttribute('description', $request->get('subEntityDescription'));
        }
        $subEntity = $subEntity->find($idSubEntity);
        $saved = $subEntity->boxes()->save($this->model);
        if ($saved) {
            $prefixs = $subEntity->prefixs;
            $boxes = $subEntity->boxes;
            return redirect()->route('entity.subentity.show')->with('data', ['prefixs' => $prefixs, 'boxes' => $boxes]);
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
    public function edit($idSubEntity, $id, SubEntity $subEntity)
    {
        $name = $subEntity->find($idSubEntity)->name;
        $box = $this->model->find($id);
        return view('entity.subentity.box.create')->with(['subEntity' => $name, 'box' => $box]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SubEntity $subEntity)
    {
        $idSubEntity = $request->get('idSubEntity');
        $box = $this->model->find($id);
        $box->setAttribute('name', $request->get('boxName'));
        if ($request->has('boxDescription')) {
            $box->setAttribute('description', $request->get('boxDescription'));
        }
        $subEntity = $subEntity->find($idSubEntity);
        $updated = $subEntity->boxes()->save($box);
        if ($updated) {
            $prefixs = $subEntity->prefixs;
            $boxes = $subEntity->boxes;
            return redirect()->route('entity.subentity.show')->with('data', ['prefixs' => $prefixs, 'boxes' => $boxes]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSubEntity, $id)
    {
        $deleted = $this->model->find($id)->delete();
        if ($deleted) {
            return redirect()->route('entity.subentity.show')->with('idSubEntity', $idSubEntity);
        }
    }
}
