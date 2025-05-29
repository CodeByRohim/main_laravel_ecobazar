{{-- @extends('layouts.FrontendLayout')
@section('title', 'Testing Category')
@section('testingCategory')
 <!-- Menu Section -->
 <section id="menu" class="menu section mb-5 mt-5">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="text-center">Our Menu</h2>
    <p  class="text-center"><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
  </div><!-- End Section Title -->

  <div class="container">
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
      @foreach ($categories as $index => $category)
    <li class="nav-item text-danger" role="presentation">
      <a class="nav-link {{$index == 0 ? 'active show' : ''  }} " data-bs-toggle="tab" data-bs-target="#menu-{{ 'category' . '-' . $category->id }}">
        <h4>{{$category->title }} </h4>
      </a>
    </li><!-- End tab nav item -->
    @endforeach
    </ul>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

      
      @foreach ($categories as $index => $category)
     
   <div class="tab-pane fade {{ $index == 0 ? 'active show' : ''}}" id="menu-category-{{$category->id}}">

<div class="tab-header text-center">
  <p>Menu</p>
  <h3>{{$category->title }}</h3>
  </div>

<div class="row gy-5">
      @foreach ($products as $menu)
        @if($menu->category_id == $category->id)
        <div class="col-lg-4 menu-item">
        <a href="{{ asset('storage/' . $menu->image) }}" class="glightbox"><img width="300px" src="{{ asset('storage/' . $menu->image) }}" class="menu-img img-fluid" alt=""></a>
        <h4>{{$menu->name}} </h4>
        <p class="ingredients">
        {{ $menu->discount }}
        </p>
        <p class="price">$
        {{ $menu->price }}
        </p>
      </div><!-- Menu Item -->
        
        @endif
        @endforeach
     
      </div>
      </div><!-- End Starter Menu Content -->
    @endforeach
    </div>
  </div>
</section><!-- /Menu Section -->
@endsection --}}