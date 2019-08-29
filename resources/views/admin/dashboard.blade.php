@extends('admin.app')
@section('title') Dashboard @endsection

@section('content')
<div class="col-md-3 col-xs-12">
</div>
<div class="col-md-6 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-star"></i>
					<h3>Statistics</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="stats">
						
						<div class="stat">
							<span class="stat-value">{{$news_count}}</span>									
							Total news
						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value">{{$events_count}}</span>									
							Total events
						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value">{{$faculty_count}}</span>									
							Faculty members
						</div> <!-- /stat -->
						
					</div> <!-- /stats -->
					
					
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->	
			
			
	
						
      		
	    </div> <!-- /span6 -->
      	<div class="col-md-3 col-xs-12">
		</div>
 


        <div class="col-md-2 col-xs-12">
		</div>
		
		  <div class="col-md-10 col-xs-12">
			
			
			<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Recent News</h3>
				</div> 
				<div class="widget-content">
					
					<ul class="news-items">
					@if(sizeof($news) == 0)
							<td style="text-align: center;" colspan="4"> No news yet </td>
							@endif
						@foreach($news as $key=>$news1)
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">{{$news1->title}}</a>
								<p class="news-item-preview">{{ str_limit(strip_tags($news1->content), 250) }}</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">{{\Carbon\Carbon::parse($news1->created_at, 'UTC')->format('d')}}</span>
								<span class="news-item-month">{{\Carbon\Carbon::parse($news1->created_at, 'UTC')->format('M')}}</span>
							</div>
						</li>
						@endforeach
					</ul>
					
				</div>
				
			</div>
			
			
			
			<div class="widget widget-nopad stacked">
						
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Recent Events</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<ul class="news-items">
					@if(sizeof($events) == 0)
							<td style="text-align: center;" colspan="4"> No event yet </td>
							@endif
						@foreach($events as $key=>$event)
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title">{{$event->title}}</a>
								<p class="news-item-preview">{{ str_limit(strip_tags($event->content), 200) }}</p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day">{{\Carbon\Carbon::parse($event->created_at, 'UTC')->format('d')}}</span>
								<span class="news-item-month">{{\Carbon\Carbon::parse($event->created_at, 'UTC')->format('M')}}</span>
							</div>
						</li>
						@endforeach
					</ul>
					
				</div> <!-- /widget-content -->
			
			</div>
			
		</div>
@endsection