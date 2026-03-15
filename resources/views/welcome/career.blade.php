@extends('welcome.layouts.app')

@section('title', 'Career - PT Gracia Pharmindo')

@section('content')
<section class="inner-header layer-overlay overlay-white-8" data-bg-img="{{ asset('assets/images/paralak_2.jpg') }}">
  <div class="container pt-60 pb-60">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12 text-left">
           <h3 class="title text-black">Career</h3>
          <ol class="breadcrumb text-left text-white mt-10">
            <li><a class="text-black" href="{{ url('/') }}">Home</a></li>
            <li class="active text-theme-colored">Job List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>      
</section>

<section>
  <div class="container pt-0">
    <div class="row">
      <div class="col-md-12">
        
        <div class="heading-line-bottom mt-0 mb-30">
          <h4 class="heading-title">Job List</h4>
        </div>
        
        @if(session('pesan'))
          <div class="alert alert-success" role="alert">
            {!! session('pesan') !!}
          </div>
        @endif 

        @if(isset($job_list) && $job_list->isNotEmpty())
          @foreach($job_list as $row)
            <div class="icon-box mb-0 p-0">
              <a href="#" class="icon icon-gray pull-left mb-0 mr-10">
                <i class="pe-7s-users"></i>
              </a>
              <h3 class="icon-box-title pt-15 mt-0 mb-40">{!! $row->jabatan !!}</h3>
              <hr>
              
              <div class="text-gray">{!! $row->jobdes !!}</div>
              
              <form class="form-horizontal" action="{{ url('/job-detail') }}" method="post">
                  @csrf
                  <input type="hidden" name="id_loker" value="{{ $row->id_loker }}" />
                  <button type="submit" class="btn btn-dark btn-sm mt-15">Detail</button>
              </form>
            </div>
            <br /><br />
          @endforeach
        @else
          <div class="alert alert-info">
             Saat ini belum ada lowongan pekerjaan yang tersedia.
          </div>
        @endif
        
      </div>
    </div>
  </div>
</section>
@endsection