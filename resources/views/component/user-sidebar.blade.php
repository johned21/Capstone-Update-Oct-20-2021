<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <div class="logo-name">
                Account Profile
            </div>
        </div>
        <i class='bx bx-menu' id="btn-menu"></i>
    </div>

    <ul class="nav-list">
        <li class="" style="display: none">
            <a>
                <i class='bx bx-search'></i>
            </a>
        </li>

        <div class="profile-images-card">

            <div class="profile-images">
                @if (auth()->user()->profile_pic != null)
                <img src="{{asset("images/".auth()->user()->profile_pic)}}" id="upload-imgg">
                @else
                <img src="{{asset('img/pp.png')}}" id="upload-imgg">
                @endif
                
            </div>

            <h4>{{ auth()->user()->firstName }}</h4>

        </div>

        <li>
            <a href="" class="mt-1">
                <i class='bx bx-grid-alt'></i>
                <span class="links-name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a href="">
                <i class='bx bx-check-square'></i>
                <span class="links-name">Enrollment</span>
            </a>
            <span class="tooltip">Enrollment</span>
        </li>

    </ul>

    <a class="logout-content fixed-bottom" href="{{ route('logout') }}">
        <div class="logout">
            <div class="logout-details">
                <div class="logout-name">Logout</div>
            </div>
            <i class='bx bx-log-out' id="logout"></i>
        </div>
    </a>


    <script>
	
</script>
</div>