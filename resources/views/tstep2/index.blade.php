@extends('layouts.app', ['activePage' => 'tstep2', 'titlePage' => __('TededStep2 Management')])

@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('ฺBall Guidelines') }}</h4>
						<p class="card-category"> {{ __('ทีเด็ดบอลเดี่ยว') }}</p>
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
							$("#addTstep").hide();
							$('#addButton').click(function(){
								$("#listBlog").hide();
								$("#addTstep").show();

							});
							$('#cancelButton').click(function(){
								$("#addTstep").hide();
								$("#listBlog").show();
							});
							$('.addButton').click(function(){
								$("#listBlog").hide();
								$("#addTstep").show();
								
							});							      
						} 
					}
					</script>
						<div class="row" id="listBlog">
							<div class="col-md-12">
								@if($buttonAdd == 'on')
								<div class="">
									<a href="#" class="btn btn-success" id="addButton">เพิ่มทำนายผล</a>
								</div>
								@endif

								<div class="table-responsive">
									<table class="table table-hover">
										<thead class=" text-primary">
											<th>ID</th>
											<th>เซียน</th>
											<th>ทำนายผล</th>
											<th>ข้อมูลล่าสุด</th>
										</thead>
										<tbody>		
											@foreach($tstep2 as $tstep)
											<?php $user = DB::table('users')->where('id',$tstep->uid)->first(); ?>
											<tr>
												<td>{{$tstep->id}}</td>
												<td>{{$user->name}}</td>
													<td>
														<a href="{{url('tstep2/'.$tstep->id.'/edit')}}" rel="tooltip" >
															{{$tstep->team1}} | {{$tstep->team2}}
														</a>
													</td>						
												</td>
												<td>{{$tstep->updated_at}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<div class="row" id="addTstep">
							<div class="col-md-12">
                                <a href="/tstep2" class="btn btn-warning"><i class="far fa-window-close"></i> &nbsp; ยกเลิก &nbsp; </a>
								<form method="post" action="{{url('tstep2/')}}" autocomplete="off" class="form-horizontal">
									<div class="row">
										<div class="col">
										
											<div class="form-group">
												<div class="form-check form-check-radio form-check-inline">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="team1w" id="team1w" value="0" checked > เสมอ
														<span class="circle">
															<span class="check"></span>
														</span>
													</label>
												</div>
												<div class="form-check form-check-radio form-check-inline">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="team1w" id="team1w" value="1" > ต่อ
														<span class="circle">
															<span class="check"></span>
														</span>
													</label>
												</div>
												<div class="form-check form-check-radio form-check-inline">
													<label class="form-check-label">
														<input class="form-check-input" type="radio" name="team1w" id="team1w" value="2" > รอง
														<span class="circle">
															<span class="check"></span>
														</span>
													</label>
												</div>
												<input class="form-control" type="text" name="team1" value="" />									
											</div>
											<div class="form-group">
												<div class="form-check form-check-radio form-check-inline">
													<label class="form-check-label">
													<input class="form-check-input" type="radio" name="team2w" id="team2w" value="0" checked > เสมอ
													<span class="circle">
														<span class="check"></span>
													</span>
													</label>
												</div>
												<div class="form-check form-check-radio form-check-inline">
													<label class="form-check-label">
													<input class="form-check-input" type="radio" name="team2w" id="team2w" value="1" > ต่อ
													<span class="circle">
														<span class="check"></span>
													</span>
													</label>
												</div>
												<div class="form-check form-check-radio form-check-inline">
													<label class="form-check-label">
													<input class="form-check-input" type="radio" name="team2w" id="team2w" value="2"> รอง
													<span class="circle">
														<span class="check"></span>
													</span>
													</label>
												</div>
												<input class="form-control" type="text" name="team2" value="" />
											</div>
											<div class="row ">
												<button type="submit" class="btn btn-primary ml-auto mr-auto">{{ __('บันทึกข้อมูล') }}</button>
											</div>
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