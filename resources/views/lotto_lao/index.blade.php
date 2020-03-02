@extends('layouts.app', ['activePage' => 'lotto_lao', 'titlePage' => __('Lotto lao Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('หวยลาว') }}</h4>
                        <p class="card-category"> {{ __('ระบบจัดการหวยลาว') }}</p>
                    </div>
                    <div class="card-body">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <strong>Oh snap!</strong> &nbsp; &nbsp;<span>{{$error}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(session('success'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <strong>Well done! </strong> &nbsp; &nbsp; <span>{{session('success')}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <strong>Oh snap!!</strong> &nbsp; &nbsp;<span>{{session('error')}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <script>
                            window.onload = function() {
                                if (window.jQuery) {  
                                    bsCustomFileInput.init();
                                    $("#addLotto").hide();
                                    $('#addButton').click(function(){
                                        $("#addLotto").show();
                                        $("#listLotto").hide();
                                    });
                                    $('#cancelButton').click(function(){
                                        $("#addLotto").hide();
                                        $("#listLotto").show();
                                    });        
                                } 
                            }
                        </script>
                        <div class="row" id="listLotto">
                            <div class="col-12">
                                {{-- <button id="addButton" class="btn btn-success"><i class="far fa-plus-square"></i> เพิ่มงวดรางวัล</button> --}}
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class=" text-primary">
                                            <th width="8%">ID</th>
                                            <th>งวดวันพุธ ที่</th>
                                            <th width="5%">&nbsp;</th>
                                        </thead>
                                        <tbody>
                                            <div>
                                            @if($lottos)
                                                @foreach($lottos as $lotto)
                                                <tr>
                                                    <td>{{$lotto->id}}</td>
                                                    <td><a href="{{url('/lotto_lao/'.$lotto->id.'/edit')}}">{!!$lotto->lotto_lao_at ?? '<button class="rounded btn-xs btn-success">เพิ่มหวยลาว</button>'!!}</a></td>
                                                    <td>
                                                        {{-- <form action="/lotto/{{$lotto->id}}" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" rel="tooltip" title="Remove" class="btn btn-outline-danger btn-link btn-sm p-0" onclick="return confirm('ลบโพส์ต ID #{{$lotto->id}} แน่ใจ?');">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                            @csrf
                                                        </form> --}}
                                                    </td>
                                                </tr>                                                
                                                @endforeach
                                            @endif

                                            </div>
                                            <tr>
                                            <td colspan="3">*** ถ้าไม่มีปุ่มเพิ่มหวยลาว ขึ้น ให้ไปสร้าง <a href="{{url('/lotto')}}">หวยรัฐบาล</a> ก่อน</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
          
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection