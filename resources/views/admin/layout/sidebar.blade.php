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
            {{-- <li class="nav-item">
              <a class="nav-link {{ routeActive('consultant.index') }}{{ routeActive('consultant.create') }}{{ routeActive('consultant.edit') }}" href="{{ route('consultant.index') }}"  aria-expanded="false">
                <i class="fas fa-users"></i>Consultant
              </a>
            </li> --}}
            @if(auth()->user()->role_id == 1)
            <li class="nav-item">
              <a class="nav-link {{ routeActive('setting.index') }}{{ routeActive('setting.create') }}{{ routeActive('setting.edit') }}" href="{{ route('setting.index') }}"  aria-expanded="false">
                <i class="fa fa-cog"></i>Setting
              </a>
            </li>
            @endif
            {{-- @if(auth()->user()->role_id == 2) --}}
            <li class="nav-item">
              <a class="nav-link {{ routeActive('members.index') }}{{ routeActive('members.create') }}{{ routeActive('members.edit') }}{{ routeActive('members.destroy') }}" href="{{ route('members.index') }}" aria-expanded="false">
                <i class="fa fa-users"></i>Members
              </a>
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
                    <i class="fas fa-bell"></i>Notification
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" aria-expanded="false">
                    <i class="fas fa-user-check mr-2"></i>Complete Kyc
                </a>
              </li>
            @endif
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}" aria-expanded="false">
                    <i class="fas fa-power-off mr-2"></i>Logout
                </a>
              </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
