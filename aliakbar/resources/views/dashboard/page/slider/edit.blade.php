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
                <form class="form" method="POST" action="{{ url('dashboard/slider/update/'.$edit->id)}}" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                         <div class="col-md-6">
                           <div class="form-group @error('nama_gambar') error @enderror">
                             <label>2 Kata Pertama <span class="text-danger">*</span></label>
                             <input type="text" name="nama_gambar" value="{{ old('nama_gambar',$edit->nama) }}" class="form-control" placeholder="Masukan Nama Galeri">
                             @error('nama_gambar')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group @error('nama_gambar2') error @enderror">
                            <label>2 Kata Kedua<span class="text-danger">*</span></label>
                            <input type="text" name="nama_gambar2" value="{{ old('nama_gambar2',$edit->nama_kedua) }}" class="form-control" placeholder="Masukan Nama Galeri">
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
                             <div class="help-block"><i class="fa fa-info-circle" aria-hidden="true"></i> Biarkan kosong jika tidak ingin mengubah gambar</div>
                             @error('gambar')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                           <figure class="img-hov-zoomin"><img src="{{ asset("uploads/images/gambar-slider/".$edit->gambar) }}" width="200px" alt="'{{ $edit->gambar }}"></figure>
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