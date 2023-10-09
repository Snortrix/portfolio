@extends('adminlte::page')

@section('title', 'Портфолио студентов')
@section('adminlte_css')
@stack('css')
<script src="https://kit.fontawesome.com/7a57c86913.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/portal-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
@endsection
@section('content')
    <div class="main_table_panel portal-ui">
        <h2>Портфолио студентов</h2>
        <div class="moderator_table">
            <table id="sheet">
                <thead>
                    <tr>
                        <th class="fio_column_table">Студент</th>
                        <th>Уровень обучения</th>
                        <th>Место обучения</th>
                        <th class="group_column_table">Группа</th>
                        <th class="status_column_table">Статус</th>
                        <th class="change_column_table">Изменено</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#sheet').DataTable().clear().destroy();
        table = $('#sheet')
        //     .on( 'processing.dt', function ( e, settings, processing ) {
        //     $('#sheet thead tr:eq(1) th').removeClass('sorting_asc');
        //     if(processing) $(".table_processing_black").show();
        //     else $(".table_processing_black").hide();
        // })
            .DataTable({
            processing: true,
            serverSide: true,
            ajax: '/students/portfolio/sheet/data',
            pageLength: 50,
            fixedHeader: true,
            orderCellsTop: true,
            order: [[ 4, "asc" ]],
            initComplete: function () {

            },
            drawCallback: function() {

            },
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Russian.json",
            },
            columns: [
                { name: 'user.full_name', orderable: false, data: function (row) {
                        return $('<a>', {href:'/students/portfolio/'+row.user_id, text:row.user.full_name, target:'_blank'}).prop('outerHTML');
                    }},
                { data: 'user.bind_user.univer.student_records.0.syllabus.preparation_level.Description', defaultContent: "", orderable: false},
                { data: 'user.bind_user.univer.student_records.0.faculty.name', defaultContent: "", orderable: false},
                { data: 'user.bind_user.univer.student_records.0.study_group.short_name', defaultContent: "", orderable: false },
                { name: 'status', data: function (row) {
                    switch (row.status) {
                        case 0:
                            return $('<div>', { class: 'badge badge-light-primary mt-auto', text: 'Изменено'}).prop('outerHTML');
                        case 1:
                            return $('<div>', { class: 'badge badge-light-warning mt-auto', text: 'На доработке'}).prop('outerHTML');
                        default:
                            return $('<div>', { class: 'badge badge-light-success mt-auto', text: 'Проверено'}).prop('outerHTML');
                    }
                }},
                {data: 'updated_at'},
            ],
            rowCallback: function (row, data) {

            }
        });
    </script>
@endsection
