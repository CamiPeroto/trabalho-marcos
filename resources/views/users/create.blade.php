@extends('layout.index')

@section('content')
    <section class="p-5">
        <div class="card border-light shadow p-4">
            <div class="row mb-5">
                <div class="position-relative d-flex justify-content-center align-items-center">
                    <a href="{{ url('/') }}" class="position-absolute text-decoration-none start-0 ms-3">
                        <i class="fi fi-rr-arrow-left fs-4 btn-icon"></i>
                    </a>
                    <h1 class="text-center">Criar Aluno</h1>
                </div>
                <x-alert />
            </div>
            <form name="" id="" method="post" action="{{ route('user.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex">
                            <p class="margin-show">Nome:</p>
                            <p class="text-danger ms-1">*</p>
                        </div>
                        <input class="form-control form-control-bg" type="text" name="name" id="name"
                            value="{{ old('name') }}" placeholder="Nome" required>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex">
                            <p class="margin-show">RA:</p>
                            <p class="text-danger ms-1">*</p>
                        </div>
                        <input class="form-control form-control-bg" type="text" name="ra" id="ra"
                            value="{{ old('ra') }}" placeholder="00000000-0" required maxlength="10">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="d-flex">
                            <p class="margin-show">E-mail:</p>
                            <p class="text-danger ms-1">*</p>
                        </div>
                        <input class="form-control form-control-bg" type="email" name="email" id="email"
                            value="{{ old('email') }}" placeholder="E-mail" required>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="margin-show">Curso:</p>
                        <select class="form-control form-control-bg form-select cursor-pointer" name="course_id" required>
                            <option value="">Selecione um curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('course_id', isset($user) ? $user->course_id : null) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button class="btn ms-2 text-decoration-none" type="submit">
                        <i class="fi fi-rr-disk icon-style btn-icon-bg fs-5"></i>
                    </button>
                </div>
            </form>
        </div>

    </section>
@endsection
