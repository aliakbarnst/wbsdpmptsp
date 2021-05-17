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
                <form class="form" method="POST" action="{{ url('dashboard/pengaduan/update/'.$edit->id)}}" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                         <div class="col-md-8">
                           <div class="form-group @error('nama_terduga') error @enderror">
                             <label>Nama Terduga <span class="text-danger">*</span> </label>
                             <input type="text" name="nama_terduga" value="{{ old('nama_terduga',$edit->nama_terduga) }}" class="form-control" placeholder="Masukan Nama Terduga" readonly>
                             @error('nama_terduga')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>

                         <div class="col-md-8">
                           <div class="form-group @error('nip_terduga') error @enderror">
                             <label>NIP Terduga</span></label>
                             <input type="text" name="nip_terduga" value="{{ old('nip_terduga',$edit->nip_terduga) }}" class="form-control" placeholder="Masukan NIP Terduga" readonly>
                             @error('nip_terduga')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>

                         <div class="col-md-8">
                           <div class="form-group @error('jabatan_terduga') error @enderror">
                             <label>Jabatan Terduga</span></label>
                             <input type="text" name="jabatan_terduga" value="{{ old('jabatan_terduga',$edit->jabatan_terduga) }}" class="form-control" placeholder="Masukan Jabatan Terduga" readonly>
                             @error('jabatan_terduga')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>

                       <div class="col-md-8">
                         <div class="form-group @error('jenis_pelanggaran') error @enderror">
                           <label>Jenis Pelanggaran <span class="text-danger">*</span></label>
                           <select name="jenis_pelanggaran" class="form-control select" style="width: 100%;" disabled="true">
                             <option selected="selected" value="">Pilih Jenis</option>
                             @foreach($jenis_pelanggaran as $jenis_pelanggaran)
                                 <option @if(old('jenis_pelanggaran',$edit->jenis_pelanggaran_id) == $jenis_pelanggaran->id) selected="" @endif value="{{ $jenis_pelanggaran->id }}">{{ $jenis_pelanggaran->nama }}</option>
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
                         <textarea rows="5" name="deskripsi_pelanggaran" class="form-control" placeholder="Deskripsi Pelanggaran" readonly>{{ old('deskripsi_pelanggaran',$edit->deskripsi) }}</textarea>
                         @error('deskripsi_pelanggaran')
                         <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                         @enderror
                       </div>
                       </div>

                       <div class="col-md-8">
                         <div class="form-group @error('perlindungan_fisik') error @enderror">
                           <input type="checkbox" id="basic_checkbox_1" name="perlindungan_fisik"  @if($edit->perlingungan == 1) checked=""  @endif disabled="true">
                           <label for="basic_checkbox_1"><small> Permohonan Perlindungan Fisik <font color="#ff3333"> * </font> </small></label>
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

                         <hr class="my-15">
                       <h4 class="box-title text-info"><i class="fa fa-file-pdf-o"></i> Daftar File</h4>
                       <hr class="my-15">
                       <div class="table-responsive">
                        <table id="tabel" class="tabel table table-striped display table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama File</th>
                                    <th>File</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
                </form>
              </div>
              <!-- /.box -->			
        </div>  

        

    </div>

  </div>
  <!-- /.row -->

</section>

<div class="modal center-modal fade" id="ModalHapus" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data FILE</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p class="no-margin">Apakah Anda Yakin Akan Menghapus FILE <span class="badge badge-danger NamaUserHapus">Danger</span> ?</p>
      </div>
      <div class="modal-footer modal-footer-uniform modal-footer AksiHapus">
      </div>
    </div>
  </div>
</div>
@endsection

@push('css')
<link href="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor_components/datatable/datatables.css')}}">
@endpush

@push('js')
<script src="{{ asset('assets/backend/vendor_components/summernote/dist/summernote.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>
<script src="{{asset('assets/backend/vendor_components/datatable/datatables.js')}}"></script>
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

      var tabel = $('.tabel').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 ,
           processing: true,
           serverSide: true,
           ajax: {
           url: "{{ url('dashboard/pengaduan/table-file') }}/{{ $edit->id }}",
           },
           columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'file',
                name: 'file'
            },
           {
               data: 'option',
               name: 'option'
            }
           ],
           "initComplete": function(settings, json) {
               deleteData();
               
           }
           });

           function deleteData()
           {
                $('#ModalHapus').on('show.bs.modal', function(e) {
                    var id = $(e.relatedTarget).attr('data-id');
                    var nama = $(e.relatedTarget).attr('data-nama');
                    console.log(id);
                    $('.NamaUserHapus').html('');
                    $('.AksiHapus').html('');
                    $('.NamaUserHapus').html(nama);
                    $('.AksiHapus').html('<button type="button" class="btn btn-default btn-cons no-margin float-left inline" data-dismiss="modal">Batal</button><button type="button" class="btn btn-danger btn-cons  float-right inline TombolHapus" data-id="'+id+'" data-token="{{ csrf_token() }}" >Hapus</button>');
                    $('.TombolHapus').on('click',function(e)
                    {
                        var idDelete = $(this).attr('data-id');
                        var token = $(this).attr('data-token');
                        $.ajax({
                            url:"{{url('dashboard/pengaduan/delete')}}/" + idDelete,
                            type: 'POST',
                            data: {_method: 'delete', _token :token},
                            success:function(get){
                            toastr.options = {
                                "positionClass": "toast-bottom-right",
                                }
                            if(get == 1)
                            {
                                toastr["success"]("Data  Berhasil Dihapus", "Sukses !!")
                            }
                            else
                            {
                                toastr["error"]("Terjadi Kesalahan Saat Menghapus Data", "Gagal !!")
                            }
                            $('#ModalHapus').modal('hide');
                            tabel.ajax.reload();
                            }

                        });
                    });
                });
           }
    });
  </script> 
@endpush