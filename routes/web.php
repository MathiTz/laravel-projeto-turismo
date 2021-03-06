<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$this->group(['prefix'=>'panel', 'namespace' => 'Panel'], function(){
    $this->any('brands/search', 'BrandController@search')
        ->name('brands.search');

    $this->get('brands/{id}/planes', 'BrandController@planes')
        ->name('brands.planes');

    $this->resource('brands', 'BrandController');

    $this->any('planes/search', 'PlaneController@search')
        ->name('planes.search');

    $this->resource('planes', 'PlaneController');

    $this->post('states', 'StateController@search')
        ->name('states.search');
    $this->get('states', 'StateController@index')
        ->name('states.index');

    $this->any('state/{initials}/cities/search', 'CityController@search')
        ->name('state.cities.search');
    $this->get('state/{initials}/cities', 'CityController@index')
        ->name('state.cities');

    $this->any('flights', 'FlightController@search')
        ->name('flights.search');
    $this->resource('flights', 'FlightController');

    $this->get('/', 'PanelController@index')
        ->name('panel');
});




$this->get('promocoes', 'Site\SiteController@promotions')
    ->name('promotions');
$this->get('/', 'Site\SiteController@index');

Auth::routes();