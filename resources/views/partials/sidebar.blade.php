<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  @if (Auth::user()->profile_picture)
                    <img src="{{ route('public.profile-picture') }}" alt="profile image">
                  @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                  <div>
                    <small class="designation text-muted">{{ (Auth::user()->user_type == 1) ? "Admin" : "User" }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item {{ Request::is('home') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-one" aria-expanded="false" aria-controls="ui-basic-one">
              <i class="menu-icon mdi mdi-group"></i>
              <span class="menu-title">Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-one">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::to('profile')}}">Show Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::to('profile/edit')}}">Update Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </ul>
            </div>
          </li>

          @if(Auth::user()->isAdministrator())
            <li class="nav-item">
              <a class="nav-link" href="{{ action('UserController@showTranslate') }}">
                <i class="menu-icon mdi mdi-google-translate"></i>
                <span class="menu-title">Translations</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ action('UsersManagementController@index') }}">Show All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ action('UsersManagementController@create') }}">Create New</a>
                  </li>
                </ul>
              </div>
            </li>
          @endif
          @if(Auth::user()->isUser())
            <li class="nav-item {{ Request::is('translations') ? 'active' : null }}">
              <a class="nav-link" href="{{ action('UserController@showTranslate') }}">
                <i class="menu-icon mdi mdi-google-translate"></i>
                <span class="menu-title">Translations</span>
              </a>
            </li>
          @endif
          </li>
        </ul>
      </nav>