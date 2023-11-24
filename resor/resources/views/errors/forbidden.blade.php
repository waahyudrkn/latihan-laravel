@extends('template.dashboard')

@section('template')

	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
						<img src="../../../assets/images/others/404.svg" class="img-fluid mb-2" alt="404">
						<h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">403</h1>
						<h4 class="mb-2">{{ __('403 Forbidden') }}</h4>
						<h6 class="text-muted mb-3 text-center">{{ __('You do not have permission to access this resource.') }}</h6>
						<a href="{{ route('maindashboard') }}">Kembali</a>
					</div>
				</div>

			</div>
		</div>
	</div>


@endsection