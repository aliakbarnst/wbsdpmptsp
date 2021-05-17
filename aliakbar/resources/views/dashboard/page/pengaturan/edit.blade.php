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
                <form class="form" method="POST" action="{{ url('dashboard/pengaturan/update/'.$edit->id)}}" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('nama') error @enderror">
                              <label>Nama Kantor <span class="text-danger">*</span></label>
                              <input type="text" name="nama" value="{{ old('nama', $edit->nama) }}" class="form-control" placeholder="Masukan Nama Lengkap Kantor">
                              @error('nama')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('alamat') error @enderror">
                              <label>Alamat Kantor <span class="text-danger">*</span></label>
                              <input type="text" name="alamat" value="{{ old('alamat', $edit->alamat) }}" class="form-control" placeholder="Masukan Nama Lengkap Kantor">
                              @error('alamat')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('telpon') error @enderror">
                              <label>Telpon Kantor <span class="text-danger">*</span></label>
                              <input type="text" name="telpon" value="{{ old('telpon', $edit->telpon) }}" class="form-control" placeholder="Masukan Nama Lengkap Kantor">
                              @error('telpon')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('email') error @enderror">
                              <label>Email Kantor <span class="text-danger">*</span></label>
                              <input type="text" name="email" value="{{ old('email', $edit->email) }}" class="form-control" placeholder="Masukan Nama Lengkap Kantor">
                              @error('email')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('latitude') error @enderror">
                              <label>Latitude Kantor <span class="text-danger">*</span></label>
                              <input type="text" name="latitude" value="{{ old('latitude', $edit->latitude) }}" class="form-control" placeholder="Masukan Latitude Lengkap Kantor">
                              @error('latitude')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('longitude') error @enderror">
                              <label>Longitude Kantor <span class="text-danger">*</span></label>
                              <input type="text" name="longitude" value="{{ old('longitude', $edit->longitude) }}" class="form-control" placeholder="Masukan Longitude Lengkap Kantor">
                              @error('longitude')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('logo') error @enderror">
                              <label>Pilih Logo <span class="text-danger">*</label>
                              <input type="file" name="logo" value="{{ old('logo') }}" accept="image/gif, image/jpeg, image/png" />
                              @error('logo')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        
                        <div class="media">
                          <img class="align-self-start w-160" src="{{ old('logo', asset("uploads/images/pengaturan/".$edit->logo)) }}" alt="Generic placeholder image">
                        </div>
                        <h3>Sosial Media</h3>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('facebook') error @enderror">
                              <label>Facebook <span class="text-danger">*</span></label>
                              <input type="text" name="facebook" value="{{ old('facebook',$edit->facebook) }}" class="form-control" placeholder="Masukan alamat halaman facebook">
                              @error('facebook')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('youtube') error @enderror">
                              <label>Youtube <span class="text-danger">*</span></label>
                              <input type="text" name="youtube" value="{{ old('youtube',$edit->youtube) }}" class="form-control" placeholder="Masukan alamat channel youtube">
                              @error('youtube')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('instagram') error @enderror">
                              <label>Instagram <span class="text-danger">*</span></label>
                              <input type="text" name="instagram" value="{{ old('instagram',$edit->instagram) }}" class="form-control" placeholder="Masukan alamat profile instagram">
                              @error('instagram')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group @error('twitter') error @enderror">
                              <label>Twitter <span class="text-danger">*</span></label>
                              <input type="text" name="twitter" value="{{ old('twitter',$edit->twitter) }}" class="form-control" placeholder="Masukan alamat halaman twitter">
                              @error('twitter')
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