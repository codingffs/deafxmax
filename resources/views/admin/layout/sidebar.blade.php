<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none text-white" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ routeActive('dashboard') }} " href="{{ route('dashboard') }}"  aria-expanded="false">
                <i class="fa fa-fw fa-user-circle"></i>Dashboard
              </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-users"></i>Members</a>
                <div id="submenu-2" class="collapse submenu">
                  <ul class="nav flex-column">
                    {{-- <li class="nav-item">
                        <a class="nav-link " href="{{ route('members.create') }}">Add Member</a>
                      </li> --}}
                      @if(auth()->user()->role_id == 1)
                       <li class="nav-item">
                        <a class="nav-link " href="{{ route('members.create') }}">Add Member</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}" aria-expanded="false">Members List</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}" aria-expanded="false">Members List</a>
                    </li>
                    @endif
                    @if(auth()->user()->role_id == 2)
                      <li class="nav-item">
                        <a class="nav-link " href="{{ route('direct_list_data') }}"> Members Direct List</a>
                      </li>
                      @endif
                  </ul>
                </div>
              </li>
            <li class="nav-item">
                <a class="nav-link {{ routeActive('depositdetails.index') }}{{ routeActive('depositdetails.create') }}" href="{{ route('depositdetails.index') }}" aria-expanded="false">
                    <i class="fas fa-hand-holding-usd"></i>Deposit Details
                </a>
              </li>
              @if(auth()->user()->role_id == 2)
              <li class="nav-item">
                <a class="nav-link {{ routeActive('withdraw.index') }}{{ routeActive('withdraw.create') }}" href="{{ route('withdraw.index') }}" aria-expanded="false">
                    <i class="fa fa-money"></i>WithDraw Details
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('bank_details') }}" aria-expanded="false"><i class="fa fa-bank"></i>My Bank Details
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('kyc.create') }}" aria-expanded="false">
                    <i class="fas fa-handshake fa-fw"></i>Support
                </a>
              </li>
              @if(getKycFlag() == 1)
              <li class="nav-item">
                <a class="nav-link " href="{{ route('kyc.create') }}" aria-expanded="false">
                    <i class="fas fa-user-check mr-2"></i>Kyc Create
                </a>
              </li>
              @endif
            @endif
            @if(auth()->user()->role_id == 1)
              <li class="nav-item">
                <a class="nav-link {{ routeActive('notification') }}" href="{{ route('notification') }}" aria-expanded="false">
                    <i class="fas fa-eye"></i> View WithDraw
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" aria-expanded="false">
                    <i class="fas fa-user-check mr-2"></i>Complete Kyc
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ routeActive('setting.index') }}{{ routeActive('setting.create') }}{{ routeActive('setting.edit') }}" href="{{ route('setting.index') }}"  aria-expanded="false">
                  <i class="fa fa-cog"></i>Setting
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ routeActive('news.index') }}{{ routeActive('news.create') }}{{ routeActive('news.edit') }}" href="{{ route('news.index') }}"  aria-expanded="false">
                    <i class="fas fa-newspaper"></i>News
                </a>
              </li>
            @endif
            <li class="nav-item">
                <a class="nav-link " href="{{ auth()->user()->role_id == 1 ? route('admin_logout') : route('member_logout') }}" aria-expanded="false">
                    <i class="fas fa-power-off mr-2"></i>Logout
                </a>
              </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
