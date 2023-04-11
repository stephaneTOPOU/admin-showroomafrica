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
                                                <h3 class="card-title">Slider Du Milieu</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{route('slider2.create')}}" class="btn btn-block btn-success pull-right">  Ajouter  </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success" role="alert">{{Session::get('success') }}</div>
                                        @endif
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>Pays</th>
                                            <th>Admin</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($slider2s as $slider2)
                                                    <tr>
                                                        <td>{{ $slider2->identifiant }}</td>
                                                        <td>{{ $slider2->libelle }}</td>
                                                        <td>{{ $slider2->admin }}</td>
                                                        <td><img src="{{asset('assets/images')}}/{{$slider2->image}}" width="100"></td>
                                                        <td>{{ $slider2->created_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{route('slider2.edit', $slider2->identifiant)}}" class="btn btn-default">
                                                                    <i class="fas fa-edit"></i> Modifier
                                                                </a>
                                                            </div>
                                                            <form method="POST" action="{{ route('slider2.destroy',$slider2->identifiant) }}" class="btn-group">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" href="" class="btn btn-default">
                                                                    <i class="fas fa-trash"></i> Supprimer
                                                                </button>
                                                            </form>
                                                            {{-- <div class="btn-group">
                                                                <a class="btn btn-default">
                                                                    <i class="fas fa-eye"></i> Edit
                                                                </a>
                                                            </div> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Pays</th>
                                                <th>Admin</th>
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