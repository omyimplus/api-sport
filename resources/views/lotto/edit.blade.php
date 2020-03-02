@extends('layouts.app', ['activePage' => 'lotto', 'titlePage' => __('Lotto Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('หวยรัฐบาล') }}</h4>
                        <p class="card-category"> {{ __('ระบบจัดการหวยรัฐบาล') }}</p>
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

                        {{-- <script>
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
                        </script> --}}
                        {{-- <div class="row" id="listLotto">
                            <div class="col-12">
                                <button id="addButton" class="btn btn-success"><i class="far fa-plus-square"></i> เพิ่มงวดรางวัล</button>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class=" text-primary">
                                            <th width="8%">ID</th>
                                            <th>งวดวันที่</th>
                                            <th width="5%">&nbsp;</th>
                                        </thead>
                                        <tbody>
                                            @if($lottos)
                                                @foreach($lottos as $lotto)
                                                <tr>
                                                    <td>{{$lotto->id}}</td>
                                                    <td><a href="{{url('/lotto/edit')}}">{{$lotto->lotto_at}}</a></td>
                                                    <td>
                                                        <form action="/loto/b->id" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" rel="tooltip" title="Remove" class="btn btn-outline-danger btn-link btn-sm p-0" onclick="return confirm('ลบโพส์ต ID #{{$lotto->id}} แน่ใจ?');">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                            @csrf
                                                        </form>
                                                    </td>
                                                </tr>                                                
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
          
                        <div class="row" id="addLotto">
                            
                            <div class="col-md-12">
                                <a href="{{url('/lotto')}}" class="btn btn-warning"><i class="far fa-window-close"></i> &nbsp; ยกเลิก &nbsp; </a>
                                <form method="post" action="/lotto/{{$lotto->id}}" autocomplete="off" class="form-horizontal">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto_at">{{ __(' งวดวันที่') }}</label>
                                            <div class="col-4">

                                                <input class="form-control" type="text" name="lotto_at" placeholder="16-03-2020" value="{{$lotto->lotto_at}}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto1">{{ __(' รางวัลที่ 1') }}</label>
                                            <div class="col-4">
                                                <div class="form-group text-danger">
                                                    <input class="form-control" type="text" name="lotto1" placeholder="000000" value="{{$lotto->lotto1}}" />
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto1closeup">{{ __(' รางวัลข้างเคียงรางวัลที่ 1') }}</label>
                                            <div class="col-4">
                                                <div class="form-group text-danger">
                                                    <input class="form-control" type="text" name="lotto1closeup"  value="{{$lotto->lotto1closeup}}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto2">{{ __(' รางวัลที่ 2') }}</label>
                                            <div class="col-5">
                                                <div class="form-group text-danger">
                                                    <textarea class="form-control" name="lotto2" cols="600" rows="2">{{$lotto->lotto2}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto3">{{ __(' รางวัลที่ 3') }}</label>
                                            <div class="col-5">
                                                <div class="form-group text-danger">
                                                    <textarea class="form-control" name="lotto3" rows="2">{{$lotto->lotto3}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto4">{{ __(' รางวัลที่ 4') }}</label>
                                            <div class="col-5">
                                                <div class="form-group text-danger">
                                                    <textarea class="form-control" name="lotto4" rows="5">{{$lotto->lotto4}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto5">{{ __(' รางวัลที่ 5') }}</label>
                                            <div class="col-5">
                                                <div class="form-group text-danger">
                                                    <textarea class="form-control" name="lotto5" rows="9">{{$lotto->lotto5}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto_front3">{{ __(' เลขหน้า 3 ตัว') }}</label>
                                            <div class="col-4">
                                                <div class="form-group text-danger">
                                                    <input class="form-control" type="text" name="lotto_front3" value="{{$lotto->lotto_front3}}" />
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto_last3">{{ __(' เลขท้าย 3 ตัว') }}</label>
                                            <div class="col-4">
                                                <div class="form-group text-danger">
                                                    <input class="form-control" type="text" name="lotto_last3" value="{{$lotto->lotto_last3}}" />
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label mt-2" for="lotto_last2">{{ __('  เลขท้าย 2 ตัว') }}</label>
                                            <div class="col-4">
                                                <div class="form-group text-danger">
                                                    <input class="form-control" type="text" name="lotto_last2"  value="{{$lotto->lotto_last3}}" />
                                                </div>
                                            </div>
                                            {{-- <div class="col-2 mt-3 py-3 rounded bg-info">
                                                <h5 class="pt-3">หวยลาว</h5>
                                                <div class="col-12">
                                                    <div class="form-group text-danger p-0">
                                                        งวดวันที่
                                                        <input class="form-control" type="text" name="lotto_lao_at" placeholder="20-12-2020" value="{{$lotto->lotto_lao_at}}" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group text-danger">
                                                        เลขที่ออก
                                                        <input class="form-control" type="text" name="lotto_lao" placeholder="1234" value="{{$lotto->lotto_lao}}" />
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row ">
                                        <span class="p-4">

                                            <a href="{{url('/lotto')}}" class="btn btn-warning"><i class="far fa-window-close"></i> &nbsp; ยกเลิก &nbsp; </a>
                                            <button type="submit" class="btn btn-primary">{{ __('เพิ่มข้อมูล') }}</button>
                                        </span>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection