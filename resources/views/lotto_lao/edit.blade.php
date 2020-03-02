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


          
                        <div class="row" id="addLotto" style="">
                            
                            <div class="col-md-12">
                                
                                <form method="post" action="/lotto_lao/{{$lotto->id}}" autocomplete="off" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-2 py-3 rounded">
                                               
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
                                            </div>
                                            <input type="hidden" name="_method" value="PUT">
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <span class="p-4">
                                            <a href="{{url('/lotto_lao')}}" class="btn btn-warning"><i class="far fa-window-close"></i> &nbsp; ยกเลิก &nbsp; </a>
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

@endsection