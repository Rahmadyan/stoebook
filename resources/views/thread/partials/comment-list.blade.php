  <div>
  <img class="img-circle" width="40px" height="40px" src="{{ asset('img')}}/{{$comment->user->avatar }}" >
  <lead>by {{ $comment->user->firstname }}</lead>  
  <h4>{{ $comment->body }}</h4>  
                    
                    
                    
                    {{-- button action comment thread   --}}
                    <div class="action">
                      {{-- <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a> --}}
                    @if(auth()->user()->id == $comment->user_id) 
                     <a class="btn btn-box-tool fa fa-edit pull-right" data-toggle="modal" href='#{{ $comment->id }}'></a>

                      <div class="modal fade" id="{{ $comment->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                              
                              <div class="comment-form">
                                <form action="{{route('comment.update',$comment->id)}}" method="POST" role="form">
                                  {{ csrf_field() }}
                                  {{ method_field('put') }}
                                  <legend>Edit Comment</legend>
                                
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="body" id="" placeholder="Input field" value="{{ $comment->body }}">
                                  </div>
                                
                                  <button type="submit" class="btn btn-primary">comment</button>
                                </form>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                      </div>
                       
                      <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-box-tool fa fa-trash pull-right" value="Delete"></button>
                      </form> 
                      @endif

                        <button class="btn btn-box-tool fa fa-mail-reply pull-right" onclick="toggleReply('{{ $comment->id }}')"></button>

                        

                    </div>
                  </div>
                    