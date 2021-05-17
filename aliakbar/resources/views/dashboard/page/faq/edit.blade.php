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
                <form class="form" method="POST" action="{{ url('dashboard/faq/update/'.$edit->id)}}">
                    @csrf @method('PATCH')
                    <div class="box-body">
                      <div class="row">
                         <div class="col-md-12">
                           <div class="form-group @error('pertanyaan') error @enderror">
                             <label>Pertanyaan <span class="text-danger">*</span></label>
                             <textarea rows="5" name="pertanyaan" class="form-control" placeholder="Masukan Pertanyaan yang sering ditanyakan">{{ old('pertanyaan',$edit->pertanyaan) }}</textarea>
                             @error('nama_bidang')
                             <div class="help-block"><ul role="alert"><li>{{$message}}</li></ul></div>
                             @enderror
                           </div>
                         </div>
                       </div>
                       
                       <div class="form-group">
                         <label>Jawaban</label>
                         <textarea rows="5" name="jawaban" class="form-control" placeholder="Masukan jawaban dari pertanyaan tersebut">{{ old('jawaban',$edit->jawaban) }}</textarea>
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