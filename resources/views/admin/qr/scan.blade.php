@include('admin.layouts.header')
@include('admin.layouts.nav')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>



@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-6">
    <video id="preview" width="500" src="">

    </video>
    </div>

    <div class="col-lg-6">
        <label for="">qr code</label>
        <form action="{{url('scansave')}}" method="POST">
            @csrf
            <input type="text" name="student_id" id="text" class="form-control">

            <input type="hidden" name="date" id="text" class="form-control" value="{{ now()->format('Y-m-d') }}">

            <input type="hidden" name="time" id="text" class="form-control" value="{{ now()->format('H:i:s') }}">



        </form>
    </div>

</div>



<script>
    let scanner =  new Instascan.Scanner({video:document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 )
        {
            scanner.start(cameras[0]);
        }
        else
        {
            alert('no camera ')
        }

    }).catch(function(e){
        console.error(e);
    }) ;

    scanner.addListener('scan',function(c){
    document.getElementById('text').value = c ; 
    document.forms[1].submit();  
    });
</script>

 
 
@include('admin.layouts.footer')


