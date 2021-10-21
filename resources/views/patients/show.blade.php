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
                            <div class="card-header">
                            <h4 class="card-title form-inline">HISTORIAS
                                <div class="card-header pull-left" id="ret">
                                &nbsp;&nbsp;&nbsp;<a class="btn btn-warning " href="{{route('patient.index')}}">Regresar</a>
                                </div>
                            </div>


                                {{ Form::open(['route' => 'histo.index', 'method' => 'GET', 'class' => 'form-inline','id'=>'histo']) }}

                                <div class="form-group" id="busc">
                                    {{ Form::text('buscar', null, ['class' => 'form-control pull-right','wire:model' => 'search', 'placeholder' => 'Buscar informacion']) }}
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <span class="material-icons">search</span>
                                    </button>
                                </div>
                                {{ Form::close() }}
                            </h4>

                            <p class="card-category">Lista de historias clinicas</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-items-center" id="">
                                    <thead class="text-primary thead-dark">
                                        <th scope="col">ID</th>
                                        <th scope="col">Paciente</th>
                                        <th scope="col">Historia</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">P. Salud</th>
                                        <th scope="col">Fecha Prestación de Servicio</th>
                                        <th class="text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($detalle as $detalle)
                                        @foreach ($Patient as $name=>$pat )
                                        @if ($detalle->idPatient == $pat->id)
                                        <tr>
                                            <td>{{ $detalle->id }}</td>
                                            <td>{{ $detalle->idPatient}}</td>
                                            <td><img id="imgH" src="/uploads/{{ $detalle->history }}"></td>
                                            <td>{{ $detalle->date}}</td>
                                            <td>{{ $detalle->idProfessional}}</td>
                                            <td>{{ $detalle->created_at}}</td>
                                            <td class="td-actions text-right">
                                                <form action="{{route('histo.destroy',$detalle->id)}}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-round btn-danger" type="submit" rel="tooltip">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
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
