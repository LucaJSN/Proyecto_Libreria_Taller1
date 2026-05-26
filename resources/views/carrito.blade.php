@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4 fw-bold">Mi carrito</h1>

    <div class="row g-4">
    
        <!-- Productos -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 p-4">

                <!-- Producto -->
                <div class="row align-items-center mb-4">

                    <div class="col-md-2 text-center">
                        <img src="https://placehold.co/120x120" class="img-fluid rounded" alt="producto">
                    </div>

                    <div class="col-md-5">
                        <h5 class="fw-semibold mb-2">
                            Nombre del producto
                        </h5>

                        <button class="btn btn-outline-dark btn-sm">
                            Eliminar
                        </button>
                    </div>

                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center border rounded overflow-hidden">

                            <button class="btn btn-light rounded-0 px-3">
                                -
                            </button>

                            <span class="px-4 fw-semibold">
                                1
                            </span>

                            <button class="btn btn-light rounded-0 px-3">
                                +
                            </button>

                        </div>
                    </div>

                    <div class="col-md-2 text-end">
                        <h5 class="fw-bold mb-0">
                            $20.000
                        </h5>
                    </div>

                </div>

                <hr>

                <!-- Duplicar este bloque por producto -->

            </div>

        </div>

        <!-- Resumen -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top">

                <h3 class="fw-bold mb-4">
                    Resumen
                </h3>

                <div class="d-flex justify-content-between mb-3">
                    <span>Productos</span>
                    <span>3</span>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>Subtotal</span>
                    <span>$120.000</span>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <span>Envío</span>
                    <span>Gratis</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Total</h4>
                    <h4 class="fw-bold mb-0">$120.000</h4>
                </div>

                <button class="btn btn-dark w-100 py-3 rounded-3 mb-3">
                    Finalizar compra
                </button>

                <button class="btn btn-outline-dark w-100 py-3 rounded-3">
                    Seguir comprando
                </button>

            </div>

        </div>

    </div>

</div>
@endsection