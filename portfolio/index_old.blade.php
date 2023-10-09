@extends('adminlte::page')

@section('title', 'Портфолио студента')
@section('adminlte_css')
@stack('css')
<link rel="stylesheet" href="{{asset('css/icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/portal-ui.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/portal-portfolio.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/select2-portal-ui.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/select2-portal-ui_flat.css')}}" type="text/css">

@endsection
@section('content_header')
<div class="portfolio-header col-12">
    <div class="d-flex flex-row portfolio-header-column">
        <div class="portfolio-avatar"><img src="{{asset('../img/avatar.png')}}" width="100" height="100" alt="avatar" /></div>
        <div class="d-flex flex-column portal-ui g-24">
            <div class="portal-ui"><h4>Ракунов Олег Викторович</h4>
                <span class="text-secondary">Студент магистратуры <br/> (Очно-заочная форма)</span>
            </div>
            <div><button class="portal-ui btn btn-primary">Распечатать портфолио</button></div>
        </div>
    </div>
    <div class="d-flex flex-column portfolio-header-column col-lg-3">
        <div>
            <div class="portfolio info-title">почта:</div>
            <div class="portfolio info-text">raccon-17@forest.green</div>
        </div>
        <div>
            <div class="portfolio info-title">мобильный телефон:</div>
            <div class="portfolio info-text">+7 (900) 115-12-27</div>
        </div>
    </div>
    <div class="d-flex flex-column portfolio-header-column col-lg-4">
      <div>
         <div class="portfolio info-title">Специальность:</div>
         <div class="portfolio info-text">02.03.03 Математическое обеспечение и администрирование информационных систем</div>
      </div>
        <div>
           <div class="portfolio info-title">Профиль:</div>
           <div class="portfolio info-text">Прикладная информатика в экономике</div>
        </div>
    </div>
</div>
<div class="portfolio-tabs col-12">
    <ul class="nav nav-tabs col-6" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="portal-ui text nav-link active" href="#"
               data-toggle="tab"
               data-target="#performance"
               type="button"
               role="tab"
               aria-controls="performance"
               aria-selected="true">Успеваемость</a>
        </li>
        <li class="nav-item">
            <a class="portal-ui text nav-link" href="#"
               data-toggle="tab"
               data-target="#educational_activity"
               type="button"
               role="tab"
               aria-controls="educational_activity">Учебная деятельность</a>
        </li>
        <li class="nav-item">
            <a class="portal-ui text nav-link" href="#"
               data-toggle="tab"
               data-target="#achivments"
               type="button"
               role="tab"
               aria-controls="achivments">Достижения</a>
        </li>
        <li class="nav-item">
            <a class="portal-ui text nav-link" href="#"
               data-toggle="tab"
               data-target="#career"
               type="button"
               role="tab"
               aria-controls="career">Карьера</a>
        </li>
    </ul>
