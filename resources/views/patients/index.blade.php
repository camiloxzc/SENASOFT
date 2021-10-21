@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards2')
<div class="container-fluid mt--7">
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title"><strong>PACIENTES</strong>
                                <p class="card-category">Lista de pacientes</p>
                                {{ Form::open(['route' => 'patient.index', 'method' => 'GET', 'class' => 'form-inline','id'=>'histo']) }}
                                <div class="form-group" id="busc">
                                    {{ Form::text('buscar', null, ['class' => 'form-control pull-right','wire:model' => 'search', 'placeholder' => 'Buscar informacion']) }}
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <span class="material-icons">search</span>
                                    </button>
                                </div>
                                {{ Form::close() }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right p-2">
                                    <a href="{{route('patient.create')}}" class="btn btn-round btn-sm btn-facebook ">Nuevo paciente</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover align-items-center" id="">
                                    <thead class="text-primary thead-dark">
                                        <th class="col-md-4">Documento</th>
                                        <th class="col-md-5">Nombre</th>
                                        <th class="col-md-3 text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->document }}</td>
                                            <td>{{ $patient->name}}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('patient.show', $patient->id) }}" class="btn btn-sm btn-round btn-info"> <i
                                                class="material-icons">visibility</i> </a>
                                                <form action="{{ route('patient.destroy', $patient->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-round btn-danger" type="submit" rel="tooltip">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2">Sin registros.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="float-left">
                                        {{--{!! $users->total() !!} {{ trans_choice('user.index.table.total', $users->total()) }}--}}
                                    </div>
                                </div>
                                <!--col-->

                                <div class="col-5">
                                    <div class="float-right">
                                        {{--{!! $users->render() !!}--}}
                                    </div>
                                </div>
                                <!--col-->
                            </div>
                            <!--row-->
                        </div>
                </div>
            </div>
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
