<x-app-layout>
    <x-slot:title>
        Search Member {{$query}}
    </x-slot>

    <x-slot:jscript>

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
                            <h5 class="card-title">Search query : {{ $query }}</h5>
                        </div>
                        <div class="ms-auto">
                            &nbsp;
                        </div>
                    </div>
                    <div class="table-responsive mt-3 no-wrap">
                        <table class="table vm no-th-brd pro-of-month">
                            <thead>
                                <tr>
                                    <th colspan="2">Name</th>
                                    <th>Municipality</th>
                                    <th>Sex</th>
                                    <th>Civil Status</th>
                                    <th>Member Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                <tr>
                                    <td style="width:100px;"> <a href="{{ route('member.show', $member->asenso_id) }}"><span class="round"><img src="{{ $member->image_url ? asset('storage/member/' . $member->barangay->municity->name . '/' . $member->barangay->name . '/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}"
                                        alt="user" width="50"></span></a>
                                    </td>

                                    <td><a href="{{ route('member.show', $member->asenso_id) }}">
                                        <h6>{{ ucfirst(strtolower($member->lastname)) }}
                                            , {{ ucfirst(strtolower($member->firstname)) }} {{ substr($member->middlename,0,1) . "." }}
                                        </h6><small class="text-muted">{{ $member->asenso_id }}</small>
                                        </a>
                                    </td>
                                    <td>{{ $member->barangay->name }}, {{ $member->barangay->municity->name }}</td>
                                    <td>{{ $member->sex }}</td>
                                    <td>{{ $member->civil_status }}</td>
                                    <td><span
                                    class="badge {{ $member->status == 1 ? 'bg-warning' : 'bg-danger' }}"
                                    id="status-badge-{{ $member->id }}"
                                    onclick="confirmToggleStatus({{ $member->id }})"
                                    style="cursor: pointer;">
                                    {{ $member->status == 1 ? 'Active' : 'Inactive' }}
                                </span></td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $members->appends(request()->input())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Members -->
    <!-- ============================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    </script>
</x-app-layout>
