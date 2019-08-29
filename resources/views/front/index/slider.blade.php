
        <div class="slider1-area overlay-default">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-3" class="slides">
				@foreach($sliders as $count => $slider)
                    <img src="{{asset('assets/img/slider/')}}/{{$slider->image}}" alt="slider" title="#slider-direction-{{$count+1}}" />
					@endforeach
                </div>
				@foreach($sliders as $count => $slider)
                <div id="slider-direction-{{$count+1}}" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="title-container s-tb-c">
                            <div class="title1">{{$slider->title}}</div>
                            <p>{{$slider->description}}</p>
                        </div>
                    </div>
                </div>
				@endforeach
            </div>
        </div>
		