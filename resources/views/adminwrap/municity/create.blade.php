<x-app-layout>
    <x-slot:title>
        Create New City/Municipality
    </x-slot>
    <x-slot:jscript>

    </x-slot>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Member Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('municity.index') }}">City/Municipality</a></li>
                <li class="breadcrumb-item active">Create</li>
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
            <li> {{session('success')}}</li>
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
         <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <!-- Tab panes -->
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="{{ route('municity.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label class="col-sm-12">Municipality/City Name</label>
                            <div class="col-sm-12">
                                <input type="text" value="" class="form-control form-control-line" name="municity_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Ok</button>
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
