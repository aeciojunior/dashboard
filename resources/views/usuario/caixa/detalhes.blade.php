@extends('tamplate.main')
@section('ativo-caixa', 'active')
@section('titulo', 'Caixa - detalhes')
@section('caminho', 'Menu')
@section('atual-page', 'Caixa - detalhes')
@push('sidbar')
    @include('usuario.partial.sidbar')
@endpush
@push('navbar')
    @include('usuario.partial.navbar')
@endpush
@section('conteudo')
    <div class="container-fluid py-4" style="bottom: 100px;">

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Caixa (valor bruto)</p>
                                    <h5 class="font-weight-bolder" id="user-caixa-info">
                                        <div class="spinner-border tetx-white" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </h5>
                                    {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                    since yesterday
                  </p> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Em Caixa</p>
                                    <h5 class="font-weight-bolder" id="user-caixa-info-atual">
                                        <div class="spinner-border tetx-white" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </h5>
                                    {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                    since yesterday
                  </p> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 100px;">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Detalhes</h6>
                </div>
            </div>

            <div class="col-md-8 pb-0 p-3">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        Codigo : {{$caixa->codigo}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Codigo  Venda:  {{$caixa->codigo_venda}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Codigo caixa : {{$caixa->codcaixa}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Codigo operador :  {{$caixa->codoperador}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                         Emissão : {{date('d/m/Y h:i:s', strtotime($caixa->data))}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                         Saida : R$ {{number_format($caixa->saida, 2, ',', '.')}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Entrada : R$ {{number_format($caixa->entrada, 2, ',', '.')}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                         Historico : {{ strtolower($caixa->historico)}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                       Movimentação : {{$caixa->movimento}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      Valor :  R$ {{number_format($caixa->valor, 2, ',', '.')}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      Codgio NF saida : {{strtolower($caixa->codnfsaida)}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      Posto : {{$caixa->posto}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      Hora : {{date('d/m/Y h:i:s', strtotime($caixa->hora))}}
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-5 pb-0 p-3 me-2">
                <div class="form-group">
                    <a href="{{ route('user-lista-caixa') }}" class="btn btn-warning  active">
                        Voltar</a>
                </div>
            </div>
        </div>
        @include('tamplate.footer')
    </div>
@endsection
