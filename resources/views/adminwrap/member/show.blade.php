<x-app-layout>
    <x-slot:title>
       {{ $member->lastname }},  {{ $member->firstname }}
    </x-slot>

    <x-slot:jscript>

    </x-slot>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Member Assistance</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Member</a></li>
                <li class="breadcrumb-item active">{{ $member->lastname }}, {{ $member->firstname }} {{ substr($member->lastname,0,1)."." }}</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('member.edit', $member) }}"
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
                    <div style="display: inline; text-align:center">
                        <div class="col-4" style="display: inline; margin-right:50px;"><a href="javascript:void(0)" class="link"><i
                                    class="fa fa-heartbeat" style="color:#ff9041"></i>
                                <font class="font-medium" style="color:#ff9041">{{ $member->ayudas->count() }}</font>
                            </a></div>
                        {{-- <div class="col-4" style="display: inline"><a href="javascript:void(0)" class="link"><i
                                    class="fa fa-edit"></i>
                                <font class="font-medium">54</font>
                            </a></div> --}}
                    </div>
                    <center class="mt-4">

                        <img src="{{ $member->image_url ? asset('storage/member/' . $member->barangay->municity->name . '/' . $member->barangay->name . '/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}"
                        alt="user" class="round" style="width: 150px; height: 150px; border:3px solid #f1f4f5;">
                        <h4 class="card-title mt-2">{{ ucfirst(strtolower($member->firstname)) }} {{ ucfirst(strtolower($member->lastname)) }}</h4>
                        <h6 class="card-subtitle">{{ $member->barangay->name }}, {{ $member->barangay->municity->name }}</h6>
                        <h6 class="card-subtitle">Sex: {{ $member->sex }}</h6>
                        {{-- <h6
                                    class="badge {{ $member->status == 1 ? 'bg-warning' : 'bg-danger' }}"
                                    id="status-badge-{{ $member->id }}"
                                    onclick="confirmToggleStatus({{ $member->id }})"
                                    style="cursor: pointer;">
                                    {{ $member->status == 1 ? 'Active' : 'Inactive' }}
                        </h6> --}}

                       {{--  <div class="message-center ps ps--theme_default" style="height: auto" data-ps-id="faa47a73-43b0-7336-37f2-ee997b343ffb">
                            <!-- Message -->
                            @foreach($schedules as $schedule)
                                 <!-- Message -->
                                 <a href="#" class="grant-ayuda" data-schedule-id="{{ $schedule->id }}" data-member-id="{{ $member->id }}">
                                    <div class="btn btn-warning btn-circle"><i class="fa fa-heartbeat"></i></div>
                                    <div class="mail-contnet">
                                        <h6 class="text-dark font-medium mb-0">{{ $schedule->ayuda->description }}</h6>
                                        <span class="mail-desc">{{ $schedule->notes }} {{ '₱' . number_format($schedule->amount, 2) }}</span>
                                        <span class="time">{{ $schedule->schedule_date }}</span>
                                    </div>
                                </a>
                            @endforeach



                    </div> --}}
                        {{-- <div class="row text-center justify-content-md-center">
                            <div><a href="javascript:void(0)" class="link">Assistance Received :
                                    <font class="font-medium">{{ $member->ayudas->count() }}</font>
                                </a></div>
                        </div> --}}

                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card card-body mailbox">
                <h5 class="card-title">Assistance Received @if($member->ayudas->count()) {{ ": " . $member->ayudas->count() }} @endif</h5>
                <div class="message-center ps ps--theme_default" style="height: auto" data-ps-id="faa47a73-43b0-7336-37f2-ee997b343ffb">
                    <!-- Message -->
                    @forelse($member->ayudas as $ayuda)
                         <!-- Message -->
                        <a href="#">
                            <div class="btn btn-warning btn-circle"><i class="fa fa-heartbeat"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">{{ $ayuda->description }}</h6> <span class="mail-desc">{{$ayuda->pivot->notes}} {{ '₱' . number_format($ayuda->pivot->amount, 2) }} </span> <span class="time">{{ $ayuda->pivot->date_availed }}</span>
                            </div>
                        </a>
                    @empty
                        <li>No Assistance Received.</li>
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
  {{--   <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card card-body mailbox">
                <h5 class="card-title">Schedule Ayuda</h5>
                <div class="message-center ps ps--theme_default" style="height: auto" data-ps-id="faa47a73-43b0-7336-37f2-ee997b343ffb">
                    <!-- Message -->
                    @forelse($schedules as $schedule)
                         <!-- Message -->
                        <a href="#">
                            <div class="btn btn-warning btn-circle"><i class="fa fa-heartbeat"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">{{ $schedule->ayuda->description }}</h6> <span class="mail-desc">{{$schedule->notes}} {{ '₱' . number_format($schedule->amount, 2) }} </span> <span class="time">{{ $schedule->schedule_date }}</span>
                            </div>
                        </a>
                    @empty
                        <li>No Assistance Received.</li>
                    @endforelse

            </div>
        </div>
    </div> --}}
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
   {{--  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function confirmToggleStatus(memberId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to change the status of this member.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    toggleStatus(memberId);
                }
            })
        }

        function toggleStatus(memberId) {
            $.ajax({
                url: "/member/" + memberId + "/change-status",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let badge = $('#status-badge-' + memberId);
                    if (response.status) {
                        badge.removeClass('bg-danger').addClass('bg-warning').text('Active');
                    } else {
                        badge.removeClass('bg-warning').addClass('bg-danger').text('Inactive');
                    }
                },
                error: function() {
                    alert('There was an error updating the status.');
                }
            });
        }
    </script> --}}
</x-app-layout>
