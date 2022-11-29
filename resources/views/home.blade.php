@extends('layouts.master_home')
@include('layouts.body.slider')

@section('home_content')

@php

$homeabout = DB::table('home_sobres')->get();
$servicos = DB::table('servicos')->get();
$servico_titulo = DB::table('servico_titulo')->get();

//dd($portfolio);

@endphp

<!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>
        

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $sobre->titulo }}</h2>
            <h3>{{ $sobre->texto_curto }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
            {{ $sobre->texto_longo }}
            </p>
          </div>
        </div>

      </div>
          </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      @foreach($servico_titulo as $st)
        <div class="section-title">
          <h2>{{ $st->titulo }}</strong></h2>
          <p>{{ $st->titulo_descricao }}</p>
        </div>

        <div class="row">
        @endforeach

        @foreach($servicos as $s)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  
                </svg>
                <i class="{{ $s->card_icone }}" ></i>
              </div>
              <h4><a href="">{{ $s->card_titulo}}</a></h4>
              <p>{{ $s->card_descricao }}</p>
            </div>
            @endforeach
          </div>
        

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">


        @foreach ($portfolio as $port)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ $port->imagem }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $port->titulo }}</h4>
              <p>{{ $port->texto }}</p>
              <a href="{{ $port->imagem }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="{{ $port->link }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Marcas</h2>
        </div>

        @foreach($marcas as $m)
        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
           
              <img src="{{ $m->marca_imagem }}" class="img-fluid" alt="">
            </div>
          </div>
        @endforeach
           

        </div>

      </div>
    </section><!-- End Our Clients Section -->

    @endsection