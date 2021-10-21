@extends('layouts.app')

@section('content')
@include('layouts.headers.cards2')
<div class="container-fluid mt--7">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('histo.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Historias</h4>
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
                <label for="document" class="col-sm-2 col-form-label">Paciente</label>
                <div class="col-sm-7">
                    <select  class="form-control" id="mysearch"  name="idPatient"  multiselect-search="true" multiselect-select-all="true" onchange="checkAll(this)">
                            <option disable:option autofocus>seleccionar paciente</option>
                        @foreach ($paciente as $paciente)
                            <option class="form-control text-dark" name="idPatient" value="{{$paciente['id']}}">{{ $paciente['name'] }}</option>
                        @endforeach
                    </select>
                  @if ($errors->has('document'))
                    <span class="error text-danger" for="input-document">{{ $errors->first('document') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="document" class="col-sm-2 col-form-label">Profesional</label>
                <div class="col-sm-7">
                    <select  class="form-control" id="mysearch"  name="idProfessional"  multiselect-search="true" multiselect-select-all="true">
                            <option disable:option autofocus>seleccionar profesional</option>
                        @foreach ($profesional as $profesional)
                            <option class="form-control text-dark"  name="idProfessional" value="{{$profesional['id']}}">{{ $profesional['name'] }}</option>
                        @endforeach
                    </select>
                  @if ($errors->has('profesional'))
                    <span class="error text-danger" for="input-profesional">{{ $errors->first('profesional') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="date" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="datetime-local" class="form-control" name="date">
                  @if ($errors->has('date'))
                    <span class="error text-danger" for="input-date">{{ $errors->first('date') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="history" class="col-sm-2 col-form-label">Historia</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="history">
                  @if ($errors->has('history'))
                    <span class="error text-danger" for="input-history">{{ $errors->first('history') }}</span>
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
              <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('histo.index')}}">
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
