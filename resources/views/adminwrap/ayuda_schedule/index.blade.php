<x-app-layout>
    <x-slot:title>
        Member
    </x-slot>

    <x-slot:jscript>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </x-slot>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            {{-- <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Member</li>
            </ol> --}}
        </div>
        {{-- <div class="col-md-7 align-self-center">
            <a href="{{ route('member.create') }}"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Create Member</a>
        </div> --}}
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Projects of the Month -->
    <!-- ============================================================== -->

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
    </div>
    @endif

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="card-title">Ayuda Schedules</h5>
                        </div>
                        <div class="ms-auto">
                            &nbsp;
                        </div>
                    </div>
                    <div class="table-responsive mt-3 no-wrap">
                        <table class="table vm no-th-brd pro-of-month">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Venue</th>
                                    <th>Amount</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                <tr>
                                   <td> {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('Y-m-d') }}</td>
                                    <td>{{ $schedule->ayuda->description }}</td>
                                    <td>{{ $schedule->venue }}</td>
                                    <td>{{ $schedule->amount }}</td>
                                    <td>{{ $schedule->notes }}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $schedules->appends(request()->input())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Members -->
    <!-- ============================================================== -->

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
    </script>
</x-app-layout>
