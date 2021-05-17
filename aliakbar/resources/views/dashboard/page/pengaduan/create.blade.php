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
                <form class="form" method="POST" action="{{ action('Backend\PengaduanController@store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                       <div class="row">
                          <div class="col-md-8">
                            <div class="form-group @error('nama_terduga') error @enderror">
                              <label>Nama Terduga <span class="text-danger">*</span> </label>
                              <input type="text" name="nama_terduga" value="{{ old('nama_terduga') }}" class="form-control" placeholder="Masukan Nama Terduga">
                              @error('nama_terduga')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-8">
                            <div class="form-group @error('nip_terduga') error @enderror">
                              <label>NIP Terduga</span></label>
                              <input type="text" name="nip_terduga" value="{{ old('nip_terduga') }}" class="form-control" placeholder="Masukan NIP Terduga">
                              @error('nip_terduga')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-8">
                            <div class="form-group @error('jabatan_terduga') error @enderror">
                              <label>Jabatan Terduga</span></label>
                              <input type="text" name="jabatan_terduga" value="{{ old('jabatan_terduga') }}" class="form-control" placeholder="Masukan Jabatan Terduga">
                              @error('jabatan_terduga')
                              <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                              @enderror
                            </div>
                          </div>

                        <div class="col-md-8">
                          <div class="form-group @error('jenis_pelanggaran') error @enderror">
                            <label>Jenis Pelanggaran <span class="text-danger">*</span></label>
                            <select name="jenis_pelanggaran" class="form-control select" style="width: 100%;">
                              <option selected="selected" value="">Pilih Jenis</option>
                              @foreach($jenis_pelanggaran as $jenis_pelanggaran)
                                  <option @if(old('jenis_pelanggaran') == $jenis_pelanggaran->id) selected="" @endif value="{{ $jenis_pelanggaran->id }}">{{ $jenis_pelanggaran->nama }}</option>
                              @endforeach
                            </select>
                            @error('jenis_pelanggaran')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-8">
                        <div class="form-group @error('deskripsi_pelanggaran') error @enderror">
                          <label>Deskripsi Pelanggaran <span class="text-danger">*</span></label>
                          <textarea rows="5" name="deskripsi_pelanggaran" class="form-control" placeholder="Deskripsi Pelanggaran">{{ old('deskripsi_pelanggaran') }}</textarea>
                          @error('deskripsi_pelanggaran')
                          <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                          @enderror
                        </div>
                        </div>

                        <div class="col-md-8">
                          <div class="form-group @error('perlindungan_fisik') error @enderror">
                            <input type="checkbox" id="basic_checkbox_1" name="perlindungan_fisik">
                            <label for="basic_checkbox_1"><small> Centang Jika Ingin Mengajukan Permohonan Perlindungan Fisik <font color="#ff3333"> * </font> </small></label>
                            @error('perlindungan_fisik')
                            <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                            @enderror
                          </div>
                          </div>
                        <div class="col-md-8">
                        <hr class="my-15">
                        <h4 class="box-title text-info"><i class="fa fa-file-pdf-o"></i> Lampiran</h4>
                        <hr class="my-15">
                      </div>

                      <div class="col-md-8">
                        <div class="form-group @error('perlindungan_fisik') error @enderror">
                          <div class="row multi-field-wrapper">
                            <div class="col-md-12 multi-fields ">
                              <div class="row multi-field">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Nama File <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_file[]" value="" class="form-control" placeholder="Masukan Nama Lengkap File">
                                    {{-- @error('nama_file')
                                    <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                                    @enderror --}}
                                  </div>
                                </div>
  
                                <div class="col-md-4">
                                  <div class="form-group @error('file') error @enderror">
                                    <label>File <span class="text-danger">*</span></label>
                                    <input type="file" name="file[]" class="form-control" accept="application/pdf">
                                    <small> File lampiran (Maks. File <font color="#ff3333"> 5MB </font>) </small>
                                    @error('file')
                                    <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>&nbsp;</label><br>
                                    <a class="remove-field btn btn-sm btn-danger "><i class="fa fa-minus" aria-hidden="true"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <a class="btn btn-sm mb-2 mr-2 btn-success add-field"><i class="fa fa-plus" aria-hidden="true"></i> Tambah File</a>
                            </div>
                          </div>

                        </div>

                        <div class="box-footer">
                          <a href="{{ url('dashboard/'.$main_url) }}" type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                            <i class="ti-trash"></i> Batalkan
                          </a>
                          <button type="submit" id="button-simpan" class="btn btn-rounded btn-primary btn-outline">
                            <i id="icon-simpan" class="ti-save-alt"></i> <i id="loading-simpan" class="fa fa-spin fa-refresh d-none"></i> Simpan
                          </button>
                      </div>  
                    </div>
                    <!-- /.box-body -->
                   
                </form>
              </div>
              <!-- /.box -->			
        </div>  

        

    </div>

  </div>
  <!-- /.row -->

</section>
@endsection

@push('css')
<link href="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.min.js') }}"></script>
  <script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
  <script>  
    $(document).ready(function() {
      $(".select").select2();

      $('#summernote').summernote({
          placeholder: 'Masukan berita disini, anda juga dapat memasukan gambar pada bagian text',
          height: 350
      });

      $('.multi-field-wrapper').each(function() {
          var $wrapper = $('.multi-fields', this);
          $(".add-field", $(this)).click(function(e) {
              $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('');
          });
          $('.multi-field .remove-field', $wrapper).click(function() {
              if ($('.multi-field', $wrapper).length > 1)
                  $(this).parent().parent().parent().remove();
          });
      });
    });
  </script> 
@endpush