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
        $name = $subEntity->find($idSubEntity)->name;
        return view('entity.subentity.box.create')->with('subEntity', $name);
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
        $this->model->setAttribute('idSubentity', $request->get('idSubEntity'));
        if ($request->has('boxDescription')) {
            $this->model->setAttribute('description', $request->get('boxDescription'));
        }
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
    public function update(UpdateRequest $request, $id)
    {
        $this->model->find($id);
        $this->model->setAttribute('name', $request->get('boxName'));
        $this->model->setAttribute('idSubEntity', $request->get('idSubEntity'));
        if ($request->has('boxDescription')) {
            $this->model->setAttribute('description', $request->get('boxDescription'));
        }
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
