@extends('layouts.master_home')

@section('home_content')


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


@endsection