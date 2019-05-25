

 <div class="slider_container fadeInLeft animated">
	<div class="flexslider">
      <ul class="slides">

      @forelse($banner as $bn)
        <li>
          <img src="{{url($bn->image)}}" alt="" title=""/>
          <div class="flex-caption">
              @if(!empty($bn->title) && !empty($bn->description))
               <div class="caption_title_line"><h2>{{$bn->title}}</h2><p>{{$bn->description}}</p></div>
               @endif
          </div>
        </li>
      @empty
         
        <li>
          <img src="{{url('image/slider/93_2610_03.jpg')}}" alt="" title=""/>
          <div class="flex-caption">
               <div class="caption_title_line">
                  <h2>How to buy it</h2>
                  <p>It's make you happier. Change your life. Make life easier</p>
                </div>
          </div>
        </li>
      @endforelse
    	
    </ul>

  </div>
</div> 
