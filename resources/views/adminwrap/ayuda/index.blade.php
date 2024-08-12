<x-app-layout>
    <x-slot:title>
        Ayuda
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
                                                <a style="color:red; margin-left:10px" href="#" onclick="confirmDelete('{{ route('ayuda.destroy', $ayuda) }}')">
                                                    <i class="fa fa-trash"></i><span class="hide-menu"></span>
                                                </a>
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

    <!-- ============================================================== -->
    <!-- End ayudas -->
    <!-- ============================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Reload the page or redirect as needed
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        if (xhr.status === 500) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'This Ayuda cannot be deleted because it has members who have availed it.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong. Please try again later.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    }
</script>
</x-app-layout>
