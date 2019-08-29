<div class="courses1-area">
            <div class="container">
                <h2 class="title-default-left">Latest News</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    @foreach($news as $news1)
					@php
					$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
					$date =  $date->format('M d,Y, h:m a');
					@endphp
					<div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img style="position: relative;width: 300px;height: 200px;" src="@if($news1->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/news/')}}/{{$news1->image}} @endif" alt="courses">
                                <a href="{{ route('news.details', $news1->id) }}"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 style="font-size: 18px;" class="item-title"><a href="{{ route('news.details', $news1->id) }}">{{$news1->title}}</a></h3>
								<div style="font-size: 13px;margin: 5px 0;font-weight: 500;color: #000000;">{{$date}}</div>
                                <p class="item-content">{{ str_limit(strip_tags($news1->content), 80) }}</p>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
		