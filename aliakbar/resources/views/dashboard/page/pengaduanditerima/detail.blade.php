@extends('dashboard.main')

@section('content')
@include('dashboard.include.breadcrumb')
<section class="content">
    <div class="row">			  
        <div class="col-lg-10 col-12">
              <div class="box">
                <section class="invoice printableArea">
                  <div class="row">
                  <div class="col-12">
                    <div class="bb-1 clearFix">
                    <div class="text-right pb-15">
                      {{-- <button class="btn btn-success" type="button"> <span><i class="fa fa-print"></i> Save</span> </button> --}}
                      <button id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>	
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="page-header">
                    <h2 class="d-inline"><span class="font-size-30">KODE TICKET : {{ $edit->kode_ticket }}</span></h2>
                    <div class="pull-right text-right">
                      <h3>{{ tgl_indo($edit->created_at) }}</h3>
                    </div>	
                    </div>
                  </div>
                  <!-- /.col -->
                  </div>
                  <div class="row invoice-info">
                  <div class="col-md-6 invoice-col">
                    <strong>Kepada</strong>	
                    <address>
                    <strong class="text-blue font-size-24">Dari {{ $pengaturan_website->nama }}</strong><br>
                    <strong class="d-inline">{{ $pengaturan_website->alamat }}</strong><br>
                    <strong>Phone: {{ $pengaturan_website->telpon }} &nbsp;&nbsp;&nbsp;&nbsp; Email: {{ $pengaturan_website->email }}</strong>  
                    </address>
                  </div>
                  <!-- /.col -->
                  {{-- <div class="col-md-6 invoice-col text-right">
                    <strong>To</strong>
                    <address>
                    <strong class="text-blue font-size-24">Doe Shina</strong><br>
                    124 Lorem Ipsum, Suite 478, Dummuy, USA 123456<br>
                    <strong>Phone: (00) 789-456-1230 &nbsp;&nbsp;&nbsp;&nbsp; Email: conatct@example.com</strong>
                    </address>
                  </div> --}}
                  <!-- /.col -->
                  <div class="col-sm-12 invoice-col mb-15">
                    <div class="invoice-details row no-margin">
                      <div class="col-md-6 col-lg-3"><b>Nama Terduga : </b>{{ strtoupper ($edit->nama_terduga) }}</div>
                      <div class="col-md-6 col-lg-3"><b>NIP Terduga : </b> {{ strtoupper ($edit->nip_terduga) }}</div>
                      <div class="col-md-6 col-lg-3"><b>Jabatan Terduga : </b> {{ strtoupper ($edit->jabatan_terduga) }}</div>
                      <div class="col-md-6 col-lg-3"><b>Jenis Pelanggaran: </b> {{ strtoupper (getJenisPelanggaran($edit->jenis_pelanggaran_id) ) }}</div>
                    </div>
                  </div>
                  <!-- /.col -->
                  </div>
                  <div class="row">
                  <div class="col-12 table-responsive">
                    <h2 class="d-inline"><span class="font-size-30">Lampiran</span></h2>
                    <br>
                    <table class="table table-bordered">
                    <tbody>
                    <tr>
                      <th>#</th>
                      <th>Nama File</th>
                      <th>File #</th>
                    </tr>
                    <?php 
                     $no = 1;
                    foreach ($lampiran as $key) {
                    ?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $key->nama }}</td>
                      <td>Tersedia</td>
                    </tr>
                    <?php
                     $no ++;
                     } ?>

                    </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                  </div>
                  {{-- <div class="row">
                  <div class="col-12 text-right">
                    <p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p>
            
                    <div>
                      <p>Sub - Total amount  :  $3,592.00</p>
                      <p>Tax (18%)  :  $646.56</p>
                      <p>Shipping  :  $110.44</p>
                    </div>
                    <div class="total-payment">
                      <h3><b>Total :</b> $4,349.00</h3>
                    </div>
            
                  </div>
                  <!-- /.col -->
                  </div> --}}
                  {{-- <div class="row no-print">
                  <div class="col-12">
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                    </button>
                  </div>
                  </div> --}}
                </section>
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

{{-- <script src="js/vendors.min.js"></script> --}}
  {{-- <script src="../assets/icons/feather-icons/feather.min.js"></script>	<script src="../assets/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js"></script> --}}

<!-- EduAdmin App -->
<script src="{{asset('assets/backend/js/template.js')}}"></script>

<script src="{{asset('assets/backend/js/pages/invoice.js')}}"></script>

<script src="{{asset('assets/backend/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js')}}"></script>
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