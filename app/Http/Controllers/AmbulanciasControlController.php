<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Storage;
use App\AmbulanciasControl;

class AmbulanciasControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('ambulancias_control')->
                    select('ambulancias_control.*')->
                    get();
        return view('panel.ambulancia.control.index', ['datos' => $datos,'name' => 'Lista de controles de ambulancias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.ambulancia.control.create',['name' => 'Crear un control a una ambulancia']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revision = [
            'opcion1' => $request->get('opcion1'),
            'opcion2' => $request->get('opcion2'),
            'opcion3' => $request->get('opcion3'),
            'opcion4' => $request->get('opcion4'),
            'opcion5' => $request->get('opcion5'),
            'opcion6' => $request->get('opcion6'),
            'opcion7' => $request->get('opcion7'),
            'opcion8' => $request->get('opcion8'),
            'opcion9' => $request->get('opcion9'),
            'opcion10' => $request->get('opcion10'),
            'opcion11' => $request->get('opcion11'),
            'opcion12' => $request->get('opcion12'),
            'opcion13' => $request->get('opcion13'),
            'opcion14' => $request->get('opcion14'),
            'opcion15' => $request->get('opcion15'),
            'opcion16' => $request->get('opcion16'),
            'opcion17' => $request->get('opcion17'),
            'opcion18' => $request->get('opcion18'),
            'opcion19' => $request->get('opcion19'),
            'opcion20' => $request->get('opcion20'),
            'opcion21' => $request->get('opcion21'),
            'opcion22' => $request->get('opcion22'),
            'opcion23' => $request->get('opcion23'),
            'opcion24' => $request->get('opcion24'),
            'opcion25' => $request->get('opcion25'),
            'opcion26' => $request->get('opcion26'),
            'opcion27' => $request->get('opcion27'),
            'opcion28' => $request->get('opcion28'),
            'opcion29' => $request->get('opcion29'),
            'opcion20' => $request->get('opcion20'),
            'opcion21' => $request->get('opcion21'),
            'opcion22' => $request->get('opcion22'),
            'opcion23' => $request->get('opcion23'),
            'opcion24' => $request->get('opcion24'),
            'opcion25' => $request->get('opcion25'),
            'opcion26' => $request->get('opcion26'),
            'opcion27' => $request->get('opcion27'),
            'opcion28' => $request->get('opcion28'),
            'opcion29' => $request->get('opcion29'),
            'opcion30' => $request->get('opcion30'),
            'opcion31' => $request->get('opcion31'),
            'opcion32' => $request->get('opcion32'),
            'opcion33' => $request->get('opcion33'),
            'opcion34' => $request->get('opcion34'),
            'opcion35' => $request->get('opcion35'),
            'opcion36' => $request->get('opcion36'),
            'opcion37' => $request->get('opcion37'),
            'opcion38' => $request->get('opcion38'),
            'opcion39' => $request->get('opcion39'),
            'opcion40' => $request->get('opcion40'),
            'opcion41' => $request->get('opcion41'),
            'opcion42' => $request->get('opcion42'),
            'opcion43' => $request->get('opcion43'),
            'opcion44' => $request->get('opcion44'),
            'opcion45' => $request->get('opcion45'),
            'opcion46' => $request->get('opcion46'),
            'opcion47' => $request->get('opcion47'),
            'opcion48' => $request->get('opcion48'),
            'opcion49' => $request->get('opcion49'),
            'opcion50' => $request->get('opcion50'),
            'opcion51' => $request->get('opcion51'),
            'opcion52' => $request->get('opcion52'),
            'opcion53' => $request->get('opcion53'),
            'opcion54' => $request->get('opcion54'),
            'opcion55' => $request->get('opcion55'),
            'opcion56' => $request->get('opcion56'),
            'opcion57' => $request->get('opcion57'),
            'opcion58' => $request->get('opcion58'),
            'opcion59' => $request->get('opcion59'),
            'opcion60' => $request->get('opcion60'),
            'opcion61' => $request->get('opcion61'),
            'opcion62' => $request->get('opcion62'),
            'opcion63' => $request->get('opcion63'),
            'opcion64' => $request->get('opcion64')
        ];
        $control = new AmbulanciasControl;
        $control->fecha = $request->get('fecha');
        $control->empresa = $request->get('empresa');
        $control->placa = $request->get('placa');
        $control->servicios = $request->get('servicio');
        $control->inspector = $request->get('inspector');
        $control->razon = $request->get('razon');
        $control->revision = json_encode($revision);

        $control->save();

        return Redirect::to('ambulancias/control')->withSuccess('Control de ambulancia creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $control = DB::table('ambulancias_control')->
                    select('ambulancias_control.*')->
                    where('id','=',$id)->
                    get();
        $revision =  json_decode($control[0]->revision);
        return view("panel.ambulancia.control.edit",['control' => $control[0],'revision' => $revision ,'name' => 'Editar control ambulancia']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $revision = [
            'opcion1' => $request->get('opcion1'),
            'opcion2' => $request->get('opcion2'),
            'opcion3' => $request->get('opcion3'),
            'opcion4' => $request->get('opcion4'),
            'opcion5' => $request->get('opcion5'),
            'opcion6' => $request->get('opcion6'),
            'opcion7' => $request->get('opcion7'),
            'opcion8' => $request->get('opcion8'),
            'opcion9' => $request->get('opcion9'),
            'opcion10' => $request->get('opcion10'),
            'opcion11' => $request->get('opcion11'),
            'opcion12' => $request->get('opcion12'),
            'opcion13' => $request->get('opcion13'),
            'opcion14' => $request->get('opcion14'),
            'opcion15' => $request->get('opcion15'),
            'opcion16' => $request->get('opcion16'),
            'opcion17' => $request->get('opcion17'),
            'opcion18' => $request->get('opcion18'),
            'opcion19' => $request->get('opcion19'),
            'opcion20' => $request->get('opcion20'),
            'opcion21' => $request->get('opcion21'),
            'opcion22' => $request->get('opcion22'),
            'opcion23' => $request->get('opcion23'),
            'opcion24' => $request->get('opcion24'),
            'opcion25' => $request->get('opcion25'),
            'opcion26' => $request->get('opcion26'),
            'opcion27' => $request->get('opcion27'),
            'opcion28' => $request->get('opcion28'),
            'opcion29' => $request->get('opcion29'),
            'opcion20' => $request->get('opcion20'),
            'opcion21' => $request->get('opcion21'),
            'opcion22' => $request->get('opcion22'),
            'opcion23' => $request->get('opcion23'),
            'opcion24' => $request->get('opcion24'),
            'opcion25' => $request->get('opcion25'),
            'opcion26' => $request->get('opcion26'),
            'opcion27' => $request->get('opcion27'),
            'opcion28' => $request->get('opcion28'),
            'opcion29' => $request->get('opcion29'),
            'opcion30' => $request->get('opcion30'),
            'opcion31' => $request->get('opcion31'),
            'opcion32' => $request->get('opcion32'),
            'opcion33' => $request->get('opcion33'),
            'opcion34' => $request->get('opcion34'),
            'opcion35' => $request->get('opcion35'),
            'opcion36' => $request->get('opcion36'),
            'opcion37' => $request->get('opcion37'),
            'opcion38' => $request->get('opcion38'),
            'opcion39' => $request->get('opcion39'),
            'opcion40' => $request->get('opcion40'),
            'opcion41' => $request->get('opcion41'),
            'opcion42' => $request->get('opcion42'),
            'opcion43' => $request->get('opcion43'),
            'opcion44' => $request->get('opcion44'),
            'opcion45' => $request->get('opcion45'),
            'opcion46' => $request->get('opcion46'),
            'opcion47' => $request->get('opcion47'),
            'opcion48' => $request->get('opcion48'),
            'opcion49' => $request->get('opcion49'),
            'opcion50' => $request->get('opcion50'),
            'opcion51' => $request->get('opcion51'),
            'opcion52' => $request->get('opcion52'),
            'opcion53' => $request->get('opcion53'),
            'opcion54' => $request->get('opcion54'),
            'opcion55' => $request->get('opcion55'),
            'opcion56' => $request->get('opcion56'),
            'opcion57' => $request->get('opcion57'),
            'opcion58' => $request->get('opcion58'),
            'opcion59' => $request->get('opcion59'),
            'opcion60' => $request->get('opcion60'),
            'opcion61' => $request->get('opcion61'),
            'opcion62' => $request->get('opcion62'),
            'opcion63' => $request->get('opcion63'),
            'opcion64' => $request->get('opcion64')
        ];
        $control = AmbulanciasControl::findOrFail($id);
        $control->fecha = $request->get('fecha');
        $control->empresa = $request->get('empresa');
        $control->placa = $request->get('placa');
        $control->servicios = $request->get('servicio');
        $control->inspector = $request->get('inspector');
        $control->razon = $request->get('razon');
        $control->revision = json_encode($revision);

        $control->update();

        return Redirect::to('ambulancias/control')->withSuccess('Control de ambulancia editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $control = AmbulanciasControl::findOrFail($id);
        $control->delete();

        return Redirect::to('ambulancias/control')->withSuccess('Control de ambulancia eliminada exitosamente');
    }

    public function generatePdf($id){
        $control = DB::table('ambulancias_control')->
        select('ambulancias_control.*')->
        where('id','=',$id)->
        get();

        $revision =  json_decode($control[0]->revision);

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
            .page-break {
                page-break-after: always;
            }
            </style>
        </head>
        <body>';
        //return view('panel.ambulancia.control.pdf',['control' => $control[0], 'revision' => $revision]);
        //$pdf = \PDF::loadView('panel.ambulancia.control.pdf',['control' => $control[0], 'revision' => $revision]);
        $view = view('panel.ambulancia.control.pdf')->with(['control' => $control[0], 'revision' => $revision]);
        $html .= $view->render();

        $html .= '</body></html>';
        $pdf = \PDF::loadHTML($html); 

        return $pdf->download('control_ambulancia_'.$id.'.pdf');
    }

    public function generateAllPdf(){
        $inicio = $_GET['fechaInicio'];
        $fin = $_GET['fechaFin'];

        $controles = DB::table('ambulancias_control')->
                    select('ambulancias_control.*')->
                    where('fecha','>=',$inicio)->
                    where('fecha','<=',$fin)->
                    get();
        
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
            .page-break {
                page-break-after: always;
            }
            </style>
        </head>
        <body>';
        foreach($controles as $control){
            $revision =  json_decode($control->revision);

            $view = view('panel.ambulancia.control.pdf')->with(['control' => $control, 'revision' => $revision]);
            $html .= $view->render();
            //return view('panel.ambulancia.control.pdf',['control' => $control[0], 'revision' => $revision]);
            //$pdf = \PDF::loadView('panel.ambulancia.control.pdf',['control' => $control, 'revision' => $revision]);
            $html .= '<div class="page-break"></div>';
            
        }
        $html .= '</body></html>';
        $pdf = \PDF::loadHTML($html);            
        return $pdf->download('controles_ambulancias.pdf');
    }
}
