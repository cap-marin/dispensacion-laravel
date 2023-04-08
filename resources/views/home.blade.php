@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Bienvenido al Sistema de Facturación</div>
  
          <div class="card-body">
            <h1 class="text-center">¡Factura con estilo!</h1>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                  <div class="card-header">Crear Factura</div>
                  <div class="card-body">
                    <p class="card-text">Crea una nueva factura para un cliente.</p>
                    <a href="/facturas/create" class="btn btn-light">Crear</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                  <div class="card-header">Ver Facturas</div>
                  <div class="card-body">
                    <p class="card-text">Ver las facturas existentes en el sistema.</p>
                    <a href="/facturas" class="btn btn-light">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                  <div class="card-header">Clientes</div>
                  <div class="card-body">
                    <p class="card-text">Administra la información de tus clientes.</p>
                    <a href="/clientes" class="btn btn-light">Administrar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

