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
    public function create($idEntity, $idSubEntity, SubEntity $subEntity)
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
    public function store(StoreRequest $request, $idEntity)
    {
        $this->model->setAttribute('prefix', $request->get('prefix'));
        $this->model->setAttribute('from', $request->get('from'));
        $this->model->setAttribute('to', $request->get('to'));
        if ($request->has('priority')) {
            $this->model->setAttribute('priority', $request->get('priority'));
        }
        $this->model->setAttribute('idSubEntity', $request->get('idSubEntity'));
        $saved = $this->model->save();
        if ($saved) {
            return redirect()->route('entity.subentity.show');
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
    public function edit($idEntity, $idSubEntity, $id, SubEntity $subEntity)
    {
        $name = $subEntity->find($idSubEntity)->name;
        $prefix = $this->model->find($id);
        return view('entity.subentity.prefix.edit')->with(['subEntity' => $name, 'prefix' => $prefix]);
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
        $this->model->setAttribute('prefix', $request->get('prefix'));
        $this->model->setAttribute('from', $request->get('from'));
        $this->model->setAttribute('to', $request->get('to'));
        $this->model->setAttribute('priority', $request->get('priority'));
        $this->model->setAttribute('idSubEntity', $request->get('idSubEntity'));
        $updated = $this->model->save();
        if ($updated) {
            return redirect()->route('entity.subentity.show');
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
            return redirect()->route('entity.subentity.show');
        }
    }
}
