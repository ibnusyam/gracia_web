<div class="header-nav">
  <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
    <div class="container">
      <nav id="menuzord-right" class="menuzord blue bg-lightest">
        <a class="menuzord-brand pull-left flip" href="{{ url('/') }}">
          <img src="{{ asset('assets/images/logo-wide.png') }}" alt="PT. Gracia Pharmindo">
        </a>
        
        <ul class="menuzord-menu">
          <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}">Home</a> 
          </li>
          
          <li class="{{ request()->is('company-profile') ? 'active' : '' }}">
            <a href="{{ url('company-profile') }}">About us</a> 
          </li>
          
          <li class="{{ request()->is('product-list*') ? 'active' : '' }}">
            <a href="#">Product</a>
            <ul class="dropdown">
              @if(isset($kategori_product) && $kategori_product->isNotEmpty())
                @foreach($kategori_product as $row) 
                  <li>
                    <a href="{{ url('product-list/' . $row->kode_golongan) }}">
                      {{ ucwords(strtolower($row->golongan)) }}
                    </a>
                  </li>
                @endforeach
              @endif
            </ul>
          </li>
             
          <li class="{{ request()->is('job-list') ? 'active' : '' }}">
            <a href="{{ url('job-list') }}">Career</a>
          </li>          
         
          <li class="{{ request()->is('contact') ? 'active' : '' }}">
            <a href="{{ url('contact') }}">Contact Us</a>
          </li>
          
        </ul>
      </nav>
    </div>
  </div>
</div>