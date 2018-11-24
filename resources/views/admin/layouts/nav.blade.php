  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles.css') }}" media="all" />

<div class="container">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       @foreach($banners as $banner)
      <li data-target="#myCarousel" data-slide-to="1"></li>
      @endforeach
    </ol>

    <!-- Wrapper for slides -->
    @if(count($banners)>0)
   
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{URL::to('/')}}/public/uploads/thumbs/{{ $banners[0]->file }}" alt="Los Angeles" style="width:100%; height: 550px"/>
                <div class="flex-caption" style="background-color: #000;color: #fff;width: 100%;text-align: center;opacity: .5">
                     <div class="caption_title_line col-md-12" style="width: 100%"><h2 class="col-md-12" style="width: 100%;text-align: center;color: #ef2213">{{ $banners[0]->title }}</h2>
                      <p style="color: #fff">{{strip_tags( $banners[0]->description )}}</p>
                    </div>
                </div>
                <br>
      </div>
       
      @foreach($banners as $banner)
      <div class="item ">
        <img src="{{URL::to('/')}}/public/uploads/thumbs/{{ $banner->file }}" alt="Los Angeles" style="width:100%; height: 550px"/>
                <div class="flex-caption" style="background-color: #000;color: #fff;width: 100%;text-align: center;opacity: .5">
                     <div class="caption_title_line col-md-12" style="width: 100%"><h2 class="col-md-12" style="width: 100%;text-align: center;color: #ef2213">{{ $banner->title }}</h2>
                      <p style="color: #fff">{{strip_tags( $banner->description )}}</p>
                    </div>
                </div>
                <br>
      </div>
      @endforeach
    </div>
    @endif
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>