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
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Ayuda</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{route('ayuda.create')}}"
                class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Create Ayuda</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Projects of the Month -->
    <!-- ============================================================== -->

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
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ayudas as $index => $ayuda)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $ayuda->description }}</td>
                                    <td>
                                        <a href="{{route('ayuda.edit',$ayuda)}}" style="margin-left:10px"><i
                                                class="fa fa-edit"></i><span class="hide-menu"></span></a>
                                        <a style="color:red; margin-left:10px" href="#" onclick="confirmDelete('{{route('ayuda.destroy', $ayuda)}}')" style="margin-left:10px"><i
                                            class="fa fa-trash"></i><span class="hide-menu"></span></a>
                                    </td>
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

    <!--MODAL-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Ayuda?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(actionUrl) {
            var form = document.getElementById('deleteForm');
            form.action = actionUrl;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
    <!-- ============================================================== -->
    <!-- End ayudas -->
    <!-- ============================================================== -->
</x-app-layout>
