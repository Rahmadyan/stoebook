<div style="margin-left: 40px">
  <img class="img-circle" width="40px" height="40px" src="{{ asset('img')}}/{{$reply->user->avatar }}" >
  <lead>by {{ $reply->user->firstname }}</lead>
  <p>{{ $reply->body }}</p>
                    {{-- button action reply   --}}
                      <div class="action">
                        {{-- <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a> --}}
                        @if(auth()->user()->id == $reply->user_id)
                       <a class="btn btn-box-tool fa fa-edit pull-right" data-toggle="modal" href='#{{ $reply->id }}'></a>
                        <div class="modal fade" id="{{ $reply->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal title</h4>
                              </div>
                              <div class="modal-body">
                                
                                <div class="comment-form">
                                  <form action="{{route('comment.update',$reply->id)}}" method="POST" role="form">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <legend>Edit Comment</legend>
                                  
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="body" id="" placeholder="Input field" value="{{ $reply->body }}">
                                    </div>
                                  
                                    <button type="submit" class="btn btn-primary">Reply</button>
                                  </form>
                                </div>

                              </div>
                              
                            </div>
                          </div>
                        </div>

                        <form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-box-tool fa fa-trash pull-right" value="Delete"></button>
                        </form> 

                        @endif
                      </div>

                    </div>