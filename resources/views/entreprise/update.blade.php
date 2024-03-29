@include('header.header')
@include('header.header6')
@include('header.header7')
@include('header.header3')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@include('header.header2')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


@include('header.header5')
<div class="wrapper">
    @include('navBar.navbar')
    @include('sideBar.sidebar')
    <div class="content-wrapper">
        @include('content-header.content-header')
        <section class="content">
            <div class="container-fluid">
                <div class="">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Modifier une entreprise</h3>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                        @endif
                        <form role="form" method="POST"
                            action="{{ route('entreprise-valide.update', $entreprises->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="valide" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->valide == 1) checked @endif
                                                @if ($entreprises->valide == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck1">Valider
                                                l'entreprise</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nom du sous-catégorie</label>
                                            <select class="form-control select2" style="width: 100%;"
                                                name="souscategorie_id">
                                                <option selected="selected">sous-catégorie ici</option>
                                                @foreach ($souscategories as $souscategorie)
                                                    <option value="{{ $souscategorie->id }}"
                                                        @if ($souscategorie->id == $entreprises->souscategorie_id) selected @endif>
                                                        {{ $souscategorie->libelle }} - {{ $souscategorie->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nom de l'entreprise</label>
                                            <input type="text" class="form-control" placeholder="Entrez le nom"
                                                name="nom" required value="{{ old('nom') ?? $entreprises->nom }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email de l'entreprise</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Entrez le mail" name="email"
                                                value="{{ old('email') ?? $entreprises->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Adresse de l'entreprise</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Entrez l'adresse" name="adresse" required
                                                    value="{{ old('adresse') ?? $entreprises->adresse }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Téléphone 1 de l'entreprise</label>
                                            <input type="tel" class="form-control" placeholder="Entrez le numéro"
                                                name="telephone1" required
                                                value="{{ old('telephone1') ?? $entreprises->telephone1 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Téléphone 2 de l'entreprise</label>
                                                <input type="tel" class="form-control"
                                                    placeholder="Entrez un 2ème numéro" name="telephone2"
                                                    value="{{ old('telephone2') ?? $entreprises->telephone2 }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Itinéraire de l'entreprise</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Entrez l'itinéraire" name="itineraire"
                                                    value="{{ old('itineraire') ?? $entreprises->itineraire }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Siteweb de l'entreprise</label>
                                            <input type="text" class="form-control" placeholder="Entrez le siteweb"
                                                name="siteweb" value="{{ old('siteweb') ?? $entreprises->siteweb }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Géoloaclisation de l'entreprise</label>
                                            <input type="text" class="form-control"
                                                placeholder="Entrez la géolocalisation" name="geolocalisation"
                                                value="{{ old('geolocalisation') ?? $entreprises->geolocalisation }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Description courte de l'entreprise</label>
                                                <textarea id="summernote-1" name="descriptionCourte">{{ old('descriptionCourte') ?? $entreprises->descriptionCourte }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck100"
                                                name="premium" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->premium == 1) checked @endif
                                                @if ($entreprises->premium == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck100">estPremium</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck101"
                                                name="basic" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->basic == 1) checked @endif
                                                @if ($entreprises->basic == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck101">estBasic</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck101"
                                                name="partenaire" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->partenaire == 1) checked @endif
                                                @if ($entreprises->partenaire == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck101">A des
                                                partenaire</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="honneur" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->honneur == 1) checked @endif
                                                @if ($entreprises->honneur == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck1">sélection
                                                d'entreprise</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="logo"
                                                        value="{{ old('logo') ?? $entreprises->logo }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('logo') ?? $entreprises->logo }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image pharmacie </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="photo1"
                                                        value="{{ old('photo1') ?? $entreprises->photo1 }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('photo1') ?? $entreprises->photo1 }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image Couverture(Profil)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="photo2"
                                                        value="{{ old('photo2') ?? $entreprises->photo2 }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('photo2') ?? $entreprises->photo2 }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">sélection d'entrprise</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="photo4"
                                                        value="{{ old('photo4') ?? $entreprises->photo4 }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('photo4') ?? $entreprises->photo4 }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="est_souscrit" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->est_souscrit == 1) checked @endif
                                                @if ($entreprises->est_souscrit == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck1">estSouscrit</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="est_pharmacie" data-key="{{ $entreprises->id }}"
                                                value="1" @if ($entreprises->est_pharmacie == 1) checked @endif
                                                @if ($entreprises->est_pharmacie == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck1">estPharmacie</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="pharmacie_de_garde" data-key="{{ $entreprises->id }}"
                                                value="1" @if ($entreprises->pharmacie_de_garde == 1) checked @endif
                                                @if ($entreprises->pharmacie_de_garde == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck1">estDeGarde</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="a_publireportage" data-key="{{ $entreprises->id }}"
                                                value="1" @if ($entreprises->a_publireportage == 1) checked @endif
                                                @if ($entreprises->a_publireportage == 0) unchecked @endif>
                                            <label class="form-check-label"
                                                for="exampleCheck1">apublireportage</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                name="a_magazine" data-key="{{ $entreprises->id }}" value="1"
                                                @if ($entreprises->a_magazine == 1) checked @endif
                                                @if ($entreprises->a_magazine == 0) unchecked @endif>
                                            <label class="form-check-label" for="exampleCheck1">amagazine</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image du publireportage</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="publireportage1"
                                                        value="{{ old('publireportage1') ?? $entreprises->publireportage1 }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('publireportage1') ?? $entreprises->publireportage1 }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image du magazine</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="magazineimage1"
                                                        value="{{ old('magazineimage1') ?? $entreprises->magazineimage1 }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('magazineimage1') ?? $entreprises->magazineimage1 }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Vidéo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="video"
                                                        value="{{ old('video') ?? $entreprises->video }}">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ old('video') ?? $entreprises->video }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Lien YouTube</label>
                                            <input type="text" class="form-control"
                                                placeholder="Entrez le lien YouTube" name="magazineimage3"
                                                value="{{ old('magazineimage3') ?? $entreprises->magazineimage3 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('footer.footer')
</div>
@include('footer.footer18')
@include('footer.footer3')
@include('footer.footer6')
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
@include('footer.footer12')
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@include('footer.footer13')
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
@include('footer.footer17')

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
@include('footer.footer2')
