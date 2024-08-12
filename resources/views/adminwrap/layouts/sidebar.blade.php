<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
               {{--  <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i
                            class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li> --}}
                <li> <a class="waves-effect waves-dark" href="{{ route('member.index') }}" aria-expanded="false"><i
                            class="fa fa-user-circle-o"></i><span class="hide-menu">Member</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('ayuda.index') }}" aria-expanded="false"><i
                            class="fa fa-heartbeat"></i><span class="hide-menu">Ayuda</span></a>
                </li>
               {{--  <li> <a class="waves-effect waves-dark" href="{{ route('ayuda-schedule.index') }}" aria-expanded="false"><i
                    class="fa fa-calendar"></i><span class="hide-menu">Ayuda Schedule</span></a>
                </li> --}}
                <li> <a class="waves-effect waves-dark" href="{{ route('municity.index') }}" aria-expanded="false"><i
                    class="fa fa-building"></i><span class="hide-menu">City/Municipality</span></a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <li style="margin-bottom: 8px; margin-top:8px;"> <a class="waves-effect waves-dark" style="border-left: 3px solid transparent;" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fa fa-sign-out" style="width:38px; font-size:24px; display:inline-block; vertical-align:middle;"></i><span class="hide-menu">{{ __('Log Out') }}</span></a>
                </li>
            </form>
                {{-- <li> <a class="waves-effect waves-dark" href="icon-fontawesome.html" aria-expanded="false"><i
                            class="fa fa-smile-o"></i><span class="hide-menu">Icons</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i
                            class="fa fa-globe"></i><span class="hide-menu">Map</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i
                            class="fa fa-bookmark-o"></i><span class="hide-menu">Blank</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i
                            class="fa fa-question-circle"></i><span class="hide-menu">404</span></a>
                </li> --}}
            </ul>
            {{-- <div class="text-center mt-4">
                <a href="https://www.wrappixel.com/templates/adminwrap/"
                    class="btn waves-effect waves-light btn-info hidden-md-down text-white"> Upgrade to Pro</a>
            </div> --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
