
<link rel="stylesheet" type="text/css" href="/css/slider/demo.css" media="all" />
<link rel="stylesheet" type="text/css" href="/css/slider/style.css" media="all" />
<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<!-- FlexSlider -->
<script type="text/javascript" src="/js/slider/jquery.flexslider-min.js"></script>
<script type="text/javascript" charset="utf-8">
var $ = jQuery.noConflict();
$(window).load(function() {
$('.flexslider').flexslider({
      animation: "fade"
});

$(function() {
	$('.show_menu').click(function(){
			$('.menu').fadeIn();
			$('.show_menu').fadeOut();
			$('.hide_menu').fadeIn();
	});
	$('.hide_menu').click(function(){
			$('.menu').fadeOut();
			$('.show_menu').fadeIn();
			$('.hide_menu').fadeOut();
	});
});
});
</script>



 <div class="slider_container">
	<div class="flexslider">
      <ul class="slides">
      @foreach ($banner as $bn)
      	<li>
      		<img src="{{url($bn->image)}}" alt="" title=""/>
      		<div class="flex-caption">
                   <div class="caption_title_line"><h2>{{$bn->title}}</h2><p>{{$bn->description}}</p></div>
              </div>
      	</li>
      @endforeach
    	
    </ul>
  </div>
</div> 
