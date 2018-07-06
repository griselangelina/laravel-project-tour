    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-blue fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ asset('/') }}">gloo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ asset('/') }}about">Tentang Kami</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tour
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="{{ asset('/') }}honeymoon">Honeymoon</a>
                <a class="dropdown-item" href="{{ asset('/') }}budget">Budget Tour</a>
                <a class="dropdown-item" href="{{ asset('/') }}individual">Individual Tour</a>
                <a class="dropdown-item" href="{{ asset('/') }}open-trip">Open Trip</a>
              </div>
            </li>
			 <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Travel Support
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="{{ asset('/') }}wifi">Wifi</a>
                <a class="dropdown-item" href="{{ asset('/') }}attraction">Attraction Ticket</a>
                <a class="dropdown-item" href="{{ asset('/') }}travel-insurance">Travel Insurance</a>
                <a class="dropdown-item" href="{{ asset('/') }}visa">Visa</a>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="{{ asset('/') }}promo">Promo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bantuan
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="{{ asset('/') }}askquestion">Ajukan Pertanyaan</a>
                <a class="dropdown-item" href="{{ asset('/') }}faq">FAQ</a>
                <a class="dropdown-item" href="{{ asset('/') }}contact">Hubungi Kami</a>
              </div>
            </li>
			 <li class="nav-item">
              <a class="nav-link" href="{{ asset('/') }}custom-trip">Custom Trip</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>