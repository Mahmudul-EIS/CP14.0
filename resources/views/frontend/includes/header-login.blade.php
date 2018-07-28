<body>

<div class="wrapper">
    <!-- header area -->
    <div class="get-header">

        <div class="navbar nav">
            <div class="container">
                <div class="col-sm-2 col-xs-2 padding-left-0">
                    <div class="get-humber-icon" id="toggle-class">
							<span class="navi-trigger navi-icon">
								<svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
							</span>
                    </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                    <div class="get-logo text-center">
                        <a href="{{ url('/') }}"><h2 class="get-logo-text"><span>Get</span>Wobo.</h2></a>
                    </div>
                </div>
                <div class="col-sm-5 col-xs-4 padding-right-0">
                    <div class="get-notification-area">
                        <div class="notification-badge">
                            <i class="fas fa-car"></i><span class="badge">2</span>
                        </div>
                        <!-- notification popupbar -->
                        <div class="get-notification-popupbar">
                            <h3 class="text-center">Notifications</h3>
                            <ul class="get-notificaton-list">
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text"><a href="#">Barry Alen</a> accept your booking request </span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text">Ride details has been updated for your ride by <a href="#">Jeny</a></span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text"><a href="#">Barry Alen</a> accept your booking request </span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text">Ride details has been updated for your ride by <a href="#">Jeny</a></span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text"><a href="#">Barry Alen</a> accept your booking request </span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text">Ride details has been updated for your ride by <a href="#">Jeny</a></span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text"><a href="#">Barry Alen</a> accept your booking request </span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text">Ride details has been updated for your ride by <a href="#">Jeny</a></span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text"><a href="#">Barry Alen</a> accept your booking request </span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="notificaton-text">
                                        <span class="get-notiline-text">Ride details has been updated for your ride by <a href="#">Jeny</a></span>
                                        <button class="btn btn-info get-notification">View My Bookings</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="get-user-login">
                            <div class="login-icon">
                                <img src="{{ asset('public/assets/frontend/img/user/user-1.jpg') }}" alt="">
                            </div>
                            <span class="get-loged-user"><form method="post" action="{{ url('/logout') }}">{{ csrf_field() }}<input type="submit" style="color: inherit; border: none; background: none; padding: 0;font: inherit;cursor: pointer;outline: inherit;" value="{{ Auth::user()->name }}"></form></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header area -->