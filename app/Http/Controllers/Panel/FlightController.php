<?php

namespace App\Http\Controllers\Panel;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    private $flight;
    private $totalPage = 20;

    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Voo disponiveis";

        $flights = $this->flight->paginate($this->totalPage);

        return view('panel.flights.index',
                    compact('title'
                                ,'flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar voos';

        $planes = Plane::pluck('id', 'id');
        $airports = Airport::pluck('name', 'id');

        return view('panel.flights.create',
                    compact('title',
                                'planes',
                                   'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->flight->newFlight($request))
            return redirect()
                ->route('flights.index')
                ->with('success', 'Sucesso ao cadastrar');
        else
            return redirect()
                ->back()
                ->with('error', 'Falha ao deletar')
                ->withInput();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
