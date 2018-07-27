<!DOCTYPE html>
<html>
<head>
  @include('template.head')

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red-light sidebar-mini">

<div class="wrapper">
  @include('template.header')
  @include('template.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        WELCOME
        <small>Sistem Komunikasi Perusahaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Comment</li>
      </ol>
    </section>



    <section class="content">


      <div class="row">
         <div class="col-md-12">
          
          @include('layouts.partials.error')
          @include('layouts.partials.success')
          
           <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
             </ul>

             <div class="tab-content">
               <div class="active tab-pane" id="activity">
                 <div class="box box-widget">
               <div class="box-header with-border">
                 <div class="user-block">
                  <link rel="stylesheet" type="text/css" href="">
                   <a href="{{ route('user_profile',auth()->user()) }}"><img class="img-circle" src="{{ asset('img')}}/{{$thread->user->avatar }}" alt="User Image"></a>

                   <span class="username">
                    <h4>{{$thread->subject}}</h4>
                   
                   </span>


                   <span> 
                    <a href="" class="btn-box-tool" data-toggle="modal" data-target="#modal-default2"> <i class="fa fa-users margin-r-5"></i></a>Shared publicly - {{ $thread->created_at }}
                  </span>
                 </div>
                  
                  @if(auth()->user()->id == $thread->user_id)                 

                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Edit">
                      <a href="{{route('thread.edit',$thread->id)}}" class="pull-right btn-box-tool">
                        <i class="fa fa-edit"></i>
                      </a>
                    </button>
                   
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Delete">

                      <form action="{{route('thread.destroy',$thread->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                      </form>
                      {{-- <a href="{{route('thread.destroy',$thread->id)}}" class="pull-right btn-box-tool">
                      {{csrf_field()}}
                    {{method_field('DELETE')}} 
                        <i class="fa fa-trash"></i>
                      </a> --}}
                    </button>
                    

                 </div>

                 @endif
               </div>
               <div class="box-body">
                
                 <div class="attachment-block clearfix">


                   <p>
                     {!!$thread->thread!!}
                   </p>
                 </div>

                 <a href="openthread" class="pull-left btn-box-tool"><i class="fa fa-comments-o margin-r-5"></i><b>Comments (5)</b></a>
                 <a href="" data-toggle="modal" data-target="#modal-default" class="pull-left btn-box-tool"><i class="fa fa-eye margin-r-5"></i><b>24</b></a>
                 <a href="" data-toggle="modal" data-target="#modal-default" class="pull-right btn-box-tool"><b>Reply</b></a>


               </div>

               @include('thread.partials.comment-thread')
               

             </div>
             
                @foreach($thread->comments as $comment)
                
                  {{-- thread comment   --}}
                  <div class="comment-list well well-lg">
                    @include('thread.partials.comment-list')
                  </div>

                  {{-- reply form --}}
                  
                  {{-- <button class="btn btn-xs btn-default" onclick="toggleReply('{{ $comment->id }}')">Reply</button> --}}
                  
                  <div style="margin-left: 50px " class="reply-form-{{ $comment->id }} hidden">
                    <form action="{{route('replycomment.store',$comment->id)}}" method="POST" role="form">
                      {{ csrf_field() }}
                        <input type="text" class="form-control input-sm" name="body" id="" placeholder="Reply..">
                    
                    </form>
                  </div>
                  

                  {{-- reply commnet --}}
                  @foreach($comment->comments as $reply)
                    @include('thread.partials.reply-list')
                  @endforeach  

                  

                @endforeach  
                

                

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">WNR Team</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Seen by</h4>
      </div>
      <div class="modal-body">

        <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <img class="img-circle img-bordered-sm" src="assets/dist/img/user1-128x128.jpg" width="40" height="40" alt="user image">
          &nbsp
          <a href="#">Jonathan Burke Jr.</a>
        </li>
        <li class="list-group-item">
          <img class="img-circle img-bordered-sm" src="assets/dist/img/user1-128x128.jpg" width="40" height="40" alt="user image">
          &nbsp
          <a href="#">Jonathan Burke Jr.</a>
        </li>
        <li class="list-group-item">
          <img class="img-circle img-bordered-sm" src="assets/dist/img/user1-128x128.jpg" width="40" height="40" alt="user image">
          &nbsp
          <a href="#">Jonathan Burke Jr.</a>
          {{-- <b>Friends</b> <a class="pull-right">13,287</a> --}}
        </li>
      </ul>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-default2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Shared With</h4>
      </div>
      <div class="modal-body">
        <a href="#">Jonathan Burke Jr, </a>
        <a href="#">Jonathan Burke Jr, </a>
        <a href="#">Jonathan Burke Jr, </a>
        <a href="#">and 2 others</a>



      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- jQuery 3 -->
<script src="{{url('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url('/assets/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('/assets/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('/assets/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('/assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/assets/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/assets/dist/js/demo.js')}}"></script>
<script>
  function toggleReply(commentId) {
    $('.reply-form-'+commentId).toggleClass('hidden');
  }
</script>
</body>
</html>
