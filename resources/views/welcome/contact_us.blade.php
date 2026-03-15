@extends('welcome.layouts.app')

@section('title', 'Contact Us - PT Gracia Pharmindo')

@section('content')
<section class="inner-header divider" data-bg-img="{{ asset('assets/images/gracia_marketing.jpg') }}">
  <div class="container pt-60 pb-590">
    <div class="section-content">
      <div class="row"> 
        <div class="col-md-12 xs-text-center">
          <h3 class="title text-black">National Branch</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="divider">
  <div class="container pt-sm-10 pb-sm-30">
    <div class="row pt-30">
      <div class="col-md-4">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="icon-box left media bg-deep p-30 mb-20"> 
              <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
              <div class="media-body"> <strong>OFFICE LOCATION</strong>
                <p>Jl. Baranangsiang Komp. ITC Kosambi Blok G-27<br>
                Bandung 40112<br>Indonesia</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="icon-box left media bg-deep p-30 mb-20"> 
              <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
              <div class="media-body"> <strong>CONTACT NUMBER</strong>
                <p>+62-22-422 2208</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="icon-box left media bg-deep p-30 mb-20"> 
              <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
              <div class="media-body"> <strong>CONTACT E-MAIL</strong>
                <p>grapha@gracia.co.id</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-8">
        @if(session('pesan'))
          <div class="alert alert-success" role="alert">
            {!! session('pesan') !!}
          </div>
        @endif 
      
        <h2 class="mt-0 mb-20 line-height-1">Interested in discussing?</h2>
        
        <form id="contact_form" name="contact_form" class="" action="{{ url('/sendmail') }}" method="post">
          @csrf
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="form_name">Name <small>*</small></label>
                <input id="form_name" name="form_name" class="form-control" type="text" placeholder="Enter Name" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="form_email">Email <small>*</small></label>
                <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email" required>
              </div>
            </div>
          </div>
            
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="form_subject">Subject <small>*</small></label>
                <input id="form_subject" name="form_subject" class="form-control required" type="text" placeholder="Enter Subject" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="form_phone">Phone</label>
                <input id="form_phone" name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="form_message">Message</label>
            <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Enter Message" required></textarea>
          </div>
          
          <div class="form-group">
            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
            <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container-fluid pt-0 pb-0">
    <div class="row">
      <div 
        id="map-canvas-multipointer"
        data-mapstyle="default"
        data-height="400"
        data-zoom="12"
        data-marker="{{ asset('assets/images/map-marker.png') }}">
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYWE4mHmR9GyPsHSOVZrSCOOljk8DU9B4"></script>
  <script src="{{ asset('assets/js/google-map-init-multilocation.js') }}"></script>
@endpush