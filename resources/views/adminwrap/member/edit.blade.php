<x-app-layout>
    <x-slot:title>
       {{ $member->lastname }},  {{ $member->firstname }}
    </x-slot>
    <x-slot:jscript>

    </x-slot>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Member Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Member</a></li>
                <li class="breadcrumb-item active">{{ $member->lastname }}, {{ $member->firstname }} {{ substr($member->lastname,0,1)."." }}</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            {{-- <a href="{{ route('member.update') }}"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Edit</a> --}}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    @if (session('success'))
    <div class="alert alert-success">
        <ul>
            <li> Member updated successfully.</li>
        </ul>
    </div>

    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div style="display: inline; text-align:center">
                        <div class="col-4" style="display: inline; margin-right:50px;"><a href="{{ route('member.show', $member) }}" class="link"><i
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
                        <h6
                                    class="badge {{ $member->status == 1 ? 'bg-warning' : 'bg-danger' }}"
                                    id="status-badge-{{ $member->id }}"
                                    onclick="confirmToggleStatus({{ $member->id }})"
                                    style="cursor: pointer;">
                                    {{ $member->status == 1 ? 'Active' : 'Inactive' }}
                    </h6>
                        {{-- <div class="row text-center justify-content-md-center">
                            <div><a href="javascript:void(0)" class="link">Assistance Received :
                                    <font class="font-medium">{{ $member->ayudas->count() }}</font>
                                </a></div>
                        </div> --}}

                    </center>
                </div>
            </div>
        </div>
         <!-- Column -->
         <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tab panes -->
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ route('member.update', $member->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Asenso ID</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="{{ $member->asenso_id }}"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Barangay, Municipality/City</label>
                            <div class="col-sm-12">
                                <input type="text" data-id="{{ $member->barangay_id }}" value="{{ $member->barangay->name }}, {{ $member->barangay->municity->name }}"
                                    class="form-control form-control-line" disabled name="barangay_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member->lastname }}" name="lastname"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">First Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="First Name" value="{{ $member->firstname }}" name="firstname"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Middle Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Middle Name" value="{{ $member->middlename }}" name="middlename"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Present Address</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Present Address" value="{{ $member->present_address }}" name="present_address"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Birth Date</label>
                            <div class="col-md-12">
                                <input type="date" placeholder="Birth Date" value="{{ $member->birthdate }}" name="birthdate"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Birth Place</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Birth Place" value="{{ $member->birthplace }}" name="birthplace"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Sex</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" value="{{ $member->sex }}" name="sex">
                                    <option value="F" {{ $member->sex == 'F' ? 'selected': '' }}>Female</option>
                                    <option value="M" {{ $member->sex == 'M' ? 'selected': '' }}>Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Civil Status</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="civil_status">
                                    <option value="SINGLE" {{ $member->civil_status == 'SINGLE' ? 'selected' : '' }}>Single</option>
                                    <option value="MARRIED" {{ $member->civil_status == 'MARRIED' ? 'selected' : '' }}>Married</option>
                                    <option value="SEPARATED" {{ $member->civil_status == 'SEPARATED' ? 'selected' : '' }}>Separated</option>
                                    <option value="WIDOWED" {{ $member->civil_status == 'WIDOWED' ? 'selected' : '' }}>Widowed</option>
                                    <option value="ANNULED" {{ $member->civil_status == 'ANNULED' ? 'selected' : '' }}>Annulled</option>
                                    <option value="DIVORCED" {{ $member->civil_status == 'DIVORCED' ? 'selected' : '' }}>Divorced</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Blood Type</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="blood_type">
                                    <option value="A+" {{ in_array($member->blood_type, ['A', 'A+']) ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ $member->blood_type == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ in_array($member->blood_type, ['B', 'B+']) ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ $member->blood_type == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ in_array($member->blood_type, ['AB', 'AB+']) ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ $member->blood_type == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ in_array($member->blood_type, ['O', 'O+']) ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ $member->blood_type == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Position</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Position" value="{{ $member->position }}" name="position"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Profession</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Profession" value="{{ $member->profession }}" name="profession"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{ $member->email }}"
                                    class="form-control form-control-line" name="email"
                                    id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mobile No</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member->mobile_no }}" name="mobile_no"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Contact Person</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member->contact_person }}" name="contact_person"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Contact Address</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member->contact_address }}" name="contact_address"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Contact Mobile No</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member->contact_mobile }}" name="contact_mobile"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
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
