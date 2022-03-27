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


        <h2 class="my-3 display-6">Resumen | <span class="text-info fw-bold"> Accesos Directos</span></h2>

        <section class="d-flex justify-content-around row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total del</h3>
                        <h3 class="text-primary fw-bold">Padrón</h3>
                        <h3 class="card-text display-3 text-primary cardData">3145</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total del</h3>
                        <h3 class="text-info fw-bold">Llamados</h3>
                        <h3 class="card-text display-3 text-info cardData">1389</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total</h3>
                        <h3 class="text-success fw-bold">a Favor</h3>
                        <h3 class="card-text display-3 text-success cardData">951</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center shadow-sm my-1 mx-1 ">
                    <div class="p-3">
                        <h3 class="fw-bold">Total</h3>
                        <h3 class="text-danger fw-bold">en Contra</h3>
                        <h3 class="card-text display-3 text-danger cardData">420</h3>
                    </div>
                </div>
            </div>
        </section>

        <div class="row row-cols-1 row-cols-md-4 g-4 my-3">
            <div class="col">
                <div class="card h-100 text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Secondary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Success card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Danger card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="my-3 display-6">Tabla de <span class="text-info fw-bold">Egresados</span></h2>

        <form class="d-flex my-3">
            <input class="form-control form-control-lg" type="text" value="Buscar por Nombre o Apellido"
                aria-label="readonly input example" readonly>
            <button class="btn btn-outline-secondary btn-lg" type="submit">Buscar</button>
        </form>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Llamado</th>
                    <th scope="col">Intencion de Voto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><button type="button" class="btn btn-primary">
                            <i class="bi bi-telephone-plus"></i>
                        </button></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-primary" type="button">Button</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Pepe</td>
                    <td><button type="button" class="btn btn-primary">
                            <i class="bi bi-telephone-plus"></i>
                        </button></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-primary" type="button">Button</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td><button type="button" class="btn btn-primary">
                            <i class="bi bi-telephone-plus"></i>
                        </button></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-primary" type="button">Button</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


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
    <footer>
        <div class="bg bg-primary mt-5 py-5">
            soy un footer
        </div>
    </footer>
@endsection
