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
                                                <h3 class="card-title">Présentation de l'entreprise</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{route('service.create')}}" class="btn btn-block btn-success pull-right">  Ajouter  </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>Entreprise</th>
                                            <th>Qui sommes-nous</th>
                                            <th>Notre mission</th>
                                            <th>Image</th>
                                            <th>Nos objectifs</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>{{ $service->identifiant }}</td>
                                                        <td>{{ $service->entreprise }}</td>
                                                        <td>{{ $service->libelle }}</td>
                                                        <td>{{ $service->description }}</td>
                                                        <td><img src="{{asset('assets/images')}}/{{$service->image2}}" width="60"></td>
                                                        <td>{{ $service->image5 }}</td>
                                                        <td><img src="{{asset('assets/images')}}/{{$service->image3}}" width="60"></td>
                                                        <td>{{ $service->created_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{route('service.edit',$service->identifiant)}}" class="btn btn-default">
                                                                    <i class="fas fa-edit"></i> Modifier
                                                                </a>
                                                            </div>
                                                            <button class="btn btn-default" onclick="deleteData({{ $service->identifiant }})">
                                                                <i class="fas fa-trash"></i> Supprimer
                                                            </button>
                                                            {{-- <form method="POST" action="{{ route('service.destroy',$service->identifiant) }}" class="btn-group">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" href="" class="btn btn-default">
                                                                    <i class="fas fa-trash"></i> Supprimer
                                                                </button>
                                                            </form> --}}
                                                            {{-- <div class="btn-group">
                                                                <a class="btn btn-default">
                                                                    <i class="fas fa-eye"></i> Edit
                                                                </a>
                                                            </div> --}}
                                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                            <script>
                                                            function deleteData(identifiant) {
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

                                                                var url = '{{ route("service.destroy", ":service") }}'
                                                                url.replace(':service', identifiant.service)

                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: url,
                                                                    data: {
                                                                    '_method': 'DELETE',
                                                                    '_token': '{{ csrf_token() }}'
                                                                    },

                                                                    success: function () {
                                                                    Swal.fire(
                                                                        'Supprimé!',
                                                                        'Votre fichier a été supprimé.',
                                                                        'success'
                                                                    )
                                                                    }

                                                                })

                                                                }

                                                            })

                                                            }
                                                            
                                                            </script>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Entreprise</th>
                                                <th>Qui sommes-nous</th>
                                                <th>Notre mission</th>
                                                <th>Image</th>
                                                <th>Nos objectifs</th>
                                                <th>Image</th>
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