<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\Number;
use App\Models\SubEntity;
use App\Models\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector as PrintConnector;
use Mike42\Escpos\Printer as Printerl;
use Illuminate\Support\Carbon;

class NumberController extends Controller
{

    private $printer;

    function __construct(Number $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Entity $entity)
    {
        $entitys = $entity->all();
        return view('number.create1')->with('entitys', $entitys);
    }

    public function create2($idEntity, Entity $entity)
    {
        $subEntitys = $entity->find($idEntity)->subEntitys;
        return view('number.create2')->with('subEntitys', $subEntitys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store($idSubEntity, SubEntity $subEntity)
    {
        try {
            $subEntity = $subEntity->find($idSubEntity);
            $prefix = $subEntity->prefix;
            if (!is_null($prefix)) {
                $number = $this->checkNumber($prefix->id, $prefix->from, $prefix->to);
                $lenght = strlen((string)$prefix->to);
                $code = $prefix->prefix . '-' . str_pad($number, $lenght, '0', STR_PAD_LEFT);
                $this->model->setAttribute('number', $number);
                $this->model->setAttribute('code', $code);
                $this->model->setAttribute('idPrefix', $prefix->id);
                $saved = $this->model->save();
                if ($saved) {
                    $this->printNumber($code);
                    alert()->success('GRACIAS POR ELEGIRNOS', 'NUMERO GENERADO!');
                }
            } else {
                alert()->error('No existen creados prefijos para la sub entidad, contactarse con el administrador',
                    'ERROR')->persistent();
            }
        } catch (Exception $exc) {
            throw $exc;
        }
        return redirect()->route('number.create1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function showNumbers($idSubEntity, SubEntity $subEntity)
    {
        $numbers = $subEntity->find($idSubEntity)->prefix->numbers->where('called', 0);
        return view('number.showBySubEntity')->with(['numbers' => $numbers]);
    }

    public function storePrinter(PrinterRequest $request, Printer $printer)
    {
        $printer->name = $request->get('name');
        $printer->ip = $request->get('ip');
        $printer->port = $request->get('port');
        $printer->selected = $request->get('selected');
        $saved = $printer->save();
        if ($saved) {
            alert()->success('Impresora guardada exitosamente');
        } else {
            alert()->error('Ocurrio un error y la impresora no pudo guardarse');
        }
        return redirect()->route('printers.index');
    }

    private function checkNumber($idPrefix, $from, $to)
    {
        $lastNumber = $this->model->where('idPrefix', $idPrefix)->max()->value('number');
        if (!is_null($lastNumber)) {
            if ($lastNumber <= $to) {
                $number = $lastNumber + 1;
                return $number;
            }
        }
        return $from;
    }

    private function setPrinter(Printer $printer)
    {
        $this->printer = $printer->where('selected', 1)->first();
    }

    private function printNumber($code)
    {
        $this->setPrinter(new Printer);
        $connector = new FilePrintConnector("./prueba.txt");
        //$connector = new PrintConnector($this->printer->ip, $this->printer->port);
        $print = new Printerl($connector);
        try {
            $print->setTextSize(5, 5);
            $print->text($code);
            $print->cut();
        } catch (Exception $exc) {
            throw $exec;
        } finally {
            $print->close();
        }
    }
    /* private function checkPriority(Prefix $prefix)
      {
      $numbers = $this->model->where('called', 0)->get();
      $idsPrefix = $numbers->pluck('idPrefix')->all();
      $prioritys = $prefix->whereIn('id', $idsPrefix)->select('priority')->get();
      } */
}
