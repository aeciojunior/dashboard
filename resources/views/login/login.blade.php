@extends('tamplate.main')
@section('titulo', 'Login')
@section('conteudo')
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Login</h4>
                                <p class="mb-0">Entre com sua senha e CNPJ ou CPF</p>
                            </div>
                            <div class="card-body">
                                <form role="form" action="{{ route('login-post') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg" name="cnpj"
                                            id="documento" placeholder="CNPJ ou CPF" aria-label="text">
                                        @error('cnpj')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg" placeholder="Senha" aria-label="Password">
                                            @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Manter logado</label>
                                        <div style="margin-left: 56px;">
                                            <input class="form-check-input" type="checkbox" onclick="checado(this);"
                                                id="senhaShow">
                                            <label class="form-check-label" for="senhaShow">Exibir Senha</label>
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                                            id="submit-form" onclick="submit(this);">Entrar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Problema ao logar?
                                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Contate o
                                        suporte</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative  h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url('{{ asset('img/img-login.jpeg') }}');
        background-size: cover;">
                            {{-- <span class="mask  opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Orbita tecnologia"</h4>
                            <p class="text-white position-relative">Seu estoque online a onde estiver.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
