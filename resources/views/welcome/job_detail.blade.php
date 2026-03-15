@extends('welcome.layouts.app')

@section('title', 'Job Details - PT Gracia Pharmindo')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8"
        data-bg-img="{{ asset('assets/images/paralak_2.jpg') }}">
        <div class="container pt-60 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">Job Details</h3>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active text-theme-colored">Job Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        @if ($job_detail)
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="job-overview">
                            <dl class="dl-horizontal">
                                <dt><i class="fa fa-calendar text-theme-colored mt-5 font-15"></i></dt>
                                <dd>
                                    <h5 class="mt-0">Date Posted:</h5>
                                    <p>{{ \Carbon\Carbon::parse($job_detail->tgl_upload)->format('d F Y') }}</p>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt><i class="fa fa-map-marker text-theme-colored mt-5 font-15"></i></dt>
                                <dd>
                                    <h5 class="mt-0">Location:</h5>
                                    <p>{{ $job_detail->penempatan }}</p>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt><i class="fa fa-user text-theme-colored mt-5 font-15"></i></dt>
                                <dd>
                                    <h5 class="mt-0">Job Title:</h5>
                                    <p>{!! $job_detail->jabatan !!}</p>
                                </dd>
                            </dl>

                            <dl class="dl-horizontal">
                                <dt><i class="fa fa-mail-forward text-theme-colored mt-5 font-15"></i></dt>
                                <dd>
                                    <h5 class="mt-0">Send To:</h5>
                                    <div>{!! $job_detail->alamat_surat !!}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="icon-box mb-0 p-0">
                            <a href="#" class="icon icon-gray pull-left mb-0 mr-10">
                                <i class="pe-7s-users"></i>
                            </a>
                            <h3 class="icon-box-title pt-15 mt-0 mb-40">{!! $job_detail->jabatan !!}</h3>
                            <hr>
                            <div class="text-gray">{!! $job_detail->jobdes !!}</div>
                        </div>

                        <h5 class="mt-30">Requirements:</h5>
                        <div>
                            {!! $job_detail->kualifikasi !!}
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="container">
                <div class="alert alert-warning text-center">
                    Data pekerjaan tidak ditemukan atau sudah tidak tersedia.
                </div>
            </div>
        @endif
    </section>
@endsection
