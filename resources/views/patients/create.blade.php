@extends('layouts.app')

@section('content')
@include('layouts.headers.cards2')
<div class="container-fluid mt--7">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('patient.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Paciente</h4>
              <p class="card-category">Información requerida</p>
            </div>
            <div class="card-body">
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif --}}
              <div class="row">
                <label for="document" class="col-sm-2 col-form-label">Documento</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="document" value="{{ old('document') }}" placeholder="Ingrese documento" onkeyup="onlyNumbers(this)"  autofocus>
                  @if ($errors->has('document'))
                    <span class="error text-danger" for="input-document">{{ $errors->first('document') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese nombre del paciente" onkeyup="onlyLetters(this)" >
                  @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">    
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('patient.index')}}">
                  Cancelar</a>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush