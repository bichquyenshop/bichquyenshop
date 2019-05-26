
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
 
  <ol class="carousel-indicators">
  @if(empty($banner))
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
      
    </li>
  @else
    @foreach( $banner as $bn )
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @endforeach
  @endif
   
  </ol>
 
  <div class="carousel-inner" role="listbox">
    @forelse( $banner as $bn )
       <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
           <img style="width:100%" class="d-block img-fluid" src="{{url($bn->image) }}" alt="{{ $bn->title }}">
              <div class="carousel-caption d-none d-md-block">
                 <h3>{{$bn->title}}</h3>
                 <p>{{$bn->description}}</p>
              </div>
       </div>
    @empty
      <div class="carousel-item active">
           <img style="width:100%" src="{{url('image/slider/93_2610_03.jpg')}}" alt="" title=""/>
              <div class="carousel-caption d-none d-md-block">
                 <h3>....</h3>
                 <p>.....</p>
              </div>
       </div>
    @endforelse
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>