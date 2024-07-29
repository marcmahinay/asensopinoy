<x-app-layout>
    <x-slot:title>
        Member
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
        <div class="col-md-7 align-self-center">
            <a href="{{ route('member.create') }}"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Create Member</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Projects of the Month -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="card-title">List of Members</h5>
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
                                    <th>Birthdate</th>
                                    <th>Email</th>
                                    <th>Municipality</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                <tr>
                                    <td style="width:100px;"> <a href="{{ route('member.show', $member) }}"><span class="round"><img src="{{ $member->image_url ? asset('storage/member/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}"
                                        alt="user" width="50"></span></a>
                                    </td>
                                  
                                    <td>
                                        <h6>{{ $member->lastname }}, {{ $member->firstname }}</h6><small class="text-muted">{{ $member->id }}</small>
                                    </td>
                                    <td>{{ $member->birthdate }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->barangay->name }}, {{ $member->barangay->municity->name }}</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $members->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Members -->
    <!-- ============================================================== -->
</x-app-layout>
