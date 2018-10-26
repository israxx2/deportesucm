@extends('estudiante.layouts.app')

@section('title', 'torneos')
@section('torneos', 'active')

@section('content')

<div class="container">

    <div class="row">

        <div class="card card-chart">
            <div class="card-header">
                <h1 class="title">{{ $torneo->nombre }}</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <h3>Descripción</h3>
                <p class="blockquote">{{ $torneo->descripcion }}</p>
                </div>
                <br>
                <div class="container">
                    <h3>Participantes</h3>
                </div>

                @for($i=0;$i<$torneo->max;$i++)
                    <div class="card" style="width: 50rem;">
                        <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
    </div>

</div>

@endsection
