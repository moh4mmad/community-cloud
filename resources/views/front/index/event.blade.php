        <div class="news-event-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow bounceInUp">
                        <h2 class="title-default-left">Video Tour</h2>
                        <div class="video-area2 overlay-video bg-common-style" style="background-image: url('{{asset('assets/img/banner/2.jpg')}}');">
                            <div class="video-content">
                                <a class="play-btn popup-youtube wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" href="{{$front->video_url}}"><i class="fa fa-play" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 event-inner-area">
                        <h2 class="title-default-left">Upcoming Events</h2>
                        <ul class="event-wrapper">
						@foreach($events as $event)
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: bounceInUp;">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
									@php
									$date = \Carbon\Carbon::parse($event->date, 'UTC');
									@endphp
                                        <h3>{{ $date->format('d') }}</h3>
                                        <p>{{ $date->format('M') }}</p>
                                        <span>{{ $date->format('Y') }}</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="{{ route('event.details', $event->id) }}">{{$event->title}}</a></h3>
                                    <p>{{ str_limit(strip_tags($event->content), 200) }}</p>
                                    <ul>
                                        <li>{{$event->start_time}} - {{$event->end_time}}</li>
                                        <li>{{$event->location}}</li>
                                    </ul>
                                </div>
                            </li>
							@endforeach
                        </ul>
                        <div class="event-btn-holder">
                            <a href="{{ route('events') }}" class="view-all-primary-btn">View All</a>
                        </div>
                    </div>
					
					</div>
            </div>
        </div>
