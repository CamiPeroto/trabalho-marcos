    @extends('layout.index')

    @section('content')
        <section class="p-5">
            <div class="col-lg-12 mb-3">
                <x-alert />
                <div class="d-flex justify-content-end">
                    <a class="ms-2 text-decoration-none" href="{{ route('course.create') }}">
                        <i class="fi fi-rr-plus-small icon-style btn-icon-bg"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive rounded overflow-hidden shadow">
                <table class="table border-light mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="padding-card">ID</th>
                            <th class="padding-card">Nome</th>
                            <th class="padding-card">Cadastrado em</th>
                            <th class="padding-card text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <td class="padding-table">
                                    <p class="mt-3">{{ $course->id }}</p>
                                </td>
                                <td class="padding-table">
                                    <p class="mt-3">{{ $course->name }}</p>
                                </td>
                                <td class="padding-table">
                                    <p class="mt-3">{{\Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s')}}</p>
                                </td>



                                <td class="padding-table">
                                    <div class="mt-3 d-flex justify-content-end">
                                        <a class="text-decoration-none open-modal"
                                            href="{{ route('course.show', ['course' => $course->id]) }}">
                                            <i class="fi fi-rr-eye btn-icon"></i>
                                        </a>
                                        <a class="ms-3 text-decoration-none"
                                            href="{{ route('course.edit', ['course' => $course->id]) }}">
                                            <i class="fi fi-rr-file-edit btn-icon"></i>
                                        </a>
                                        <a class="ms-2 text-decoration-none text-danger delete-btn" href="#"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            data-id="{{ $course->id }}">
                                            <i class="fi fi-rr-trash btn-icon"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">Nenhum curso encontrado!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir este item?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let deleteButtons = document.querySelectorAll(".delete-btn");
                let deleteForm = document.getElementById("deleteForm");

                deleteButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        let id = this.getAttribute("data-id");
                        deleteForm.action = `/destroy-course/${id}`; // rota pra deletar
                    });
                });
            });
        </script>
    @endsection
