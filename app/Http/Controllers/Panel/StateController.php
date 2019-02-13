<?php

namespace App\Http\Controllers\Panel;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    private $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function index()
    {
        $states = $this->state->get();

        $title = 'Exibição dos estados brasileiros';

        return view('panel.states.index',
            compact('states', 'title'));
    }

    public function search(Request $request)
    {
        $dataForm = $request->all();

        $keySearch = $request->key_search;

        $states = $this->state->search($keySearch);

        $title = "Resultados de estado: {$keySearch}";

        return view('panel.states.index',
            compact('title',
                    'states',
                       'dataForm'));
    }

}
