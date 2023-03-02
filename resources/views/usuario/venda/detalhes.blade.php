@extends('tamplate.main')
@section('ativo-vendas', 'active')
@section('titulo', 'Venda - detalhes')
@section('caminho', 'Menu')
@section('atual-page', 'Venda - detalhes')
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
                            Codigo : {{ $venda->codigo }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Codigo cliente: {{ $venda->codcliente }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            Codigo caixa : {{ $venda->codcaixa }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            Codigo vendedor : {{ $venda->codvendedor }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Codigo filial : {{ $venda->codfilial }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Numero : {{ strtolower($venda->numero) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Modelo : {{ $venda->modelo_nf }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Cfop : {{ $venda->cfop }}
                        </div>
                    </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        Especie : {{ $venda->especie }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Itens : {{ $venda->itens }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Data de saida : {{ date('d/m/Y h:i:s', strtotime($venda->data_saida)) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Emissão : {{ date('d/m/Y h:i:s', strtotime($venda->data)) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        Sub total : R$ {{ number_format($venda->valor_produtos, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Desconto : R$ {{ number_format($venda->desconto, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Total da nota : R$ {{ number_format($venda->total_nota, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Valor recebido : R$ {{ number_format($venda->valor_recebido, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Valor troco : R$ {{ number_format($venda->troco, 2, ',', '.') }}
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        Meio dinherio : R$ {{ number_format($venda->meio_dinheiro, 2, ',', '.') }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        Meio cartão de caredito : R$ {{ number_format($venda->meio_cartaocred, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Meio cartão de debito : R$ {{ number_format($venda->meio_cartaodeb, 2, ',', '.') }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        Meio cartão cheque a vista : R$ {{ number_format($venda->meio_chequeav, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Meio cheque a prazo : R$ {{ number_format($venda->meio_chequeap, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Meio pix : R$ {{ number_format($venda->meio_outros, 2, ',', '.') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        Meio crediario : R$ {{ number_format($venda->meio_crediario, 2, ',', '.') }}
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-5 pb-0 p-3 me-2">
                <div class="form-group">
                    <a href="{{ route('user-lista-vendas') }}" class="btn btn-warning  active">
                        Voltar</a>
                </div>
            </div>
        </div>
        @include('tamplate.footer')
    </div>

@endsection
