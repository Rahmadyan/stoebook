
	<div class="list-group">
		@forelse($threads as $key)
		<a class="list-group-item" href="{{url('thread', $key->id)	 }}
		{{-- {{ url('open/'.$key->id) }}  --}}">
			<div class="user-block">
				
				<img class="img-circle" src="{{ asset('img')}}/{{$key->user->avatar }}" >
				<span class="username">
                    <h4 class="list-group-item-heading">{{ $key->subject }} <i class="fa fa-comments-o pull-right"> {{ $key->comments()->count() }}</i></h4>
                </span>
                <span class="description">
                	<i class="fa fa-users pull-left">
	                By : {{ $key->user->name }}, {{ $key->created_at }}</i>
                </span>
				<br>
			</div>
				<p>
					{{ str_limit(strip_tags($key->thread),250) }}

				</p>
		</a>
		@empty
		
		<h5>No Threads</h5>
		@endforelse

	</div>


	

		
		
	
	
