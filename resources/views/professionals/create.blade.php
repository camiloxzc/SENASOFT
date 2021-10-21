@extends('layouts.app')

@section('content')
@include('layouts.headers.cards2')
<div class="container-fluid mt--7">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('professional.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Profesional</h4>
                <p class="card-category">Información</p>
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
                  <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-7 p-2">
                    <input type="text" class="form-control" name="name" placeholder="Ingrese nombre del profesional" onkeyup="letras(this)" autofocus>
                    @if ($errors->has('name'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <label for="idCareer" class="col-sm-2 col-form-label">Profesion</label>
                  <div class="col-sm-7 p-2">
                      <select  class="form-control" id="mysearch"  name="idCareer"  multiselect-search="true" multiselect-select-all="true" onchange="checkAll(this)">
                          @foreach ($profesion as $profesion)
                              <option class="form-control text-dark" name="idCareer" value="{{$profesion['id']}}">{{ $profesion['career'] }}</option>
                          @endforeach
                      </select>
                    @if ($errors->has('idCareer'))
                      <span class="error text-danger" for="input-profesion">{{ $errors->first('idCareer') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <label for="signature" class="col-sm-2 col-form-label">Firma</label>
                  <div class="col-sm-7 p-2">
                    <input type="file" class="form-control" name="signature">
                    @if ($errors->has('signature'))
                      <span class="error text-danger" for="input-signature">{{ $errors->first('signature') }}</span>
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
                <button type="submit" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('professional.index')}}">
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
    <script>
      $(document).ready(function(){
        $('#mysearch').select2();
      });
    </script>
    <script src="{{ asset('js/validar.js')}}" defer></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
