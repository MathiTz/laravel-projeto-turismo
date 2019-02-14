@extends('panel.layouts.app')

@section('content')

    <div class="bred">
        <a href="{{route('panel')}}" class="bred">Home ></a>
        <a href="" class="bred">Flights</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Voos</h1>
    </div>

    <div class="content-din bg-white">

        <div class="form-search">
            {{ Form::open(['route' => 'brands.search',
                           'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, [
            'class' => 'form-control',
            'placeholder' => 'Pesquisar']) }}

            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}

            @if(isset($dataForm['key_search']))
                <div class="alert alert-info">
                    <p>
                        <a href="{{route('flights.index')}}">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                        Resultados para:
                        <strong>
                            {{$dataForm['key_search']}}
                        </strong>
                    </p>
                </div>

            @endif

        </div>

        <div class="messages">
            @include('panel.includes.alerts')
        </div>

        <div class="class-btn-insert">
            <a href="{{route('flights.create')}}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Origem</th>
                <th>Destino</th>
                <th>Paradas</th>
                <th>Data</th>
                <th>Saida</th>
                <th width="180px">Ações</th>
            </tr>

            @forelse($flights as $flight)
                <tr>
                    <td>{{$flight->id}}</td>
                    <td>{{$flight->airport_origin_id}}</td>
                    <td>{{$flight->airport_destination_id}}</td>
                    <td>{{$flight->qty_stops}}</td>
                    <td>{{$flight->date}}</td>
                    <td>{{$flight->hour_output}}</td>
                    <td>
                        <a href="{{route('brands.edit', $flight->id)}}"
                           class="edit">Edit</a>
                        <a href="{{route('brands.show', $flight->id)}}"
                           class="delete">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum item cadastrado!</td>
                </tr>
            @endforelse
        </table>

        @if(isset($dataForm))
            {{ $flights->appends($dataForm)->links() }}
        @else
            {{ $flights->links() }}
        @endif

    </div><!--Content Dinâmico-->


@endsection