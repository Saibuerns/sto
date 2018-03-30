<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Models\SubEntity;
use Illuminate\Http\Request;

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
        return view('entity.subentity.prefix.create')->with('subEntity', $subEntity);
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
        $this->model->setAttribute('prefix', $request->get('prefix'));
        $this->model->setAttribute('from', $request->get('from'));
        $this->model->setAttribute('reset', $request->get('reset'));
        $subEntity = $subEntity->find($idSubEntity);
        $saved = $subEntity->prefixs()->save($this->model);
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
        $prefix = $this->model->find($id);
        return view('entity.subentity.box.create')->with(['subEntity' => $name, 'prefix' => $prefix]);
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
        $prefix = $this->model->find($id);
        $prefix->setAttribute('name', $request->get('boxName'));
        if ($request->has('boxDescription')) {
            $prefix->setAttribute('description', $request->get('boxDescription'));
        }
        $subEntity = $subEntity->find($idSubEntity);
        $updated = $subEntity->prefixs()->save($prefix);
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
    public function destroy($idSubEntity, $id, SubEntity $subEntity)
    {
        $deleted = $subEntity->find($idSubEntity)->prefixs()->delete($id);
        if ($deleted) {
            $prefixs = $subEntity->prefixs;
            $boxes = $subEntity->boxes;
            return redirect()->route('entity.subentity.show')->with('data', ['prefixs' => $prefixs, 'boxes' => $boxes]);
        }
    }
}
