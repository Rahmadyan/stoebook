<div class="list-group">
		@forelse($threads as $thread)
		<a class="list-group-item" href="{{-- {{url('thread', $key->id)	 }} --}}
		{{-- {{ url('open/'.$key->id) }}  --}}">
			<div class="user-block">
				
				<img class="img-circle" src="{{ asset('img')}}/{{$thread->user->avatar }}" >
				<span class="username">
                    <h4 class="list-group-item-heading">{{$thread->subject}}<i class="fa fa-comments-o pull-right"> {{ $thread->comments()->count() }}</i></h4>
                </span>
                <span class="description">
                	<i class="fa fa-users pull-left">
	                By : {{ $thread->user->name }}, {{ $thread->created_at }}</i>
                </span>
				<br>
			</div>
				<p>
					{{ str_limit($thread->thread,250) }}

				</p>
		</a>
		@empty
		
		<h5>No Threads</h5>
		@endforelse

	</div>




{{-- <h3>{{$user->name}}'s latest Threads</h3>
@forelse($threads as $thread)
        <h5></h5>
        <h5>{{$thread->thread}}</h5>

    @empty
        <h5>No threads yet</h5>

    @endforelse

 --}}

{{-- <div>
    
    <h3>{{$user->name}}'s latest Threads</h3>

    @forelse($threads as $thread)
        <h5>{{$thread->subject}}</h5>

    @empty
        <h5>No threads yet</h5>

    @endforelse
    <br>
    <hr>

    <h3>{{$user->name}}'s latest Comments</h3>

    @forelse($comments as $comment)
        <h5>{{$user->name}} commented on <a href="{{route('thread.show',$comment->commentable->id)}}">{{$comment->commentable->subject}}</a>  {{$comment->created_at->diffForHumans()}}</h5>
    @empty
    <h5>No comments yet</h5>
    @endforelse
</div> --}}