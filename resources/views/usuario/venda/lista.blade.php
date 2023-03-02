@extends('tamplate.main')
@section('ativo-vendas', 'active')
@section('titulo', 'Venda')
@section('caminho', 'Menu')
@section('atual-page', 'Venda')
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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Venda</p>
                                    <h5 class="font-weight-bolder" id="user-venda-info">
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
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (count($venda) > 0)
            <form method="get" action="{{ route('user-busca-venda') }}">
                <div class="card" style="margin-top: 100px;">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Buscar venda</h6>
                        </div>
                    </div>

                    <div class="col-md-5 pb-0 p-3">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    Inicio
                                    <input class="form-control form-control-alternative" type="date" name="data_inicio"
                                        value="{{ request()->input('data_inicio') ?? old('data_inicio') }}" id="example-date-input">
                                    @error('data_inicio')
                                        <div class="error" style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    Fim

                                    <input class="form-control form-control-alternative" type="date" name="data_fim"
                                        value="{{ request()->input('data_fim') ?? old('data_fim') }}" id="example-date-input">
                                    @error('data_fim')
                                        <div class="error " style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-5 pb-0 p-3">

                        <div class="col-md-12">
                            <div class="form-group">
                                Codigo (busca sem intervalo)
                                <input type="text" class="form-control form-control-alternative" name="codigo_venda"
                                    value="{{ request()->input('codigo_venda') }}" id="exampleFormControlInput1"
                                    placeholder="codigos sistema ou caixa ou vendedor ou modelo nf">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 pb-0 p-3 me-2">
                        <div class="form-group">
                            <button class=" btn btn-primary  active">Buscar</button>
                            <a href="{{ route('user-lista-vendas') }}" class="btn btn-warning  active">
                                Atualizar lista</a>
                        </div>
                    </div>

                </div>
            </form>
            <div class="card" style="margin-top: 50px;">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Venda</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" style="overflow: auto;">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Codigo</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Codigo caixa
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Codigo vendedor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Numero</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Emissão
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Modelo nf</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Total</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venda as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('/img/img-default.png') }}"
                                                    class="avatar avatar-sm me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">Codigo</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $item->codigo }}</p>
                                            </div>
                                        </div>
                                    </td>
                                
                                   
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Codigo caixa</p>
                                        <p class="text-xs text-secondary mb-0">{{ $item->codcaixa }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Codigo vendedor</p>
                                        <p class="text-xs text-secondary mb-0">{{ $item->codvendedor }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Numero</p>
                                        <p class="text-xs text-secondary mb-0">{{ $item->numero }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Emissão</p>
                                        <p class="text-xs text-secondary mb-0">
                                            {{ date('d/m/Y h:i:s', strtotime($item->data)) }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Modelo nf</p>
                                        <p class="text-xs text-secondary mb-0">{{ $item->modelo_nf }}</p>
                                    </td>
                                   
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Total</p>
                                        <p class="text-xs text-secondary mb-0">
                                            R$ {{ number_format($item->total_nota, 2, ',', '.') }}</p>
                                    </td>

                                    {{-- <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td> --}}

                                    <td class="align-middle">
                                        <a href="{{route('user-detalhes-venda',$item->id)}}" class="text-secondary font-weight-bold text-xs"
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
                    {{-- {!! $caixa->links() !!} --}}
                    {{ $venda->appends(['data_inicio' => request()->input('data_inicio'), 'data_fim' => request()->input('data_fim')])->links() }}
                </div>
            </div>
        @else
            <p style="margin-top:200px;" class="text-center justfy-content-center">Não existem regitros para serem
                exbidos!
            </p>
        @endif
        @include('tamplate.footer')
    </div>

@endsection