</div>
@stop
@section('content')
    <div class="tab-content">
        <div class="tab-pane fade show active" id="performance" role="tabpanel" aria-labelledby="performance-tab">
            <div class="portfolio-content-header">
                <h5>Первый семестр</h5>
            </div>
            <div class="portfolio-content-table">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>Предмет</th>
                        <th>Тип</th>
                        <th>Дата</th>
                        <th>Оценка</th>
                        <th>Примечание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Физическая культура и спорт</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Всеобщая история</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Визуальное программирование</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-bad">Неудовлетворительно</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Иностранный язык</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td>Пересдача 19.09.2022</td>
                    </tr>
                    <tr>
                        <td>Безопасность жизнедеятельности</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Информатика и программирование</td>
                        <td>Экзамен</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Отлично</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Математика</td>
                        <td>Экзамен</td>
                        <td>24.03.2022</td>
                        <td class="mark-average">Удовлетворительно</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="portfolio-content-header">
                <h5>Второй семестр</h5>
            </div>
            <div class="portfolio-content-table">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>Предмет</th>
                        <th>Тип</th>
                        <th>Дата</th>
                        <th>Оценка</th>
                        <th>Примечание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Физическая культура и спорт</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Всеобщая история</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Визуальное программирование</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-bad">Неудовлетворительно</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Иностранный язык</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td>Пересдача 19.09.2022</td>
                    </tr>
                    <tr>
                        <td>Безопасность жизнедеятельности</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Информатика и программирование</td>
                        <td>Экзамен</td>
                        <td>24.03.2022</td>
                        <td class="mark-good">Хорошо</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Математика</td>
                        <td>Экзамен</td>
                        <td>24.03.2022</td>
                        <td class="mark-average">Удовлетворительно</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="portfolio-content-header">
                <h5>Третий семестр</h5>
            </div>
            <div class="portfolio-content-table">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>Предмет</th>
                        <th>Тип</th>
                        <th>Дата</th>
                        <th>Оценка</th>
                        <th>Примечание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Физическая культура и спорт</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Всеобщая история</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Визуальное программирование</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-bad">Неудовлетворительно</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Иностранный язык</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td>Пересдача 19.09.2022</td>
                    </tr>
                    <tr>
                        <td>Безопасность жизнедеятельности</td>
                        <td>Зачет</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Зачтено</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Информатика и программирование</td>
                        <td>Экзамен</td>
                        <td>24.03.2022</td>
                        <td class="mark-exelent">Отлично</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Математика</td>
                        <td>Экзамен</td>
                        <td>24.03.2022</td>
                        <td class="mark-average">Удовлетворительно</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="educational_activity" role="tabpanel" aria-labelledby="educational_activity">
            <div class="portfolio-top-header d-flex flex-row justify-content-between">
               <div class="col-10">
                   <select name="edu_type" id="edu_type" class="form-control">
                       <option>Бакалавриат (02.03.03 Математическое обеспечение и администрирование информационных систем) 2020 - 2025</option>
                       <option>Lorem?</option>
                       <option>Lorem...</option>
                       <option>Ipsum comrades</option>
                   </select>
               </div>
               <div class="col-2 d-flex flex-row justify-content-end"><button class="portal-ui btn-light" type="button">Распечатать</button></div>
            </div>
            <div class="row row-cols-lg-2">
                <div class="d-flex flex-column">
                    <div class="portfolio-column">
                        <div class="portfolio-column-header d-flex flex-row">
                            <div class="portal-ui text-color-secondary"><h5>Работы</h5></div>
                            <div class="ml-auto">
                                <button type="button" class="portal-ui btn-add btn-thd"><i class="portal-ui text-primary icon-plus-24"></i>Добавить</button>
                            </div>
                        </div>
                        <div class="portfolio-column-card d-flex flex-row">
                            <span class="icon-diploma-large"></span>
                            <div class="card-content content-w-fit">
                                <div class="card-content-header">
                                    <div><h5 class="text-color-primary">Выпускная квалификационная работа</h5></div>
                                    <div class="ml-auto"> <div class="dropdown">
                                            <a role="button" data-toggle="dropdown" aria-expanded="true">
                                                <div class="portal-ui text-muted icon-menu-dots-24"></div>
                                            </a>
                                            <div class="portal-ui dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-159px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-pensil-24 text-color-midnight-4"></span><span>Редактировать</span></a>
                                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-cross-24 text-color-midnight-4"></span><span>Удалить</span></a>
                                            </div>
                                        </div></div>
                                </div>
                                <div><span class="text-color-midnight-4">Тема: </span>Исследование методов информационного взаимодействия в сетях интернета вещей</div>
                                <div><span class="text-color-midnight-4">Руководитель: </span>Аванесов Артём Аркадьевич</div>
                                <div><span class="text-color-midnight-4">Консультант: </span>Аванесов Артём Аркадьевич</div>
                                <div class="portal-ui card-content-status">
                                    <div class="badge badge-primary light">На доработке</div>
                                    <div class="subtitle-text"><span class="text-muted">Оценка: </span><span class="text-warning">Неудовлетворительно</span></div>
                                    <div>3 семестр</div>
                                    <div class="portal-ui icons-aligment">
                                        <span class="icon-calendar-24 text-muted"></span>
                                        <span>22.09.2022</span>
                                    </div>
                                    <div class="portal-ui icons-aligment">
                                        <span class="icon-comments-24 text-muted"></span>
                                        <span>&nbsp;3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-column-card d-flex flex-row">
                            <span class="icon-coursework-large"></span>
                            <div class="card-content content-w-fit">
                                <div class="card-content-header">
                                    <div><h5 class="text-color-primary">Курсовая работа</h5></div>
                                    <div class="ml-auto"> <div class="dropdown">
                                            <a role="button" data-toggle="dropdown" aria-expanded="true">
                                                <div class="portal-ui text-muted icon-menu-dots-24"></div>
                                            </a>
                                            <div class="portal-ui dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-159px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-pensil-24 text-color-midnight-4"></span><span>Редактировать</span></a>
                                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-cross-24 text-color-midnight-4"></span><span>Удалить</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div><span class="text-color-midnight-4">Тема: </span>Исследование методов информационного взаимодействия в сетях интернета вещей</div>
                                <div class="portal-ui card-content-status">
                                    <div class="badge badge-primary light">На доработке</div>
                                    <div class="subtitle-text"><span class="text-muted">Оценка: </span><span class="text-primary">Хорошо</span></div>
                                    <div>3 семестр</div>
                                    <div class="portal-ui icons-aligment">
                                        <span class="icon-calendar-24 text-muted"></span>
                                        <span>22.09.2022</span>
                                    </div>
                                    <div class="portal-ui icons-aligment">
                                        <span class="icon-comments-24 text-muted"></span>
                                        <span>&nbsp;3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-column-card d-flex flex-row">
                            <span class="icon-internship-large"></span>
                            <div class="card-content content-w-fit">
                                <div class="card-content-header">
                                    <div><h5 class="text-color-primary">Практика (производственная)</h5></div>
                                    <div class="ml-auto">
                                        <div class="dropdown">
                                            <a role="button" data-toggle="dropdown" aria-expanded="true">
                                                <div class="portal-ui text-muted icon-menu-dots-24"></div>
                                            </a>
                                            <div class="portal-ui dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-159px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-pensil-24 text-color-midnight-4"></span><span>Редактировать</span></a>
                                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-cross-24 text-color-midnight-4"></span><span>Удалить</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div><span class="text-color-midnight-4">Организация: </span>Организация: ФГБУ «НМИЦ ВМТ им. А.А. Вишневского»</div>
                                <div><span class="text-color-midnight-4">Руководитель: </span>Аванесов Артём Аркадьевич</div>
                                <div class="portal-ui card-content-status">
                                    <div class="badge badge-primary light">На доработке</div>
                                    <div class="subtitle-text"><span class="text-muted">Оценка: </span><span class="text-primary">Хорошо</span></div>
                                    <div>3 семестр</div>
                                    <div class="portal-ui icons-aligment">
                                        <span class="icon-calendar-24 text-muted"></span>
                                        <span>22.09.2022</span>
                                    </div>
                                    <div class="portal-ui icons-aligment">
                                        <span class="icon-comments-24 text-muted"></span>
                                        <span>&nbsp;3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="portfolio-column">
                        <div class="portfolio-column-header d-flex flex-row">
                            <div class="portal-ui text-color-secondary"><h5>Компетенции</h5></div>
                        </div>
                        <div class="portfolio-column-card d-flex flex-row">
                            <div class="card-content w-100">
                                <div class="portal-ui d-flex flex-column g-10 pb-12">
                                    <div class="progress-title"><div class="text-muted">Опк-8</div><div class="text-muted ml-auto"><b>50%</b> из 100</div></div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-description text-color-secondary">
                                        Способен инсталлировать и сопровождать программное обеспечение для информационных систем и баз данных, в том числе отечественного производства
                                    </div>
                                </div>
                                <div class="portal-ui d-flex flex-column g-10 pb-12">
                                    <div class="progress-title"><div class="text-muted">Опк-8</div><div class="text-muted ml-auto"><b>50%</b> из 100</div></div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-description text-color-secondary">
                                        Способен инсталлировать и сопровождать программное обеспечение для информационных систем и баз данных, в том числе отечественного производства
                                    </div>
                                </div>
                                <div class="portal-ui d-flex flex-column g-10 pb-12">
                                    <div class="progress-title"><div class="text-muted">Опк-8</div><div class="text-muted ml-auto"><b>50%</b> из 100</div></div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-description text-color-secondary">
                                        Способен инсталлировать и сопровождать программное обеспечение для информационных систем и баз данных, в том числе отечественного производства
                                    </div>
                                </div>
                                <div class="portal-ui d-flex flex-column g-10 pb-12">
                                    <div class="progress-title"><div class="text-muted">Опк-8</div><div class="text-muted ml-auto"><b>50%</b> из 100</div></div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-description text-color-secondary">
                                        Способен инсталлировать и сопровождать программное обеспечение для информационных систем и баз данных, в том числе отечественного производства
                                    </div>
                                </div>
                                <div class="portal-ui d-flex flex-column g-10 pb-12">
                                    <div class="progress-title"><div class="text-muted">Опк-8</div><div class="text-muted ml-auto"><b>50%</b> из 100</div></div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-description text-color-secondary">
                                        Способен инсталлировать и сопровождать программное обеспечение для информационных систем и баз данных, в том числе отечественного производства
                                    </div>
                                </div>
                                <div class="portal-ui d-flex flex-column g-10">
                                    <div class="subtitle-text"><a href="#" class="text-color-primary">Перейти к полному списку <i class="icon-arrow-angle-right-16"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="achivments" role="tabpanel" aria-labelledby="achivments-tab">
            <div class="modal fade" id="modal_template" tabindex="-1" aria-labelledby="modal_template" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="portal-ui modal-header">
                            <h4 class="text-color-secondary" id="modal-card-title">Заголовок</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="portal-ui modal-body">
                            <div class="portfolio-modal-column">
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Название</div>
                                    <div class="portal-ui text text-color-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor. </div>
                                </div>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Название</div>
                                    <div class="portal-ui text text-color-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor. </div>
                                </div>

                                <div class="portfolio-modal-row">
                                    <div>
                                        <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Hello darkness my old friend</div>
                                        <div class="portal-ui text text-color-secondary">I`ve come to talk with your again </div>
                                    </div>
                                    <div>
                                        <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Название 2</div>
                                        <div class="portal-ui text text-color-secondary">12.06.2020  —  18.06.2020</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Название</div>
                                    <div class="portal-ui text text-color-secondary">Описание</div>
                                </div>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Файлы</div>
                                    <div class="portfolio-modal-file portal-ui">
                                        <span class="icon-file-24 text-primary"></span>
                                        <span class="portal-ui text-small">Название загруженного файла.pdf</span>
                                        <span class="icon-download-24 text-muted"></span>
                                    </div>
                                    <div class="portfolio-modal-file">
                                        <span class="icon-file-24 text-primary"></span>
                                        <span class="portal-ui text-small">Очень большое пребольшое Название загруженного файла.pdf</span>
                                        <span class="icon-download-24 text-muted"></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Ссылки</div>
                                    <a href="" class="portfolio-external-link icon-external-link-24"><span class="text-secondary text-small">Презентация научно исследовательской работы на конференции</span></a>
                                    <a href="" class="portfolio-external-link icon-external-link-24"><span class="text-secondary text-small">Презентация научно исследовательской работы на конференции</span></a>
                                </div>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Файлы</div>
                                    <div class="portal-ui file-upload">
                                        <span class="portal-ui icon-file-upload-64"></span>
                                        <span><h6>Перетащите файлы сюда или клините на область</h6></span>
                                        <span class="portal-ui text-small text-color-midnight-4">Принимаются файлы в формате PDF, JPG, PNG. Пожалуйста, убедитесь, что текст на предоставленных копиях разборчив.</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-4 text-capitals">Статус модерации</div>
                                    <div class="portfolio-moderator-status success portal-ui">
                                        <span class="icon-tick-24"></span>
                                        <span class="text">%placeholder% было одобрено модератором и теперь отображается в вашем портфолио</span>
                                    </div>
                                    <div class="portfolio-moderator-status info portal-ui">
                                        <span class="icon-exclamation-mark-24"></span>
                                        <span class="text">%placeholder% находится на проверке у модератора. На данный момент его видно только Вам.</span>
                                    </div>
                                    <div class="portfolio-moderator-status denied portal-ui">
                                        <span class="icon-warning-24"></span>
                                        <span class="text">%placeholder% Достижение отклонено модератором. Lorem ipsum</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portal-ui modal-footer">
                            <div class="btn-toolbar col-12" role="toolbar">
                                <div class="btn-group"><button type="button" class="portal-ui btn-delete"><i class="icon-trash-can-24 text-muted"></i>Удалить</button></div>
                                <div class="portal-ui btn-group ml-auto">
                                    <button type="button" class="portal-ui btn-secondary" data-dismiss="modal">Назад</button>
                                    <button type="button" class="portal-ui btn-primary"><i class="icon-pensil-16"></i>Редактировать</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_template_edit" tabindex="-1" aria-labelledby="modal_template_edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="portal-ui modal-header">
                            <h4 class="text-color-secondary" id="modal-card-title">Заголовок</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="portal-ui modal-body">
                            <form class="portal-ui">

                                <div class="form-group">
                                    <label for="edu-ach-type">Тип достижения [пример]:</label>
                                    <select id="edu-ach-type" class="form-control">
                                        <option selected="" disabled>Программа профессиональной переподготовки</option>
                                        <option value="">пример 1</option>
                                        <option value="">пример 2</option>
                                        <option value="">пример 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edu-ach-progTitle">Назвение программы:</label>
                                    <input type="text" class="form-control" id="edu-ach-progTitle" name="edu-ach-progTitle">
                                </div>
                                <div class="form-group">
                                    <label for="edu-ach-place">Где проходили обучение:</label>
                                    <input type="text" class="form-control" id="edu-ach-place" name="edu-ach-place">
                                </div>
                                <div class="form-group">
                                    <label for="edu-ach-amountTime">Количество часов:</label>
                                    <input type="text" class="form-control" id="edu-ach-amountTime" name=edu-ach-amountTime">
                                </div>
                                <div class="form-group">
                                    <label for="edu-ach-link">Ссылка:</label>
                                    <div class="portal-ui form-row-control">
                                        <input type="text" class="form-control" id="edu-link" name=edu-ach-link">
                                        <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="portal-ui form-addinput-button"><button class="btn-add btn-thd text-secondary"><i class="icon-plus-24 text-primary"></i>Добавить ссылку</button></div>
                                <div class="form-group mb-0"><label for="edu-ach-date-period">Cроки обучения:</label></div>
                                <div class="portal-ui form-row">
                                    <div class="form-group"><input type="text" class="form-control" id="edu-ach-date-start" placeholder="ДД.ММ.ГГГГ"></div>
                                    <div class="form-group">—</div>
                                    <div class="form-group"><input type="text" class="form-control" id="edu-ach-date-end" placeholder="ДД.ММ.ГГГГ"></div>
                                </div>
                            </form>
                                <div>
                                    <div class="portal-ui subtitle-text-small text-color-midnight-2 text-capitals">Подтверждающие документы:</div>
                                    <div class="portal-ui file-upload">
                                        <span class="portal-ui icon-file-upload-64"></span>
                                        <span><h6>Перетащите файлы сюда или клините на область</h6></span>
                                        <span class="portal-ui text-small text-color-midnight-4">Принимаются файлы в формате PDF, JPG, PNG. Пожалуйста, убедитесь, что текст на предоставленных копиях разборчив.</span>
                                    </div>
                                </div>
                            </div>
                        <div class="portal-ui modal-footer">
                            <div class="potral-ui btn-toolbar col-12" role="toolbar">
                               <button type="button" class="portal-ui btn-secondary col" data-dismiss="modal">Закрыть</button>
                               <button type="button" class="portal-ui btn-primary col">Сохранить</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            <div class="portfolio-content-header d-inline-flex flex-row">
                <h6 class="text-color-secondary">Учебные достижения</h6>&nbsp;<div class="portal-ui icon-question-mark-24 text-color-midnight-4 portfolio-header-tooltip">
                    <div class="portal-ui text text-color-secondary tooltip-area">
                        <div class="tooltip-area-header">
                            <span class="portal-ui icon-warning-32 text-color-midnight-4"></span>
                            <h5 class="text-color-secondary">Достижения в учебной деятельности</h5>
                        </div>
                        <div class="tooltip-area-content">
                            <ul>
                                <li>Олимпиады</li>
                                <li>Дополнительное образование (повышение квалификации, профессиональная подготовка, академическая мобильность)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio-ach-cards d-flex flex-row flex-wrap align-items-stretch">
                <div class="portfolio-ach-card d-flex flex-column justify-content-between">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="portal-ui icon-essey-32 icon-round icon-round-large text-color-primary"></div>
                        <div class="dropdown">
                            <a role="button" data-toggle="dropdown" aria-expanded="false">
                                <div class="portal-ui text-muted icon-menu-dots-24"></div>
                            </a>
                            <div class="portal-ui dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-pensil-24 text-color-midnight-4"></span><span>Редактировать</span></a>
                                <a class="dropdown-item icon-l" href="#"><span class="portal-ui icon-cross-24 text-color-midnight-4"></span><span>Удалить</span></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="portal-ui subtitle-text">Курсовая работа</div>
                        <div class="portal-ui text">Глобальный электронный финансовый рынок</div>
                    </div>
                    <div class="portal-ui badge badge-success light">Одобрено</div>
                </div>
                <div class="portfolio-ach-card empty">
                    <div class="portal-ui text-color-midnight-4 icon-plus-32 icon-round bg-color-midnight-6 p-3"></div>
                    <div class="portal-ui subtitle-text text-center text-color-midnight-4">Добавьте информацию о себе и своих навыках</div>
                </div>
                <div class="portfolio-ach-card empty">
                    <button type="button" class="portal-ui text-color-midnight-4 icon-plus-32 icon-round bg-color-midnight-6 p-3"
                            data-toggle="modal"
                            data-target="#modal_template"
                            aria-labelledby="modal_template"></button>
                    <div class="portal-ui subtitle-text text-center text-color-midnight-4">Шаблон модального окна, статусы модерации</div>
                </div>
                <div class="portfolio-ach-card empty">
                    <button type="button" class="portal-ui text-color-midnight-4 icon-plus-32 icon-round bg-color-midnight-6 p-3"
                            data-toggle="modal"
                            data-target="#modal_template_edit"
                            aria-labelledby="modal_template_edit"></button>
                    <div class="portal-ui subtitle-text text-center text-color-midnight-4">Шаблон добавления\редактирования</div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="career" role="tabpanel" aria-labelledby="carrer-tab">
            <div class="modal fade" id="addJobExp" tabindex="-1" aria-labelledby="addJobExp" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="modal-header">
                            <h4 class="text-color-secondary" id="exampleModalLabel">Опыт работы</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="portal-ui">
                                <div class="form-group">
                                    <label for="job-place">Место работы:</label>
                                    <input id="job-place" name="job-place" placeholder="Введите название компании" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="job-position">Должность:</label>
                                    <input id="job-position" name="job-position" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="job-responsibilities">Обязанности:</label>
                                    <textarea id="job-responsibilities" name="textarea" cols="40" rows="5" class="form-control" placeholder="Опишите, что входило в Ваши задачи, какие обязанности Вы выполняли"></textarea>
                                </div>
                                <div class="form-group mb-0"><label for="edu-date-start">Период:</label></div>
                                <div class="portal-ui form-row">
                                    <div class="form-group"><input type="text" class="form-control" id="edu-date-start" placeholder="ДД.ММ.ГГГГ"></div>
                                    <div class="form-group">&mdash;</div>
                                    <div class="form-group"><input type="text" class="form-control" id="edu-date-end" placeholder="ДД.ММ.ГГГГ"></div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="form-check form-check-inline portal-ui input-checkbox">
                                        <input name="checkbox" id="job-date-untilNow" type="checkbox" class="form-check-input" value="">
                                        <label for="job-date-untilNow" class="form-check-label">По настоящее время</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="portal-ui modal-footer">
                            <div class="btn-toolbar ml-auto" role="toolbar">
                                <button type="button" class="portal-ui btn-secondary" data-dismiss="modal">Назад</button>
                                <button type="button" class="portal-ui btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addAboutInfo" tabindex="-1" aria-labelledby="addAboutInfo" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="modal-header">
                            <h4 class="text-color-secondary" id="exampleModalLabel">О себе</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="portal-ui">
                                <div class="form-group">
                                    <label for="about-info">Обязанности:</label>
                                    <textarea id="about-info" name="textarea" cols="40" rows="5" class="form-control" placeholder="Внесите дополнительную информацию, которая может быть интересна работодателю"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="about-skills">Навыки</label>
                                    <select id="about-skills" class="form-control">
                                        <option selected></option>
                                        <option value="">пример 1</option>
                                        <option value="">пример 2</option>
                                        <option value="">пример 3</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="portal-ui modal-footer">
                            <div class="btn-toolbar col-12" role="toolbar">
                                <div class="btn-group"><button type="button" class="portal-ui btn-delete"><i class="icon-trash-can-24"></i>Удалить</button></div>
                                <div class="portal-ui btn-group ml-auto">
                                    <button type="button" class="portal-ui btn-secondary" data-dismiss="modal">Назад</button>
                                    <button type="button" class="portal-ui btn-primary">Сохранить</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addAboutEducation" tabindex="-1" aria-labelledby="addAboutEducation" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="portal-ui modal-header">
                            <h4 class="text-color-secondary" id="exampleModalLabel">Образование</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4"></button>
                        </div>
                        <div class="modal-body">
                            <form class="portal-ui">
                                <div class="form-group">
                                    <label for="edu-level">Уровень образования:</label>
                                    <select id="edu-level" class="form-control">
                                        <option selected>Выберете из списка</option>
                                        <option value="">пример 1</option>
                                        <option value="">пример 2</option>
                                        <option value="">пример 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edu-form">Форма обучения</label>
                                    <select id="edu-form" class="form-control">
                                        <option selected>Выберете из списка</option>
                                        <option value="">пример 1</option>
                                        <option value="">пример 2</option>
                                        <option value="">пример 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edu-place">Учебное заведение:</label>
                                    <input type="text" class="form-control" id="edu-place" name="edu-place">
                                </div>
                                <div class="form-group">
                                    <label for="edu-faculty">Факультет:</label>
                                    <input type="text" class="form-control" id="edu-faculty" name="edu-faculty">
                                </div>
                                <div class="form-group">
                                    <label for="edu-specilty">Специальность:</label>
                                    <input type="text" class="form-control" id="edu-specilty" name="edu-specilty">
                                </div>
                                <div class="form-group mb-0"><label for="edu-date-start">Cроки обучения:</label></div>
                                    <div class="portal-ui form-row">
                                        <div class="form-group"><input type="text" class="form-control" id="edu-date-start" placeholder="ДД.ММ.ГГГГ"></div>
                                        <div class="form-group">&mdash;</div>
                                        <div class="form-group"><input type="text" class="form-control" id="edu-date-end" placeholder="ДД.ММ.ГГГГ"></div>
                                    </div>
                                <div class="form-group mb-2">
                                    <div class="form-check form-check-inline portal-ui input-checkbox">
                                        <input name="checkbox" id="job-date-untilNow" type="checkbox" class="form-check-input" value="">
                                        <label for="job-date-untilNow" class="form-check-label">По настоящее время</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="portal-ui modal-footer">
                            <div class="btn-toolbar col-12" role="toolbar">
                                <div class="btn-group"><button type="button" class="portal-ui btn-delete"><i class="icon-trash-can-24"></i>Удалить</button></div>
                                <div class="portal-ui btn-group ml-auto">
                                    <button type="button" class="portal-ui btn-secondary" data-dismiss="modal">Назад</button>
                                    <button type="button" class="portal-ui btn-primary">Сохранить</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-inline-flex flex-column col-8">
                    <div class="portfolio-career">
                        <div class="portfolio-career-header d-flex flex-row col-12">
                            <div><h5>Опыт работы:</h5></div>
                            <div class="ml-auto portal-ui"><button type="button" class="btn-add btn-thd"><i class="icon-plus-24 text-primary"></i>Добавить</button></div>
                        </div>
                        <div class="portfolio-career-card d-flex flex-row justify-content-sm-around col-12">
                            <div class="card-datetime d-flex flex-column col-2">
                                <div class="w-75">март 2022  — сентрябрь 2022 </div>
                                <div>6 месяцев</div>
                            </div>
                            <div class="card-content d-flex flex-column col-8">
                                <div class="portal-ui text-secondary"><h6>ООО “Автоматизация 1С”  —  Программист (стажер)</h6></div>
                                <div class="portal-ui text">
                                    <ul>
                                        <li>программирование новых отчетов и печатных форм в информационных базах 1С;</li>
                                        <li>интеграция рабочих баз данных с внешними API;</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-edit d-flex flex-column align-items-end col-1">
                                <button class="portal-ui btn btn-icon"><i class="icon-pensil-24 text-muted"></i></button>
                            </div>
                        </div>
                        <div class="portfolio-career-card d-flex flex-row justify-content-sm-around col-12">
                            <div class="card-datetime d-flex flex-column col-2">
                                <div class="w-75">март 2022  — сентрябрь 2022 </div>
                                <div>6 месяцев</div>
                            </div>
                            <div class="card-content d-flex flex-column col-8">
                                <div class="portal-ui text-secondary"><h6>ООО “Автоматизация 1С”  —  Программист (стажер)</h6></div>
                                <div class="portal-ui text">
                                    <ul>
                                        <li>программирование новых отчетов и печатных форм в информационных базах 1С;</li>
                                        <li>интеграция рабочих баз данных с внешними API;</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-edit d-flex flex-column align-items-end col-1">
                                <button class="portal-ui btn btn-icon"><i class="icon-pensil-24 text-muted"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-career">
                        <div class="portfolio-career-header d-flex flex-row col-12">
                            <div><h5>Опыт работы:</h5></div>
                        </div>
                        <div class="portfolio-career-card empty">
                            <div class="portal-ui text-color-midnight-4 icon-internship-32 icon-large"></div>
                            <div class="portal-ui text subtitle-text col-6 text-center">Добавьте информацию и о том, где Вы работали, или работаете на текущий момент</div>
                            <div><button type="button" class="portal-ui btn-simple" data-toggle="modal" data-target="#addJobExp">Добавить опыт работы</button></div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column col-4">
                    <div class="portfolio-career about">
                        <div class="portfolio-career-header d-flex flex-row col-12">
                            <div><h5>О себе:</h5></div>
                        </div>
                        <div class="portfolio-career-card about d-flex flex-column">
                            <div class="d-flex flex-row justify-content-between col-12">
                                <div class="portal-ui text col-11">Имею опыт разработки сайтов для B2B проектов. Во время прохождения стажировки в компании «Х» месяц
                                    заменял Junior-программиста и полностью выполнял его обязанности.
                                    Есть опыт общения с клиентами и составления ТЗ по их требованиям.</div>
                                <div class="col-1 text-center">
                                    <button class="portal-ui btn btn-icon"><i class="icon-pensil-24 text-muted"></i></button>
                                </div>
                            </div>
                            <div class="portal-ui text-capitals text-color-midnight-4">Навыки:</div>
                            <div class="portal-ui col-12">
                                <span class="badge badge-secondary light mb-1">Язык программирования - C#</span>
                                <span class="badge badge-secondary light mb-1">Английский язык - B1</span>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-career about">
                        <div class="portfolio-career-header d-flex flex-row col-12">
                            <div><h5>О себе:</h5></div>
                        </div>
                        <div class="portfolio-career-card empty">
                            <div class="portal-ui text-color-midnight-4 icon-essey-32 icon-large"></div>
                            <div class="portal-ui text subtitle-text col-6 text-center">Добавьте информацию о себе и своих навыках</div>
                            <div><button type="button" class="portal-ui btn-simple" data-toggle="modal" data-target="#addAboutInfo">Написать о себе</button></div>
                            <div><button type="button" class="portal-ui btn-simple" data-toggle="modal" data-target="#addAboutEducation">Образование</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="{{asset('js/app.js')}}"></script>
<script>
    $('document').ready(function (){
        $.fn.modal.Constructor.prototype._enforceFocus = function() {};
        $('select').select2({
            theme: "portal-ui"
        });
        $('#edu_type').select2({
            minimumResultsForSearch: Infinity,
            theme: "portal-ui_flat"
        });
    });
</script>
@endsection
