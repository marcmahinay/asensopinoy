<x-app-layout>
    <x-slot:title>
        Create New Member
    </x-slot>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Member Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('municity.index')}}"> Cities/Municipalities</a></li>
                <li class="breadcrumb-item"><a href="{{route('municity.show',$barangay->municity_id)}}"> {{$barangay->municity->name}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('barangay.show',$barangay->id)}}">  {{$barangay->name}}</a></li>
                <li class="breadcrumb-item active">Create Member</li>
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
                    <center class="mt-4">

                        <img src="" alt="user" class="round" style="width: 150px; height: 150px; border:3px solid #f1f4f5;">
                        <h4 class="card-title mt-2">Upload Image</h4>

                    </center>
                </div>
            </div>
        </div>
         <!-- Column -->
         <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tab panes -->
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ route('member.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label class="col-sm-12">Barangay, Municipality/City</label>
                            <div class="col-sm-12">
                                <input type="text" data-id="{{ $barangay->id }}" value="{{ $barangay->name }}, {{ $barangay->municity->name }}"
                                    class="form-control form-control-line" disabled>
                                <input type="hidden" value="{{$barangay->id}}" name="barangay_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Asenso ID</label>
                            <div class="col-md-12">
                                <input type="text" value="" name="asenso_id"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" value="" name="lastname"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">First Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="First Name" value="" name="firstname"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Middle Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Middle Name" value="" name="middlename"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Present Address</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Present Address" value="" name="present_address"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Birth Date</label>
                            <div class="col-md-12">
                                <input type="date" placeholder="Birth Date" value="" name="birthdate"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Birth Place</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Birth Place" value="" name="birthplace"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Sex</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" value="" name="sex">
                                    <option value="F">Female</option>
                                    <option value="M">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Civil Status</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="civil_status">
                                    <option value="SINGLE">Single</option>
                                    <option value="MARRIED">Married</option>
                                    <option value="SEPARATED">Separated</option>
                                    <option value="WIDOWED">Widowed</option>
                                    <option value="ANNULED">Annulled</option>
                                    <option value="DIVORCED">Divorced</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Blood Type</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="blood_type">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Position</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Position" value="" name="position"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Profession</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Profession" value="" name="profession"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value=""
                                    class="form-control form-control-line" name="email"
                                    id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mobile No</label>
                            <div class="col-md-12">
                                <input type="text" value="" name="mobile_no"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Contact Person</label>
                            <div class="col-md-12">
                                <input type="text" value="" name="contact_person"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Contact Address</label>
                            <div class="col-md-12">
                                <input type="text" value="" name="contact_address"
                                    class="form-control form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Contact Mobile No</label>
                            <div class="col-md-12">
                                <input type="text" value="" name="contact_mobile"
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
</x-app-layout>
