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
    $this->resource('brands', 'BrandController');
    $this->get('/', 'PanelController@index')
        ->name('panel');
});




$this->get('promocoes', 'Site\SiteController@promotions')->name('promotions');
$this->get('/', 'Site\SiteController@index');

Auth::routes();