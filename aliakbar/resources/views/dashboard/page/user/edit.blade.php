@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-10 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">{{ strtoupper($page_name) }} [{{ strtoupper($update_name) }}]</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ url('dashboard/user/update/'.$edit->id)}}" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="box-body">
                       
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('nama') error @enderror">
                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" value="{{ old('nama',$edit->nama) }}" class="form-control" placeholder="Masukan Nama Lengkap">
                            @error('nama')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @error('username') error @enderror">
                          <label>Username <span class="text-danger">*</span></label>
                          <input type="text" name="username" value="{{ old('username',$edit->username) }}" class="form-control" placeholder="Masukan Username">
                          @error('username')
                          <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @error('email') error @enderror">
                          <label>Email <span class="text-danger">*</span></label>
                          <input type="text" name="email" value="{{ old('email',$edit->email) }}" class="form-control" placeholder="Masukan Email Lengkap">
                          @error('email')
                          <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                          @enderror
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group @error('level') error @enderror">
                          <label>Level User <span class="text-danger">*</span></label>
                          <select name="level"  id="level" class="form-control select" style="width: 100%;">
                            <option selected="selected" value="">Pilih Level User</option>
                            @foreach($level as $level)
                                <option @if(old('level',$edit->level_user_id) == $level->id) selected="" @endif value="{{ $level->id }}">{{ $level->nama }}</option>
                            @endforeach
                          </select>
                          @error('level')
                          <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                          @enderror
                        </div>
                      </div>
                  </div>
                  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group @error('telegram') error @enderror">
                      <label>ID Telegram<span class="text-danger">*</span></label>
                      <input type="text" name="telegram" value="{{ old('telegram',$edit->id_telegram) }}" class="form-control" placeholder="Masukan ID Telegram">
                      @error('telegram')
                      <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                      @enderror
                    </div>
                  </div>
                </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('dashboard/'.$main_url) }}" type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                          <i class="ti-trash"></i> Batalkan
                        </a>
                        <button type="submit" id="button-simpan" class="btn btn-rounded btn-primary btn-outline">
                          <i id="icon-simpan" class="ti-save-alt"></i> <i id="loading-simpan" class="fa fa-spin fa-refresh d-none"></i> Simpan
                        </button>
                    </div>  
                </form>
              </div>
              <!-- /.box -->			
        </div>  

        

    </div>

  </div>
  <!-- /.row -->

</section>
@endsection
@push('js')
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();
    });
  </script> 
@endpush