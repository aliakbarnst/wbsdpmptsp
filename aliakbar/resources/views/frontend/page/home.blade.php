@extends('dashboard.main')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xl-8 col-12">
            <div class="box bg-primary-light">
                <div class="box-body d-flex px-0">
                    <div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url(../public/assets/backend/images/svg-icon/color-svg/custom-1.svg)">
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <h2>Welcome back, <strong>John!</strong></h2>

                                <p class="text-dark my-10 font-size-16">
                                    Your students complated <strong class="text-warning">80%</strong> of the tasks.
                                </p>
                                <p class="text-dark my-10 font-size-16">
                                    Progress is <strong class="text-warning">very good!</strong>
                                </p>
                            </div>
                            <div class="col-12 col-xl-5"></div>
                        </div>
                    </div>
                </div>
            </div>								
        </div>
    </div>
    <div class="row">
						<div class="col-12 col-xl-6">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Students Progress </h4>
									<ul class="box-controls pull-right d-md-flex d-none">
									  <li class="dropdown">
										<button class="btn btn-primary px-10 " data-toggle="dropdown" href="#">View List</button>
									  </li>
									</ul>
								</div>
								<div class="box-body">
									<div class="d-flex align-items-center mb-30 gap-items-3 justify-content-between">
										<div class="d-flex align-items-center font-weight-500">
											<div class="mr-15 w-50 d-table">
												<img src="../images/avatar/avatar-1.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
											</div>
											<div>
												<a href="#" class="text-dark hover-primary mb-5 d-block font-size-16">Amelia</a>
												<div class="w-200">
													<div class="progress progress-sm mb-0">
														<div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<h5 class="font-weight-600 mb-0 badge badge-pill badge-primary">75%</h5>
										</div>
									</div>
									<div class="d-flex align-items-center mb-30 gap-items-3 justify-content-between">
										<div class="d-flex align-items-center font-weight-500">
											<div class="mr-15 w-50 d-table">
												<img src="../images/avatar/avatar-2.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
											</div>
											<div>
												<a href="#" class="text-dark hover-primary mb-5 d-block font-size-16">Johen</a>
												<div class="w-200">
													<div class="progress progress-sm mb-0">
														<div class="progress-bar progress-bar-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100" style="width: 64%">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<h5 class="font-weight-600 mb-0 badge badge-pill badge-warning">64%</h5>
										</div>
									</div>
									<div class="d-flex align-items-center mb-30 gap-items-3 justify-content-between">
										<div class="d-flex align-items-center font-weight-500">
											<div class="mr-15 w-50 d-table">
												<img src="../images/avatar/avatar-1.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
											</div>
											<div>
												<a href="#" class="text-dark hover-primary mb-5 d-block font-size-16">Micheal</a>
												<div class="w-200">
													<div class="progress progress-sm mb-0">
														<div class="progress-bar progress-bar-info progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<h5 class="font-weight-600 mb-0 badge badge-pill badge-info">59%</h5>
										</div>
									</div>
									<div class="d-flex align-items-center mb-30 gap-items-3 justify-content-between">
										<div class="d-flex align-items-center font-weight-500">
											<div class="mr-15 w-50 d-table">
												<img src="../images/avatar/avatar-1.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
											</div>
											<div>
												<a href="#" class="text-dark hover-primary mb-5 d-block font-size-16">Amanda</a>
												<div class="w-200">
													<div class="progress progress-sm mb-0">
														<div class="progress-bar progress-bar-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<h5 class="font-weight-600 mb-0 badge badge-pill badge-danger">45%</h5>
										</div>
									</div>
									<div class="d-flex align-items-center gap-items-3 justify-content-between">
										<div class="d-flex align-items-center font-weight-500">
											<div class="mr-15 w-50 d-table">
												<img src="../images/avatar/avatar-1.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
											</div>
											<div>
												<a href="#" class="text-dark hover-primary mb-5 d-block font-size-16">Tyler</a>
												<div class="w-200">
													<div class="progress progress-sm mb-0">
														<div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<h5 class="font-weight-600 mb-0 badge badge-pill badge-primary">20%</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-6">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Working Hours</h4>
									<ul class="box-controls pull-right d-md-flex d-none">
									  <li class="dropdown">
										<button class="dropdown-toggle btn btn-warning-light px-10" data-toggle="dropdown" href="#">Today</button>										  
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item active" href="#">Today</a>
										  <a class="dropdown-item" href="#">Yesterday</a>
										  <a class="dropdown-item" href="#">Last week</a>
										  <a class="dropdown-item" href="#">Last month</a>
										</div>
									  </li>
									</ul>
								</div>
								<div class="box-body">
									<div id="revenue5" class="min-h-325"></div>
									<div class="d-flex justify-content-center">
										<p class="d-flex align-items-center font-weight-600 mx-20"><span class="badge badge-xl badge-dot badge-warning mr-20"></span> Progress</p>
										<p class="d-flex align-items-center font-weight-600 mx-20"><span class="badge badge-xl badge-dot badge-primary mr-20"></span> Done</p>
									</div>
								</div>
							</div>
						</div>
					</div>
</section>
@endsection
