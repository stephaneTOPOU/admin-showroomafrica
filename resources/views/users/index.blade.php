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
                                <div class="row">
                                    <div class="col-md-10">
                                        <h3 class="card-title">Utilisateurs</h3>
                                    </div>                                    
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                @endif
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Pays</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->identifiant }}</td>
                                                <td>{{ $user->pays }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->prenoms }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->telephone1 }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('user-valide.edit', $user->identifiant) }}"
                                                            class="btn btn-default">
                                                            <i class="fas fa-edit"></i> Modifier
                                                        </a>
                                                    </div>
                                                    
                                                    <button class="btn btn-default"
                                                        onclick="deleteData({{ $user->identifiant }})"
                                                        data-id="{{ $user->identifiant }}"
                                                        data-target="#default{{ $user->identifiant }}">
                                                        <i class="fas fa-trash"></i> Supprimer
                                                    </button>

                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        function deleteData(identifiant) {

                                                            let table = $('#example1');

                                                            Swal.fire({
                                                                title: 'Etes-vous sûr?',
                                                                text: "Vous ne pourrez pas revenir en arrière!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Oui, supprimez!'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {

                                                                    let url = "{{ url('user-valide') }}/" + identifiant
                                                                    window.location.reload();

                                                                    //console.log(url);
                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        url: url,
                                                                        data: {
                                                                            _method: 'DELETE',
                                                                            _token: "{{ csrf_token() }}",
                                                                            service: identifiant
                                                                        },

                                                                        success: function() {
                                                                            Swal.fire(
                                                                                'Supprimé!',
                                                                                'La présentation a été supprimée.',
                                                                                'success'
                                                                            )
                                                                            table.dataTable({
                                                                                ajax: "data.json"
                                                                            }).ajax.reload();
                                                                        },

                                                                        error: function() {
                                                                            alert('error');
                                                                        },
                                                                    })
                                                                }

                                                            });

                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Pays</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
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
@include('footer.footer6')
@include('footer.footer10')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
@include('footer.footer17')
<script>
    $(function() {
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
