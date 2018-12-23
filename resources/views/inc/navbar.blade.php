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
        @if(isset($logged_type))
        @if($logged_type)
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('support_tickets.create')}}">contact us</a>
        </li>
        @endif
        @endif 
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="/opportunity">Opportunities</a>
          @if(isset($logged_type))
          @if(!$logged_type)
            <li class="nav-item">
                    <div class="dropdown">
                          <button class="btn btn-light " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Login') }}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/org_login">org_login</a>
                            <a class="dropdown-item" href="/sup_login">sup_login</a>
                            <a class="dropdown-item" href="/user_login">user_login</a>
                          </div>
                    </div>
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
                @if(isset($logged_type))
                @if($logged_type)
                <li class="nav-item">
                    <div class="dropdown">
                          <button class="btn btn-light " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('profile') }}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if(isset($logged_type))
                            @if($logged_type == "applicant")
                                <a class="dropdown-item" href="{{route('users.show',$logged_id)}}">Profile</a>
                            @endif
                            @if($logged_type == "org")
                                <a class="dropdown-item" href="{{route('org.show',$logged_id)}}">Profile</a>
                            @endif
                            @if($logged_type == "sup")
                                <a class="dropdown-item" href="{{route('supervisors.show',$logged_id)}}">Profile</a>
                            @endif
                            @endif
                            <a class="dropdown-item" href="/logout">logout</a>
                          </div>
                    </div>
                </li>
                @endif
                @endif
            </ul>
      </div>
  </div>
</nav>
