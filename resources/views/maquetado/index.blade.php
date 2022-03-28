@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="mb-2">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/slider1.jpeg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>


        <h2 class="my-3 display-6">Resumen<span class="text-info fw-bold"> de Datos</span></h2>

        <section class="d-flex justify-content-around row mb-3">
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total del</h3>
                        <h3 class="text-primary fw-bold">Padrón</h3>
                        <h3 class="card-text display-3 text-primary cardData">3145</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total del</h3>
                        <h3 class="text-info fw-bold">Llamados</h3>
                        <h3 class="card-text display-3 text-info cardData">1389</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total</h3>
                        <h3 class="text-success fw-bold">a Favor</h3>
                        <h3 class="card-text display-3 text-success cardData">951</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total</h3>
                        <h3 class="text-danger fw-bold">en Contra</h3>
                        <h3 class="card-text display-3 text-danger cardData">420</h3>
                    </div>
                </div>
            </div>
        </section>

        <h2 class="my-3 display-6">Tabla de <span class="text-info fw-bold">Egresados</span></h2>

        <section class="card shadow-sm mb-3">
            <form class="d-flex px-3 py-4">
                <input class="form-control form-control-lg border border-secondary me-3 text-secondary" type="text"
                    value="Buscar por Nombre, Apellido o DNI" aria-label="readonly input example" readonly>
                <button class="btn btn-primary btn-lg" type="submit">Buscar</button>
            </form>
        </section>



        <section class="card shadow-sm mb-3 py-3">
            <table class="table table-striped table-hover table-responsive">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Llamado</th>
                        <th scope="col">Intencion de Voto</th>
                    </tr>
                </thead>
                <tbody class="text-center align-middle">
                    <tr>
                        <th scope="row">1</th>
                        <td>Apellido 1</td>
                        <td>Nombre 1</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-telephone-plus-fill text-primary iconos px-2"></i>
                            </a>
                        </td>
                        <td>
                            <div>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-hand-thumbs-up-fill text-success iconos px-2"></i>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-hand-thumbs-down-fill text-danger iconos px-2"></i>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-question-circle-fill text-info iconos px-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Apellido 2</td>
                        <td>Nombre 2</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-telephone-plus-fill text-secondary iconos px-2"></i>
                            </a>
                        </td>
                        <td>
                            <div>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-hand-thumbs-up-fill text-secondary iconos px-2"></i>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-hand-thumbs-down-fill text-secondary iconos px-2"></i>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-question-circle-fill text-secondary iconos px-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Apellido 3</td>
                        <td>Nombre 3</td>
                        <td>
                            <a href="" class="text-decoration-none">
                                <i class="bi bi-telephone-plus-fill text-secondary iconos px-2"></i>
                            </a>
                        </td>
                        <td>
                            <div>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-hand-thumbs-up-fill text-secondary iconos px-2"></i>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-hand-thumbs-down-fill text-secondary iconos px-2"></i>
                                </a>
                                <a href="" class="text-decoration-none">
                                    <i class="bi bi-question-circle-fill text-secondary iconos px-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </main>
    <footer class="bg bg-primary mt-5 py-3">
        <p class="text-white text-center">Copyright © Todos los derechos reservados - 2022</p>
    </footer>
@endsection
