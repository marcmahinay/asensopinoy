<x-app-layout>
    <x-slot:title>
        {{$barangay->name}}
    </x-slot>

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('municity.index')}}"> Cities/Municipalities</a></li>
                <li class="breadcrumb-item"><a href="{{route('municity.show',$barangay->municity_id)}}"> {{$barangay->municity->name}}</a></li>
                <li class="breadcrumb-item active"> {{$barangay->name}}</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('member.create',$barangay) }}"
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
                            <h5 class="card-title">Barangay {{$barangay->name}} List of Members</h5>
                        </div>
                        <div class="ms-auto">
                            &nbsp;
                        </div>
                    </div>
                    <div class="table-responsive mt-3 no-wrap">
                        <table class="table vm no-th-brd pro-of-month">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th colspan="2">Name</th>
                                    <th>Municipality</th>
                                    <th>Birthdate</th>
                                    <th>Sex</th>
                                    <th>Civil Status</th>
                                    <th>Mobile No</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangay->members as $index => $member)
                                <tr>
                                    <td>{{$index+1}}</td>
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
                                    <td>{{ $member->birthdate }}</td>
                                    <td>{{ $member->sex }}</td>
                                    <td>{{ $member->civil_status }}</td>
                                    <td>{{ $member->mobile_no }}</td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $members->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Members -->
    <!-- ============================================================== -->
</x-app-layout>
