@extends('layout.index')

@section('content')
    <section class="p-5">
        <div class="card border-light shadow p-4">
            <div class="row mb-5">
                <div class="position-relative d-flex justify-content-center align-items-center">
                    <a href="{{ url('/') }}" class="position-absolute text-decoration-none start-0 ms-3">
                        <i class="fi fi-rr-arrow-left fs-4 btn-icon"></i>
                    </a>
                    <h1 class="text-center">Mostrar</h1>
                </div>
                <x-alert />
            </div>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <p class="margin-show">Nome do Curso:</p>
                    <label class="text-secondary ms-2">{{ $course->name }}</label>
                </div>
                     
                <div class="col-lg-12 mt-3">
                    <p class="margin-show">Cadastrado:</p>
                    <label class="text-secondary ms-2"> {{ \Carbon\Carbon::parse($course->created_at)
                    ->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</label> 
                </div>
                <div class="col-lg-12 mt-3">
                    <p class="margin-show">Editado:</p>
                    <label class="text-secondary ms-2"> {{ \Carbon\Carbon::parse($course->edited_at)
                    ->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</label> 
                </div>
                

                

            </div>
        </div>

    </section>
@endsection
