<div class="comment-form">
                  <form action="{{route('threadcomment.store',$thread->id)}}" method="POST" role="form">
                    {{ csrf_field() }}
                    
                  
                    <div class="form-group">
                      <input type="text" class="form-control" name="body" id="" placeholder="Type Comment here..">
                    </div>
                  </form>
                </div>