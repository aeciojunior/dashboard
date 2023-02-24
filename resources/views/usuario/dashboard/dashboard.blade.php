@extends('tamplate.main')

@section('titulo', 'Dahsboard')
@section('ativo-dashboard', 'active')
@section('caminho', 'Menu')
@section('atual-page', 'Dahsboard')
@push('sidbar')
    @include('usuario.partial.sidbar')
@endpush
@push('navbar')
    @include('usuario.partial.navbar')
@endpush

@section('conteudo')

    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('user-lista-estoque') }}">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Estoque</p>
                                        <h5 class="font-weight-bolder" id="user-estoque-info">
                                            <div class="spinner-border" role="status">
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
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Vendas</p>
                                    <h5 class="font-weight-bolder" id="user-venda-info">
                                        {{-- R$ {{ number_format($venda, 2, ',', '.') }} --}}
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </h5>
                                    {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                  </p> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Quantidade de vendas por mês (Ano {{ date('Y') }})</h6>
                        {{-- <p class="text-sm mb-0">
              <i class="fa fa-arrow-up text-success"></i>
              <span class="font-weight-bold">4% more</span> in 2021
            </p> --}}
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line-vendas-qtd" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Valor de vendas por mês (Ano {{ date('Y') }})</h6>
                        {{-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> --}}
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line-vendas-valor" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-lg-8 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Vendas do dia</h6>
                        </div>
                    </div>
                   
                    @if (count($vendas_diaria) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    @foreach($vendas_diaria as $item)
                                    <tr>
                                        <td class="w-20">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                {{-- <div>
                        <img src="../assets/img/icons/flags/US.png" alt="Country flag">
                      </div> --}}
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Codigo</p>
                                                    <h6 class="text-sm mb-0 text-center">{{ $item->codigo}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Emissão</p>
                                                <h6 class="text-sm mb-0"> {{ date('d/m/Y h:i:s', strtotime($item->data)) }}</h6>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Cliente</p>
                                                <h6 class="text-sm mb-0">Consumidor final</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Valor</p>
                                                <h6 class="text-sm mb-0">R$  {{ number_format($item->total, 2, ',', '.') }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Desconto</p>
                                                <h6 class="text-sm mb-0">R$  {{ number_format($item->desconto, 2, ',', '.') }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Total</p>
                                                <h6 class="text-sm mb-0">R$  {{ number_format($item->total, 2, ',', '.') }}</h6>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p style="margin-top:100px;" class="text-center justfy-content-center">Não existem regitros para
                            serem exbidos!
                        </p>
                    @endif
                </div>
            </div>
            {{-- card com as formas de pagamento --}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Formas de Pagamento (Diário)</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-credit-card text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Cartão de credito</h6>
                                        {{-- <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span> --}}
                                        <span class="font-weight-bold">R$ {{ number_format($forma_pagamento[0]->meio_cartaocred, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-credit-card text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Cartão de debito</h6>
                                        {{-- <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span> --}}
                                        <span class="font-weight-bold">R$ {{ number_format($forma_pagamento[0]->meio_cartaodeb, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-money-coins text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Dinheiro</h6>
                                        {{-- <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span> --}}
                                        <span class="font-weight-bold">R$ {{ number_format($forma_pagamento[0]->meio_dinheiro, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-money-coins text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Pix</h6>
                                        {{-- <span class="text-xs font-weight-bold">+ 430</span> --}}
                                        <span class="font-weight-bold">R$ {{ number_format($forma_pagamento[0]->meio_outros, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-money-coins text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Cheque a vista</h6>
                                        {{-- <span class="text-xs font-weight-bold">+ 430</span> --}}
                                        <span class="font-weight-bold">R$ {{ number_format($forma_pagamento[0]->meio_chequeav, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> --}}
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-calendar-grid-58 text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Crediario</h6>
                                        {{-- <span class="text-xs font-weight-bold">+ 430</span> --}}
                                        <span class="font-weight-bold">R$ {{ number_format($forma_pagamento[0]->meio_crediario, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('tamplate.footer')
    </div>
@endsection
@push('javascript')
    <script src="{{ asset('js/grafico/grafico.js') }}"></script>
    <script>
        graficoLinha("chart-line-vendas-qtd", <?php echo $meses; ?>, 'Vendas');
        graficoLinha("chart-line-vendas-valor", <?php echo $valor; ?>, 'Vendas', 'R$')
    </script>
@endpush
