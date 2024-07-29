<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i
                            class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('member.index') }}" aria-expanded="false"><i
                            class="fa fa-user-circle-o"></i><span class="hide-menu">Member</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('ayuda.index') }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Ayuda</span></a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    
               
                <li> <a class="waves-effect waves-dark" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();
                    this.closest('form').submit();"><span class="hide-menu">{{ __('Log Out') }}</span></a>
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