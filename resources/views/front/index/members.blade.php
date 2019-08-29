<div class="lecturers-area">
            <div class="container">
                <h2 class="title-default-left">Faculty Members</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
				@foreach($members as $member)
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="{{ route('facultymembers.details', $member->id) }}"><img style="position: relative;width: 280px;height: 200px;" src="{{asset('assets/img/members/')}}/{{$member->image}}" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 style="font-size: 16px;" class="item-title"><a href="{{ route('facultymembers.details', $member->id) }}">{{$member->name}}</a></h3>
                                <span class="item-designation">{{$member->position}}</span>
                                <ul class="lecturers-social">
                                    <li><a href="Tel:{{$member->phone}}"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:{{$member->email}}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="{{$member->linkedin_url}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a arget="_blank" href="{{$member->fb_url}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
					@endforeach
				</div>
            </div>
        </div>