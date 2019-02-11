@extends('panel.layouts.app')

@section('content')

    <div class="bred">
        <a href="{{route('panel')}}" class="bred">Home > </a>
        <a href="{{route('brands.index')}}" class="bred">Brands > </a>
        <a href="" class="bred">Detalhes</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">{{$brand->name}}</h1>
    </div>

    <div class="messages">
        @include('panel.includes.alerts')
    </div>

    <div class="content-din">
        <ul>
            <li>
                Nome: <strong>{{$brand->name}}</strong>
            </li>
        </ul>

        {{ Form::open(
        ['route' => ['brands.destroy', $brand->id],
         'class' => 'form form-search form-ds',
         'method' => 'DELETE']) }}

        <div class="form-group">
            <button class="btn btn-danger">
                Deletar a marca {{$brand->name}}
            </button>
        </div>
        {{ Form::close() }}

    </div><!--Content Dinâmico-->

@endsection