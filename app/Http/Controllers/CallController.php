<?php

namespace App\Http\Controllers;

use App\Http\Requests\Call\StoreRequest;
use App\Http\Requests\Call\UpdateRequest;
use App\Models\Call;
use App\Models\Number;
use Carbon\Carbon;

class CallController extends Controller
{
    function __construct(Call $call)
    {
        $this->model = $call;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $fechahora = Carbon::now()->toDateTimeString();
        $this->model->setAttribute('start', $fechahora);
        $idBox = $request->get('idBox');
        $this->model->setAttribute('idBox', $idBox);
        $idNumber = $request->get('idNumber');
        $this->model->setAttribute('idNumber', $idNumber);
        $saved = $this->model->save();
        if ($saved) {
            if ($request->ajax()) {
                return response()->json($this->model);
            }
            return redirect()->route('numbers.showBySubEntity', ['call' => $saved]);
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
        //
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
        $call = $this->model->find($id);
        $recall = $request->get('recall');
        $end = $request->get('end');
        $number = $call->number;
        if (($recall == "true") && ($end == "false")) {
            $this->model->setAttribute('idNumber', $call->idNumber);
            $this->model->setAttribute('idBox', $call->idBox);
            $saved = $this->model->save();
            if ($saved) {
                $recalls = $number->recalls + 1;
                $number->setAttribute('recalls', $recalls);
            }
        } elseif (($recall == "false") && ($end == "true")) {
            $fechahora = Carbon::now();
            $number->setAttribute('end', $fechahora);
        }
        $updated = $number->save();
        if ($updated) {
            return response()->json(true);
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
        //
    }
}
