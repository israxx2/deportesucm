@extends('estudiante.layouts.app')

@section('title', 'Perfil')
@section('perfil', 'active')
@section('content')

<div class="row">
    <div class="col-sm-3">
        <div class="card card-user">
            <div class="image">
                <img src="{{ asset('estudiante/assets/img/fondo-de-pantalla-plano-de-color-arena.jpg') }}" alt="...">
            </div>
            <div class="card-body">
                <div class="author">
                    <a href="#">
                        <img class="avatar border-gray" src="{{ asset('estudiante/img_perfil/carlos_washito.jpg') }}" alt="...">
                        <h5 class="title">Carlos Orellana</h5>
                    </a>
                    <p class="description">
                        PerraQla
                    </p>
                </div>
            </div>
            <hr>
            <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                    <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                    <i class="fab fa-google-plus-g"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-chart">
            <div class="card-header">
              <h5 class="card-category"></h5>
              <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExample"></canvas>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
              </div>
            </div>
          </div>
    </div>

    <div class="col-sm-3">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category"></h5>
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
                <div class="chart-area">
                <canvas id="lineChartExample"></canvas>
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
            </div>
            </div>
    </div>

</div>

@endsection
