@extends('dashboard.main')


@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-10 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">{{ strtoupper($page_name) }}</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" method="POST" action="{{ action('Backend\SliderController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_gambar') error @enderror">
                              <label>2 Kata Pertama <span class="text-danger">*</span></label>
                              <input type="text" name="nama_gambar" value="{{ old('nama_gambar') }}" class="form-control" placeholder="Masukan 2 Kata Pertama">
                              @error('nama_gambar')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama_gambar2') error @enderror">
                              <label>2 Kata Kedua <span class="text-danger">*</span></label>
                              <input type="text" name="nama_gambar2" value="{{ old('nama_gambar2') }}" class="form-control" placeholder="Masukan 2 Kata Kedua">
                              @error('nama_gambar2')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('gambar') error @enderror">
                              <label>Pilih Gambar <span class="text-danger">*</label>
                              <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" accept="image/gif, image/jpeg, image/png" />
                              @error('gambar')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
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