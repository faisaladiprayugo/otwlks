@include('includes.user.header')

@include('includes.user.navbar')

<!-- /////////////////////////////////
// HOME
//////////////////////////////// -->

<div class="mt-75">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item relative active">
      <div class="hero-image">
        <div class="hero-text col-md-8">
          <div class="ff-poppins">
            <p class="subtitle-home">The Best University Of The State</p>
            <p class="title-home">Kingster University</p>
            <button class="btn btn-title-home">Lets Get Started</button>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="carousel-item">
      <img class="d-block w-100" src="/assets/img/user/slider-2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/assets/img/user/slider-3.jpg" alt="Third slide">
    </div> -->
  </div>
</div>
</div>



<!-- //////////////////////////////
// Customer
///////////////////////////// -->

<!-- <div id="customer" class="container customer">
  <div class="row text-center">
    <div class="col-md-3">
      <span class="fa fa-school"></span>
      <p class="customer-title">University Life</p>
      <p class="customer-subtitle">Overall in here</p>
    </div>
    <div class="col-md-3">
      <span class="fa fa-school"></span>
      <p class="customer-title">University Life</p>
      <p class="customer-subtitle">Overall in here</p>
    </div>
    <div class="col-md-3">
      <span class="fa fa-school"></span>
      <p class="customer-title">University Life</p>
      <p class="customer-subtitle">Overall in here</p>
    </div>
    <div class="col-md-3">
      <span class="fa fa-school"></span>
      <p class="customer-title">University Life</p>
      <p class="customer-subtitle">Overall in here</p>
    </div>
  </div>
</div> -->







<!-- ////////////////////////////
// Head Master
/////////////////////////// -->

<div id="headmaster" class="container about pb-50 pt-50">
  <div class="row">
    <div class="col-md-6">
      <img src="/uploads/headmaster/{{$headmaster->foto}}" class="w-100">
    </div>
    <div class="col-md-6 mt-2">
      <h1 style="font-weight: bold;">{{$headmaster->judul}}</h1>
      <h4 class="color-green">{{$headmaster->sub_judul}}</h4>
      <p class="mt-20">{{$headmaster->deskripsi}}</p>
      <button class="btn btn-about" href="#!">Apply Now</button>
    </div>
  </div>
</div>






<!-- ////////////////////////
// ABOUT 2
//////////////////////// -->

<div id="about-2" class="about-2">
  <div class="row m-20 p-20">
    <div class="col-md-4">
      <h2 class="color-green" style="font-weight: bold;">{{$about->judul}}</h2>
      <h5 class="white" style="font-weight: bold;">{{$about->sub_judul}}</h5>
    </div>
    <div class="col-md-8">
      @foreach($d_about as $da)
      <p style="font-size: 20px;" class="mb-20">{{$da->deskripsi}}</p>
      @endforeach
      <button class="btn btn-about">Apply Now</button>
    </div>
  </div>
</div>




<!-- //////////////////////////
// NEWS 
////////////////////////// -->

<div id="news" class="container news">
  <div class="row">
    <div class="col">
      <h3 class="color-dark-blue bold">News & Updates</h3>
      <p class="color-green">Read All News</p>
    </div>
  </div>
  <div class="row mt-20">
    <div class="col-md-6">
      <img src="/uploads/news/{{$news[0]->foto}}" class="w-100">
      <p class="news-date mt-20">{{$news[0]->tanggal}}<a> / </a>{{$news[0]->kategori}}</p>
      <p class="title-news">{{$news[0]->judul}}</p>
      <button class="btn btn-about mt-20 mb-20" href="#!">Apply Now</button>
    </div>
    <div class="col-md-6">
      @for($i = 1; $i < count($news); $i++)
      <div class="row mb-20">
        <div class="col-4">
          <img src="/uploads/news/{{$news[$i]->foto}}" class="w-100">
        </div>
        <div class="col">
          <p class="news-date2">{{$news[$i]->tanggal}}<a> / </a>{{$news[$i]->kategori}}</p>
          <p class="title-news2">{{$news[$i]->judul}}</p>
        </div>
      </div>
      @endfor
      </div>
    </div>
  </div>
</div>







<!-- ///////////////////////////////
// UPCOMING EVENTS
/////////////////////////////// -->

<div id="events" class="events">
  <div class="row m-20 p-20">
    <div class="col-md-4">
      <h2 class="color-green" style="font-weight: bold;">Upcoming Events</h2>
      <p>See all upcoming events now!</p>
    </div>
    <div class="col-md-4">
      @foreach($events as $key => $e)
      <div class="row mb-20">
        <div class="col-3 text-center">
          <p class="date-event">{{$day[$key]}}</p>
          <p class="month-event">{{$month[$key]}}</p>
        </div>
        <div class="col">
          <p class="bold mt-10">{{$e->judul}}</p>
          <p class="color-green">
            <span class="fa fa-clock">{{$e->jam}}</span>
            <span class="fa fa-clock">{{$e->tempat}}</span>
          </p>
        </div>
      </div>
      @if($key == 1)
      </div>
      <div class="col-md-4">
      @endif
      @endforeach
    </div>
  </div>
</div>


@include('includes.user.footer')