<x-app-layout>
    <x-slot:title>
       {{ $member->lastname }},  {{ $member->firstname }}
    </x-slot>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
           {{--  <h3 class="text-themecolor">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol> --}}
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('member.update') }}"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Edit</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="{{ $member->image_url ? asset('storage/member/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}"
                        alt="user" class="round" style="width: 150px; height: 150px">
                        <h4 class="card-title mt-2">{{ $member->firstname }} {{ $member->lastname }}</h4>
                        <h6 class="card-subtitle">{{ $member->barangay->name }}, {{ $member->barangay->municity->name }}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div><a href="javascript:void(0)" class="link">Assistance Received :
                                    <font class="font-medium">{{ $member->ayudas->count() }}</font>
                                </a></div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card card-body mailbox">
                <h5 class="card-title">Assistance Received</h5>
                <div class="message-center ps ps--theme_default" style="height: auto" data-ps-id="faa47a73-43b0-7336-37f2-ee997b343ffb">
                    <!-- Message -->
                    @forelse($member->ayudas as $ayuda)
                         <!-- Message -->
                        <a href="#">
                            <div class="btn btn-warning btn-circle"><i class="fa fa-heartbeat"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">{{ $ayuda->description }}</h6> {{-- <span class="mail-desc">Just a
                                    reminder that you have event</span> --}} <span class="time">{{ $ayuda->pivot->date_availed }}</span>
                            </div>
                        </a>
                    @empty
                        <li>No ayudas availed.</li>
                    @endforelse
                    {{-- <a href="#">
                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0">Luanch Admin</h6> <span class="mail-desc">Just see
                                the my new admin!</span>
                            <span class="time">9:30 AM</span>
                        </div>
                    </a>

                    <!-- Message -->
                    <a href="#">
                        <div class="btn btn-info btn-circle"><i class="fa fa-cog text-white"></i></div>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0">Settings</h6> <span class="mail-desc">You can
                                customize this template as you
                                want</span> <span class="time">9:08 AM</span>
                        </div>
                    </a>
                    <!-- Message -->
                    <a href="#">
                        <div class="btn btn-primary btn-circle"><i class="fa fa-user"></i></div>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0">Pavan kumar</h6> <span class="mail-desc">Just see
                                the my admin!</span> <span class="time">9:02 AM</span>
                        </div>
                    </a>
                    <!-- Message -->
                    <a href="#">
                        <div class="btn btn-info btn-circle"><i class="fa fa-cog text-white"></i></div>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0">Customize Themes</h6> <span class="mail-desc">You
                                can customize this template as you
                                want</span> <span class="time">9:08 AM</span>
                        </div>
                    </a>
                    <!-- Message -->
                    <a href="#">
                        <div class="btn btn-primary btn-circle"><i class="fa fa-user"></i></div>
                        <div class="mail-contnet">
                            <h6 class="text-dark font-medium mb-0">Pavan kumar</h6> <span class="mail-desc">Just see
                                the my admin!</span> <span class="time">9:02 AM</span>
                        </div>
                    </a> --}}
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</x-app-layout>
