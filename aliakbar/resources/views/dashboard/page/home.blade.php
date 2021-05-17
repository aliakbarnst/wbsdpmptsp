@extends('dashboard.main')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="box bg-primary-light">
                <div class="box-body d-flex px-0">
                    <div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url(../public/assets/backend/images/svg-icon/color-svg/custom-1.svg)">
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <h2>Selamat Datang, <strong>{{ ucwords(Auth::user()->nama) }}</strong></h2>

                                <p class="text-dark my-10 font-size-16">
                                    Tetap semangat dan jangan lupa membaca <strong class="text-warning">Basmalah</strong>
                                </p>
                                <p class="text-dark my-10 font-size-16">
                                <strong class="text-warning">Semoga Allah memberikan banyak kemudahan untuk kita. Aamiin</strong>
                                </p>
                            </div>
                            <div class="col-12 col-xl-5"></div>
                        </div>
                    </div>
                </div>
            </div>								
        </div>
    </div>
</section>
@endsection
