<x-app-layout>
    <x-slot:title>
        City/Municipality
    </x-slot>
    <x-slot:jscript>

    </x-slot>

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">City/Municipality</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{route('municity.create')}}"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Create City/Municipality</a>
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
                            <h5 class="card-title">List of Cities/Municipalities</h5>
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
                                    <th>Name</th>
                                    <th style="text-align: center">Barangays</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($municities as $index => $municity)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ $municity->name }}</td>
                                    <td style="text-align: center"><a href="{{route('municity.show',$municity->id)}}">{{$municity->barangays->count()}}</a></td>
                                    <td>
                                        <a href="{{route('municity.edit',$municity)}}" style="margin-left:10px"><i
                                                class="fa fa-edit"></i><span class="hide-menu"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End ayudas -->
    <!-- ============================================================== -->
</x-app-layout>
