@extends('tamplate.main')
@section('ativo-caixa', 'active')
@section('titulo', 'Caixa')
@section('caminho', 'Menu')
@section('atual-page', 'Caixa')
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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Caixa</p>
                                    <h5 class="font-weight-bolder">
                                        0,00
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
        <div class="card" style="margin-top: 200px;">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Caixa</h6>
                </div>
            </div>
            <div class="table-responsive" >
                <table class="table align-items-center mb-0" style="overflow: auto;">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Codigo</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Codigo
                                caixa
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Codigo operador</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Data</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Saida</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Entrada</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Codigo nota</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Historico</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($caixa as $item)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('/img/img-default.png') }}" class="avatar avatar-sm me-3">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">Codigo</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $item->codigo }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Codigo
                                        caixa</p>
                                    <p class="text-xs text-secondary mb-0">{{ $item->codcaixa }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Codigo operador</p>
                                    <p class="text-xs text-secondary mb-0">{{ $item->codoperador }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Data</p>
                                    <p class="text-xs text-secondary mb-0">{{ date('d/m/Y h:i:s',strtotime($item->data)); }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Saida</p>
                                    <p class="text-xs text-secondary mb-0">R$
                                        {{ number_format($item->saida, 2, ',', '.') }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Entrada</p>
                                    <p class="text-xs text-secondary mb-0">R$
                                        {{ number_format($item->entrada, 2, ',', '.') }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Codigo conta</p>
                                    <p class="text-xs text-secondary mb-0">
                                        {{ $item->codconta  }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Historico</p>
                                    <p class="text-xs text-secondary mb-0">
                                        {{ $item->historico  }}</p>
                                </td>
                                {{-- <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td> --}}
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Edit user">
                                        Detalhes
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex me-2 justify-content-center mt-5">
                {!! $caixa->links() !!}
            </div>
        </div>
        @include('tamplate.footer')
    </div>

@endsection
