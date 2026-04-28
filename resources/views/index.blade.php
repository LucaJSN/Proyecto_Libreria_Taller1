@extends('layouts.app')

@section('content')
<h1 class="titulo principal">Punto Y Barra | Librería</h1>
<div id="index">
  <h2 class="titulo secundario">Nuestros Productos</h2>
  <div class=seccion_productos>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/articulos-escolares.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/articulos-libros.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/articulos-oficina.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </div>
  <h2 class="titulo secundario">Quienes Somos?</h2>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          ¿Quienes Somos?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong> Punto y Barra</strong> es una de las librerías más grande de Corrientes, destinada a otorgar los mejores materiales para que puedas explotarlo académica y artísitcamente
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Nuestra Mision</button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Facilitar el acceso universal al conocimiento y a la imaginación a través de una selección diversa de títulos, apoyando el crecimiento intelectual de nuestros clientes mediante un servicio experto y personalizado
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Nuestra Vision
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Ser la plataforma líder en difusión educativa más grande del país, dando los materiales para que las mentes creativas puedan expresarse y conectar tanto con sus estudios como con sus talentos
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <section class="carrusel-de-productos">
    <h2>Nuestros Productos</h2>
    <div id="carouselExampleFade" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active" id="carrusel-productos">
          <div class="row" id="fila-carrusel">
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/Libro-normal.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Libro Normal</h5>
              </div>
            </div>
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/marcadores.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Marcadores</h5>
              </div>
            </div>
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/birome.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Birome</h5>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item" id="carrusel-productos">
          <div class="row" id="fila-carrusel">
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/Cartuchera.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Cartuchera</h5>
              </div>
            </div>
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/cuadernito.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Libro de bocetos</h5>
              </div>
            </div>
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/mochila.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Mochila</h5>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item " id="carrusel-productos">
          <div class="row" id="fila-carrusel">
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/sacapuntas.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Sacapuntas</h5>
              </div>
            </div>
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/cuadernos-bocetos.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Cuadernos</h5>
              </div>
            </div>
            <div class="card col-mb-4" id="tarjetas-carrusel" style="width: 20rem;">
              <img src="img/Resaltadores.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-text">Resaltadores</h5>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
</section>
<section class="seccion-comercializacion">
  <h2 class="mb-5">Métodos de Pago</h2>
        <ul class="lista-pagos">
            <li class="metodo-pago">
                <h3>Paga con Mercado Pago</h3>
                <img src="{{ asset('img/metodo-de-pago.png') }}" alt="Mercado Pago" class="img-formato-unico">
            </li>
            <li class="metodo-pago">
                <h3>Paga con Tarjeta</h3>
                <img src="{{ asset('img/pago.png') }}" alt="Pago con tarjeta" class="img-formato-unico">
            </li>
        </ul>
</section>
</div>
@endsection