@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('ผู้ใช้งานในระบบ')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('ผู้ใช้งานในระบบ') }}</h4>
                <p class="card-category"> {{ __('สร้างและจัดการผู้ใช้งาน') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('เพิ่มผู้ใช้งาน') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('ชื่อ') }}
                      </th>
                      <th>
                        {{ __('อีเมล') }}
                      </th>
                      <th>
                        {{ __('Line') }}
                      </th>
                      <th>
                        {{ __('Facebook') }}
                      </th>
                      <th>
                        {{ __('รูปประกอบ') }}
                      </th>
                      <th>
                        {{ __('ตำแหน่ง') }}
                      </th>
                      <th class="text-right">
                        {{ __('จัดการ') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            @if($user->line)
                            <i class="fab fa-line text-success fa-2x"></i>
                            @endif
                          </td>
                          <td>
                            @if($user->facebook)
                            <i class="fab fa-facebook-square text-info fa-2x"></i>
                            @endif
                          </td>
                          <td>
                            @if($user->avatar)
                            <i class="far fa-id-badge text-warning fa-2x"></i>
                            @endif

                          </td>
                          <td>
                              @if($user->level == 100)
                              <span class="text-danger">แอดมิน</span>
                              @endif
                              @if($user->level == 1)
                              <span class="text-success">เซียน</span>
                              @endif
                              @if($user->level == 0)
                              ไม่มีสิทธิ
                              @endif
                          </td>
                          <td class="td-actions text-right">
                            @if ($user->id != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
