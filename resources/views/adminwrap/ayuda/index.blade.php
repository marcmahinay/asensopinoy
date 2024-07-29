<x-app-layout>
    <x-slot:title>
        Ayuda
    </x-slot>

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Ayuda</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="https://www.wrappixel.com/templates/adminwrap/"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Create Ayuda</a>
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
                            <h5 class="card-title">List of Ayuda</h5>
                        </div>
                        <div class="ms-auto">
                            &nbsp;
                        </div>
                    </div>
                    <div class="table-responsive mt-3 no-wrap">
                        <table class="table vm no-th-brd pro-of-month">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ayudas as $ayuda)
                                <tr>
                                    <td>{{ $ayuda->id }}</td>
                                    <td>{{ $ayuda->description }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $ayudas->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End ayudas -->
    <!-- ============================================================== -->
</x-app-layout>
