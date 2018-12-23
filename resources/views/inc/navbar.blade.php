<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="/">Veller</a>
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      @if(isset($logged_type))
      @if($logged_type === "applicant")
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Applications</a>
        </li>
      @endif
      @endif
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/support_ticket">contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/opportunity">Opportunities</a>
          @if(isset($logged_type))
          @if(!$logged_type)
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_login">{{ __('Login') }}</a>
            </li>
          @endif
          @endif
                @if(isset($logged_type))
                @if($logged_type === "org")
                <li class="nav-item">
                    <div class="dropdown">
                          <button class="btn btn-light " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Create Opportunity') }}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('scholarship.create')}}">Scholarship</a>
                            <a class="dropdown-item" href="{{route('internship.create')}}">Internship</a>
                            <a class="dropdown-item" href="{{route('exchange_programs.create')}}">Exchange_program</a>
                            <a class="dropdown-item" href="{{route('contests.create')}}">Contest</a>
                            <a class="dropdown-item" href="{{route('volunteering.create')}}">Volunteering</a>
                          </div>
                    </div>
                </li>
                @endif
                @endif
                @if(isset($logged_type))
                @if(!$logged_type)
                <li class="nav-item">
                    <div class="dropdown">
                          <button class="btn btn-light " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Register As') }}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('org.create')}}">Organization</a>
                            <a class="dropdown-item" href="{{route('users.create')}}">Applicant</a>
                          </div>
                    </div>
                </li>
                @else
                <li class="nav-item">
                      <a class="btn btn-light " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome {{$name}}
                      </a>
                </li>
                @endif
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href= "/logout">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
      </div>
  </div>
</nav>
