@include('header.header')
@include('header.header5')
@include('header.header6')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <div class="wrapper">
        @include('navBar.navbar')
            @include('sideBar.sidebar')
            <div class="content-wrapper">
                @include('content-header.content-header')
                    <section class="content">
                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($categories as $categorie)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $categorie->id }}</td>
                                                    <td>{{ $categorie->libelle }}</td>
                                                    <td>{{ $categorie->created_at }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-default">
                                                                <i class="fas fa-edit"></i> Modifier
                                                            </a>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a class="btn btn-default">
                                                                <i class="fas fa-trash"></i> Supprimer
                                                            </a>
                                                        </div>
                                                        {{-- <div class="btn-group">
                                                            <a class="btn btn-default">
                                                                <i class="fas fa-eye"></i> Edit
                                                            </a>
                                                        </div> --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nom</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
            </div>
        @include('footer.footer')
    </div>
    @include('footer.footer3')
    {{-- @include('footer.footer4') --}}
    @include('footer.footer5')
    @include('footer.footer10')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@include('footer.footer2')