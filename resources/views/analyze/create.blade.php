
@extends('layouts.app', ['activePage' => 'analyze', 'titlePage' => __('Analyzes Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Analyze') }}</h4>
                            <p class="card-category"> {{ __('ระบบจัดการบทวิเคราะห์บอล') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row" id="addBlog">
                                <div class="col-md-12">
                                    <form method="post" action="/analyze" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label mt-2" for="title">ชื่อเรื่อง</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <input class="form-control" name="title" id="title" type="text" placeholder="ใส่ชื่อบทความ" value="" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label mt-2" for="title">คำบรรยาย</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <input class="form-control" name="description" id="description" type="text" placeholder="ใส่คำบรรยาย" value="" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label mt-2" for="title">เนื้อเรื่อง</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="ckeditor" required="" oninvalid="this.setCustomValidity('Content is require.')"
                                                    oninput="setCustomValidity('')"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label mt-2" for="title">ยูทูป</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <input class="form-control" name="clip" id="clip" type="text" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label mt-2" for="title">รูปภาพ.tdedclub</label>
                                            <div class="col-sm-7">
                                                <div class="custom-file mt-3">
                                                    <input type="file" name="image" style="cursor: pointer;" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile"><u>อัพโหลดภาพ</u></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label mt-2" for="title">รูปภาพ.zean7m</label>
                                            <div class="col-sm-7">
                                                <div class="custom-file mt-3">
                                                    <input type="file" name="image2" style="cursor: pointer;" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile"><u>อัพโหลดภาพ</u></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card-footer ml-auto mr-auto">
                                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                            </div>
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
