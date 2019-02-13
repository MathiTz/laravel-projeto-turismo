<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;
class CityController extends Controller
{
    private $totalPage = 30;

    public function index($initials)
    {
        $state = State::where('initials', $initials)
            ->get()
            ->first();

        if(!$state)
            return redirect()->back;

        $cities = $state->cities()->paginate($this->totalPage);
        //$cities = $state->cities()->get(); PERMITI O USO DE FILTRO

        $title = "Cidades do estado {$state->name}";

        return view('panel.cities.index',
            compact('title',
                'cities',
                   'state'));
    }

    public function search(Request $request, $initials)
    {
        $state = State::where('initials', $initials)
            ->get()
            ->first();

        if(!$state)
            return redirect()->back;

        $dataForm = $request->all();
        $keySearch = $request->key_search;

        $cities = $state->searchCities($keySearch, $this->totalPage);

        $title = "Filtro: Cidades do estado {$state->name}";

        return view('panel.cities.index',
            compact('title',
                'cities',
                   'state',
                   'dataForm'));
    }
}
