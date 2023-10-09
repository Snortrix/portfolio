@extends('adminlte::page')

@section('title', 'Портфолио студента')
@section('adminlte_css')
@stack('css')
<link rel="stylesheet" href="{{asset('css/icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/portal-ui.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/portal-portfolio.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/select2-portal-ui.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/select2-portal-ui_flat.css')}}" type="text/css">

<link href="{{asset('vendor/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet" />
<!--<link href="{{asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.min.css')}}" rel="stylesheet" />-->
<link href="{{asset('vendor/bootstrap-fileinput/themes/portal-ui/theme.css')}}" rel="stylesheet" />
    <style>
        @media (min-width: 576px) {
            .portal-ui.modal-dialog, .portal-ui .modal-dialog {
                max-width: 540px;
            }
        }
    </style>
@endsection
@section('content')
    @if(!empty($error))
        @if($error == 'not_univer')
            <div class="alert alert-default-warning">Упс! Похоже система не смогла найти вас а базе студентов. Если же вы являетесь студентом, то напишите на почту <b>support@rosnou.ru</b> прислав скриншот или описание этой ошибки и мы постараемся решить данную проблему.</div>
        @elseif($error == 'not_record_book')
            <div class="alert alert-default-warning">Система не нашла у вас ни одной зачетной книжки. Возможно вы еще ничего не сдавали или же прошло слишком мало времени и информация еще не была внесена в систему. Зайдите немного позже или напишите на <b>support@rosnou.ru</b>.</div>
        @endif
    @else
<div class="new_header_portfolio portal-ui">
    <div class="field_columns_header_portfolio">
        <div class="fio_columns_header_portfolio">
            <div class="portfolio-avatar" id="avatar" style="display: inline-block;width: 100px;height: 100px;line-height: 100px;border-radius: 50px;text-align: center;color: white;font-size:28px;"><!--"<img src={{asset('../img/avatar.png')}}" width="100" height="100" alt="avatar" />--></div>
            <div class="data_columns" style="gap: 0px">
                <h4 class="text-color-secondary">{{$user_info['name']}}</h4>
                <p class="text text-color-secondary margon_null">{{$record_books[0]['level']}} ({{$record_books[0]['form']}} форма)</p>
                @if($isModerator)
                    <button class="primary_button m-0 mt-3" id="portfolioApproveButton">Одобрить</button>
                @endif
            </div>
        </div>
        <div class="columns_header_portfolio">
            <div class="data_columns">
                <p class="text-capitals text-color-midnight-4 margon_null">почта:</p>
                <p class="text text-color-secondary margon_null">{{$user_info['email']}}</p>
            </div>
            <div class="data_columns">
                <p  class="text-capitals text-color-midnight-4 margon_null">мобильный телефон:</p>
                <p class="text text-color-secondary margon_null">{{$user_info['phone']}}</p>
            </div>
        </div>
        <div class="columns_header_portfolio">
            <div class="data_columns">
                <p class="text-capitals text-color-midnight-4 margon_null">Специальность:</p>
                <p class="text text-color-secondary margon_null">{{$record_books[0]['specialty']}}</p>
            </div>
            <div class="data_columns">
                <p class="text-capitals text-color-midnight-4 margon_null">Профиль:</p>
                <p class="text text-color-secondary margon_null">{{$record_books[0]['profile']}}</p>
            </div>
        </div>
    </div>
    <div class="portfolio-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="portal-ui text nav-link" href="#" data-toggle="tab" role="tab" type="button"
                   data-target="#performance" aria-controls="performance">Успеваемость</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="portal-ui text nav-link" href="#" data-toggle="tab" role="tab" type="button"
                   data-target="#activity" aria-controls="activity">Учебная деятельность</a>
            </li>
            <li class="nav-item">
                <a class="portal-ui text nav-link portfolio" href="#" data-toggle="tab" role="tab" type="button"
                   data-target="#achievements" aria-controls="achievements">
                    Достижения
                    @if($portfolio?->status === 2)
                        <div class="badge badge-light-success badge-portfolio"><span class="portal-ui text-success text-small icon-tick-16"></span></div>
                    @elseif($portfolio?->status === 1)
                        <div class="badge badge-light-warning badge-portfolio"><span class="portal-ui text-warning text-small @if($isModerator) icon-clock-24 @else icon-warning-16 @endif"></span></div>
                    @else
                        <div class="badge badge-light-primary badge-portfolio"><span class="portal-ui text-primary text-small @if($isModerator) icon-reload-24 @else icon-clock-24 @endif"></span></div>
                    @endif
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="portal-ui text nav-link" href="#" data-toggle="tab" role="tab" type="button"
                   data-target="#career" aria-controls="career">Карьера</a>
            </li>-->
        </ul>
    </div>
</div>
<div class="tab-content portal-ui main_panel_content_portfolio">
        <div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance-tab">
            <div class="d-flex flex-row justify-content-between">
                <div class="w-100 margin_bottom_32">
                    <select id="performanceRecordBook" name="performanceRecordBook" class="form-control" data-minimum-results-for-search="Infinity">
                        @foreach ($record_books as $v)
                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="performanceContent"></div>
        </div>
        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="performance-tab">
            <div class="d-flex flex-row justify-content-between">
                <div class="w-100 margin_bottom_32">
                    <select id="activityRecordBook" name="activityRecordBook" class="form-control" data-minimum-results-for-search="Infinity">
                        @foreach ($record_books as $v)
                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="activityContent"></div>
            <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="modal-header">
                            <h4 class="text-color-secondary" id="modal-card-title">Учебная деятельность</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="portal-ui modal-footer">
                            <div class="portal-ui btn-toolbar col-12" role="toolbar">
                                <button type="button" class="portal-ui btn-secondary col" data-dismiss="modal">Закрыть</button>
                                <button type="button" class="portal-ui btn-primary col">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="achievements" role="tabpanel" aria-labelledby="achievements-tab">
            <div class="modal fade portfolio" id="modal_generate" tabindex="-1" aria-labelledby="modal_generate" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="modal-header">
                            <h4 class="text-color-secondary" style="flex-wrap: wrap;display: inline-flex;align-content: start;" id="modal-card-title">Учебное достижение</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="achievementForm" class="portal-ui">
                                <div class="form-group" id="achievementNamingType">
                                    <label for="achievementType">Тип достижения:</label>
                                    <select id="achievementType" name="achievementType" class="form-control" data-placeholder="Выберите тип" data-minimum-results-for-search="Infinity"></select>
                                </div>
                                <div id="achieveDivFields" style="display:none;"></div>
                            </form>
                        </div>
                        <div class="portal-ui modal-footer">
                            <div class="portal-ui justify-content-between w-100" id = "Achievents_group_edit" role="toolbar">
                                <button class="portal-ui tertiary_button text-color-midnight-3" id = "achievementDeleteButton"><span class="icon-Trash-can-24"></span> Удалить</button>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="portal-ui btn-secondary col" data-dismiss="modal">Закрыть</button>
                                    <button type="button" class="portal-ui btn-primary col" id = "achievementEditButton">Сохранить</button>
                                </div>
                            </div>
                            <div class="portal-ui btn-toolbar col-12" id = "Achievents_group_add" role="toolbar">
                                <button type="button" class="portal-ui btn-secondary col" data-dismiss="modal">Закрыть</button>
                                <button type="button" class="portal-ui btn-primary col" id="achievementCreate">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade portfolio" id="modal_moderator_generate" tabindex="-1" aria-labelledby="modal_generate" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="portal-ui modal-content">
                        <div class="modal-header">
                            <h4 class="text-color-secondary" style="flex-wrap: wrap;display: inline-flex;align-content: start;" id="modal-card-title_moderator">Учебное достижение</h4>
                            <button type="button" class="portal-ui icon-cross-24 text-color-midnight-4" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="achievementFormModerator" class="portal-ui">
                                <div class="form-group" id="achievementNamingTypeModerator">
                                    <label for="achievementNamingTypeModerator">Тип достижения:</label>
                                </div>
                                <div id="achieveDivFieldsModerator" style="display:none;"></div>
                            </form>
                        </div>
                        <div class="portal-ui modal-footer">
                            <div class="d-flex flex-row w-100" role="toolbar" style="flex: 1 1 0;">
                                <div class="portal-ui btn-toolbar col-12" style="display: none" id = "Achievents_group_editModerator" role="toolbar">
                                    <button type="button" class="portal-ui btn-secondary col" data-dismiss="modal" id="achievementDeleteButton">Закрыть</button>
                                    <button type="button" class="portal-ui btn-primary col" id="achievementEditSaveModerator">Сохранить</button>
                                </div>
                                <div class="flex-row w-100" id = "Achievents_group_addModerator" style="display: flex">
                                    <button type="button" class="portal-ui secondary_button" id="achievementEditModerator" style="flex: 1 1 0;" onclick=""><span class="icon-pensil-16 text-color-midnight-4 margin-right-10"></span>Редактировать</button>
                                    <div class="d-flex flex-row show" style="align-items: center;flex: 1 1 0;">
                                        <button class="primary_button primary_button_split_left m-0 d-flex" achievementid="id" id="achievementApproveButton" style="align-items: center;flex: 1 1 0;justify-content: center;"><span class="icon-tick-16 text-color-white" style="margin-right: 10px"></span>Одобрить</button>
                                        <button class="primary_button primary_button_split_right" id="dropDownModerator" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-caret-down-16 text-color-midnight-2"></span></button>
                                        <ul class="dropdown-menu dropdownMenu" aria-labelledby="dropDownModerator">
                                            <li class="dropdown-item portal-ui text align-items-center" id="achievementRevisionButton" role="button"><span class="icon-back-24 text-color-midnight-4 margin-right-12"></span>На доработку</li>
                                            <li class="dropdown-item portal-ui text align-items-center" id="achievementRejectedButton"><span class="icon-cross-24 text-color-midnight-4 margin-right-12"></span>Отклонить</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade portal-ui" id="DeleteModal" tabindex="-1" aria-labelledby="modal_delete" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal_body">
                        <div class="warning_icons">
                            <span class="icon-warning-32 style_warning_icons"></span>
                        </div>
                        <div class="modal_body_text">
                            <h4 class="text-color-secondary">Удалить достижение?</h4>
                            <p class="m-0 text text-color-secondary" style="text-align: center">Вся информация будет удалена без возможности восстановления</p>
                        </div>
                        <div class="modal_body_footer">
                            <button class="secondary_button w-50" data-dismiss="modal">Не удалять</button>
                            <button class="primary_button w-50" id="DeleteAchievementsButton">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="achievementContent"></div>

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
    @endif
@stop
@section('js')
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/js/fileinput.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/js/locales/ru.js')}}"></script>
<!--<script src="{{asset('vendor/bootstrap-fileinput/themes/fas/theme.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js')}}"></script>-->
<script src="{{asset('vendor/bootstrap-fileinput/themes/portal-ui/theme.js')}}"></script>
<script>
    $('document').ready(function (){
        $.fn.modal.Constructor.prototype._enforceFocus = function() {};
        $('select.form-control').select2({theme: "portal-ui"});
        $('#activityRecordBook').select2({theme: "portal-ui_flat"});
        $('#performanceRecordBook').select2({theme: "portal-ui_flat"});
    });
</script>

<script type="text/javascript">
    var stringToColor = function stringToColor(str) {
        var hash = 0;
        var color = '#';
        var i;
        var value;
        var strLength;
        if(!str) {
            return color + '333333';
        }
        strLength = str.length;
        for (i = 0; i < strLength; i++) {
            hash = str.charCodeAt(i) + ((hash << 5) - hash);
        }
        for (i = 0; i < 3; i++) {
            value = (hash >> (i * 8)) & 0xFF;
            color += ('00' + value.toString(16)).substr(-2);
        }
        return color;
    };
    document.getElementById('avatar').innerHTML = '{{$user_info['initials']}}';
    document.getElementById('avatar').style.backgroundColor = stringToColor('{{$user_info['initials']}}');

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    });

    let FileUpload = {
        temp : {
            uploadUrl: null,
            uploadId: null,
            uploadModel: null,
            uploadExtra: null
        },
        settings: {
            userId: 0,
            base: {
                theme: "portal-ui",
                initialPreviewConfig: [], // edit
                initialPreview: [], // edit
                uploadUrl: () => FileUpload.temp.uploadUrl ?? '/file',
                uploadExtraData: function(previewId, index) {
                    let extra = FileUpload.temp.uploadExtra ?? {};
                    return {
                        key: index,
                        id: FileUpload.temp.uploadId,
                        model: FileUpload.temp.uploadModel,
                        extra: JSON.stringify(extra),
                        user: FileUpload.settings.userId,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    };
                },
                language: "ru",
                dropZoneTitle: '<img src="/img/upload-document.svg" class="drop-zone-img">',
                //dropZoneTitleClass: 'portal-drop-zone-document',
                dropZoneClickTitle: '<p>Перетащите файлы сюда или кликните на область</p><p>Принимаются файлы в формате PDF, JPG, PNG. Пожалуйста, убедитесь, что текст на предоставленных копиях разборчив.</p>',
            }
        },
        instances: {},
        init() {},
        newInstance(name, block, handler, options = {}) {
            let base = Object.assign({}, FileUpload.settings.base);
            if(!options.hasOwnProperty('preview')) options.preview = [];
            if(!options.hasOwnProperty('previewConfig')) options.previewConfig = [];
            if(!options.hasOwnProperty('accept')) options.accept = ['jpg','png','pdf'];
            if(!options.hasOwnProperty('multiple')) options.multiple = true;
            if(!options.hasOwnProperty('withoutFiles')) options.withoutFiles = false;
            options.handler = handler;
            options.block = block;
            let inputAccept = [];
            let textAccept = [];
            options.accept.forEach(function(elem){
                if(elem === 'jpg') inputAccept.push('.jpeg');
                inputAccept.push('.'+elem);
                textAccept.push(elem.toUpperCase());
            });
            let inputId = 'fileUpload'+name;
            let $input = $('<input>',{id:inputId,name:'file_upload',type:'file',accept:inputAccept.join(', '),multiple:options.multiple});
            base.initialPreview = options.preview;
            base.initialPreviewConfig = options.previewConfig;
            $(block).empty().append($input);
            let $file = $('#'+inputId);
            $file.fileinput('destroy').off();
            FileUpload.instances[name] = {elem:$file.fileinput(base).on('fileuploaded', handler),options:options};
            return this;
        },
        validate(name) {
            if(name in this.instances) {
                $(this.instances[name].options.block).find('.file-drop-zone').removeClass('is-invalid');
                if($(this.instances[name].elem).fileinput('getFilesCount') > 0) return false;
                else if($(this.instances[name].elem).fileinput('getPreview').config.length > 0) return false;
                else if(this.instances[name].options.withoutFiles) return false;
                else {
                    $(this.instances[name].options.block).find('.file-drop-zone').addClass('is-invalid');
                    return true;
                }
            }
            return false;
        },
        startUpload(name,id,model,extra=null,fn=null) {
            if(name in this.instances) {
                $(this.instances[name].options.block).find('.file-drop-zone').removeClass('is-invalid')
                this.temp.uploadId = id;
                this.temp.uploadModel = model;
                this.temp.uploadExtra = extra;

                if($(this.instances[name].elem).fileinput('getFilesCount') > 0) {
                    $(this.instances[name].elem).off();
                    if(typeof fn == 'function') {
                        $(this.instances[name].elem).on('filebatchuploadcomplete', fn)
                    }

                    $(this.instances[name].elem).fileinput('upload');
                } else if(this.instances[name].options.withoutFiles) {
                    this.instances[name].options.handler('', '', '');
                }
                else {
                    $(this.instances[name].options.block).find('.file-drop-zone').addClass('is-invalid')
                    return false;
                }
                return true;
            }
            return false;
        },
        setUser(user) {
            this.settings.userId = user;
            return this;
        },
        testHandler(event, data, msg) {
            console.log(event, msg);
            console.log(data);
        }
    }


    let Portfolio = {
        temp: {
            uploadId: null,
            activity: null
        },
        settings: {
            userId: 0,
            baseLink: '',
            types: [],
            categories: [],
            performanceRecordBook: $("#performanceRecordBook"),
            performanceContent: $("#performanceContent"),
            activityRecordBook: $("#activityRecordBook"),
            activityContent: $("#activityContent"),
            activityModal: $('#activityModal'),
            activityModalContent: $('#activityModal').find('.modal-body'),
            achievementContent: $("#achievementContent"),
            achievementsAddModal: $('#modal_generate'),
            achievementsModalModerator: $('#modal_moderator_generate'),
            selectachievementType: $("select#achievementType"),
            achieveModalDiv: $("#achieveDivFields"),
            achieveModalDivModerator: $("#achieveDivFieldsModerator"),
            achieveModalDelete: $("#DeleteModal"),
            createAchievementBtn: $("#achievementCreate"),
            portfolioApproveButton: $("#portfolioApproveButton"),
            loader: '<div class="text-center"><div class="spinner-border m-1 text-primary" style="width: 6rem; height: 6rem;border-width: .15em;" role="status"><span class="sr-only">Loading...</span></div></div>',
            educationIcon: {
                vkr: 'icon-diploma-large',
                pr: 'icon-internship-large',
                kr: 'icon-coursework-large',
                ref: 'icon-coursework-large'
            },
            fileUpload: {
                theme: "portal-ui",
                uploadUrl: '/file', // edit
                initialPreviewConfig: [], // edit
                initialPreview: [], // edit
                uploadExtraData: function(previewId, index) {
                    return {key: index, uploadId: Portfolio.temp.uploadId};
                },
                language: "ru",
                dropZoneTitle: '<img src="/img/upload-document.svg" class="drop-zone-img">',
                //dropZoneTitleClass: 'portal-drop-zone-document',
                dropZoneClickTitle: '<p>Перетащите файлы сюда или кликните на область</p><p>Принимаются файлы в формате PDF, JPG, PNG. Пожалуйста, убедитесь, что текст на предоставленных копиях разборчив.</p>',
            }
        },
        init() {
            this.start.parent = this;
            this.load.parent = this;

            this.settings.baseLink = '/students/portfolio/'+this.settings.userId+'/';

            this.start.changePerformanceBook();
            this.start.changeActivityBook();
            this.start.changeNavTab();
            this.start.startTab();
            this.start.approvePortfolio();
        },
        start: {
            changePerformanceBook() {
                let $select = $(Portfolio.settings.performanceRecordBook);
                $select.on('change',function(){
                    let id = $(this).val();
                    Portfolio.load.performanceStart(id);
                });
            },
            changeActivityBook() {
                let $select = $(Portfolio.settings.activityRecordBook);
                $select.on('change',function(){
                    let id = $(this).val();
                    Portfolio.load.activityStart(id);
                });
            },
            changeNavTab() {
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    //e.relatedTarget // previous active tab
                    let target = e.target;
                    let name = $(target).attr('aria-controls');
                    if(name === 'performance') $(Portfolio.settings.performanceRecordBook).change();
                    if(name === 'activity') $(Portfolio.settings.activityRecordBook).change();
                    if(name === 'achievements') Portfolio.load.achievementStart();
                });
            },
            startTab() {
                let $tab = $('a[role="tab"][data-target="'+document.location.hash+'"]');
                if($tab.length == 0) $tab = $('a[role="tab"][aria-controls="performance"]');
                $tab.click();
            },
            activityEditButton() {
                $('.btnEducationEdit').off('click').on('click',function(){
                    let activity = $(this).data('activity') ?? 0;
                    let id = $(this).data('id') ?? 0;
                    let rb = $(this).data('rb') ?? 0;
                    $(Portfolio.settings.activityModal).modal('show');
                    Portfolio.load.activityEditStart(id,rb,activity);
                });
            },
            achievementAddCard(data) {
                $('.achievementAddCard').off('click').on('click',function(){
                    Portfolio.generate.part.deleteDataModals(2,'#Achievents_group_edit','#Achievents_group_add');
                    let category = $(this).data('category');
                    let option = [];
                    Object.assign(option,Portfolio.settings.categories[category].types);
                    option.unshift({id: -1, text: ''});
                    let $select = $(Portfolio.settings.selectachievementType);
                    $(Portfolio.settings.achievementsAddModal).find('#modal-card-title').text(Portfolio.settings.categories[category].modalName);
                    //if($select.data('category') !== category)
                    $select.val(-1).change().off('change').select2('destroy').empty()
                    $select.data('category',category)
                        .select2({placeholder: {id: '-1',text: 'Выберите тип'},theme: "portal-ui", data:option})
                        .on('change',function(){
                            Portfolio.generate.content.achievementsAddModal($(this).val(), data);
                        });
                    $(Portfolio.settings.achievementsAddModal).modal('show');
                });
            },
            mask() {
                $('.inputmask-dataformat').inputmask({alias: "datetime", inputFormat: "dd.mm.yyyy"});
            },
            achievementEditCard(data) {
                function edit(dataEl,nameHeader,module,generate,headerModal){
                    let category = null;
                    let foreign_id = null;
                    let categoryName_id = null;
                    $.each(data,function (key,data){
                        if (data.id == dataEl){
                            foreign_id = key;
                            category = data.type;
                        }
                    });
                    let typeCategories = Portfolio.settings.categories[Portfolio.settings.types[category].type];
                    $.each(typeCategories.types, function (keyType,dataCategories){
                        if (data[foreign_id].type == dataCategories.id){
                            categoryName_id = keyType;
                        }
                    });

                    let headerText = $('<div>',{id:'headerTextSelect',name:'achievementType',value: typeCategories.types[categoryName_id].id});
                    let textHead = $('<p>',{class:'portal-ui text text-color-secondary m-0',name:'achievementType',value: typeCategories.types[categoryName_id].id ,text:typeCategories.types[categoryName_id].text});
                    let inputHead = $('<input>',{class:'d-none',name:'achievementType',id:'achievementType',value: typeCategories.types[categoryName_id].id});

                    $(nameHeader).append(headerText.append(textHead).append(inputHead));

                    $(module).find(headerModal).text(typeCategories.modalName);
                    $(module).find(headerModal).append(Portfolio.generate.part.achievementBadge(data[foreign_id].status));
                    generate(category, data[foreign_id],true);
                    $(module).modal('show');
                }
                $('.achievementEditCard').off('click').on('click',function(){
                    Portfolio.generate.part.deleteDataModals(1,'#Achievents_group_edit','#Achievents_group_add');
                    let dataEl = $(this).attr('type');
                    $('#achievementDeleteButton').attr('type',dataEl);
                    $('#achievementEditButton').attr('type',dataEl);
                    edit(dataEl,'#achievementNamingType',Portfolio.settings.achievementsAddModal,Portfolio.generate.content.achievementsAddModal,'#modal-card-title')
                });
                $('#achievementEditModerator').off('click').on('click',function(){
                    Portfolio.generate.part.deleteDataModals(1,'#Achievents_group_editModerator','#Achievents_group_addModerator');
                    let dataEl = $('#achievementApproveButton').attr('achievementid');
                    $('#achievementEditSaveModerator').attr('type',dataEl);
                    edit(dataEl,'#achievementNamingTypeModerator',Portfolio.settings.achievementsAddModalModerator,Portfolio.generate.content.achievementsAddModalModerator,'#modal-card-title_moderator')
                });
            },
            achievementViewModerator(data){
                $('.achievementViewModerator').off('click').on('click',function(){
                    Portfolio.generate.part.deleteDataModals(2,'#Achievents_group_editModerator','#Achievents_group_addModerator');
                    $('#headerTextSelect').remove();
                    let dataEl = $(this).attr('type');
                    let category = null;
                    let foreign_id = null;
                    let categoryName_id = null;
                    $.each(data,function (key,data){
                        if (data.id == dataEl){
                            foreign_id = key;
                            category = data.type;
                        }
                    });
                    let typeCategories = Portfolio.settings.categories[Portfolio.settings.types[category].type];
                    $.each(typeCategories.types, function (keyType,dataCategories){
                        if (data[foreign_id].type == dataCategories.id){
                            categoryName_id = keyType;
                        }
                    });
                    let headerText = $('<div>',{id:'headerTextSelect'});
                    let textHead = $('<p>',{class:'portal-ui text text-color-secondary m-0',text:typeCategories.types[categoryName_id].text});
                    $('#achievementNamingTypeModerator').append(headerText.append(textHead));

                    $(Portfolio.settings.achievementsModalModerator).find('#modal-card-title_moderator').text(typeCategories.modalName);
                    $(Portfolio.settings.achievementsModalModerator).find('#modal-card-title_moderator').append(Portfolio.generate.part.achievementBadge(data[foreign_id].status));
                    Portfolio.generate.content.achievementsAddModalModerator(category, data[foreign_id]);
                    $(Portfolio.settings.achievementsModalModerator).modal('show');
                });
            },
            achievementCreate() {
                $('#achievementCreate').off('click').on('click', async function () {
                let achievementType = $('#achievementType').val();
                    let empty = Portfolio.generate.part.inputEmpty('#achievementForm');
                    if (empty) return;

                    let data = $('#achievementForm').serializeArray();
                    data.push({name:'user_id',value:Portfolio.settings.userId});
                    //console.log(data);
                    Portfolio.load.ajaxPost(
                        '/students/achievement/create',
                        data,
                        function (xhr, textStatus) {
                            if (xhr.status === 200 && xhr.responseJSON.success) {
                                if (!$.isEmptyObject($('[name="file_upload"]').fileinput('getFileStack'))) {
                                   FileUpload.startUpload('Achievement',
                                       xhr.responseJSON.data.achievement_id, 'achievement',
                                       null,
                                       () => {
                                           Portfolio.settings.achievementsAddModal.modal('hide');
                                           Portfolio.load.achievementStart();
                                       });
                                }
                            }else {
                                if ($(Portfolio.settings.achieveModalDiv).find("#warning")) $("#warning").remove();
                                let TextWarning = $('<p>',{id:'warning',class:'text text-danger',text:xhr.responseJSON.message});
                                $(Portfolio.settings.achieveModalDiv)
                                    .append(TextWarning);
                            }
                        }
                    );
                });
            },
            achievementEditData(){
                function request(event) {
                    let empty = Portfolio.generate.part.inputEmpty(event.data.idEmpty);
                    if (empty) return;
                    let data = $(event.data.id).serializeArray();
                    let id = $(this).attr('type');
                    data.push({name:'user_id',value:Portfolio.settings.userId});
                    Portfolio.load.ajaxPost(
                        '/students/achievement/edit/' + id,
                        data,
                        function (xhr, textStatus) {
                            if (xhr.status === 200 && xhr.responseJSON.success) {
                                if (!$.isEmptyObject($('[name="file_upload"]').fileinput('getFileStack'))) {
                                    FileUpload.startUpload('Achievement',
                                        xhr.responseJSON.data.achievement_id,
                                        'achievement',
                                        null,
                                        () => {
                                            event.data.modals.modal('hide');
                                            Portfolio.load.achievementStart();
                                        });
                                } else {
                                    event.data.modals.modal('hide');
                                    Portfolio.load.achievementStart();
                                }
                            } else {
                                if ($(event.data.divsError).find("#warning")) $("#warning").remove();
                                let TextWarning = $('<p>',{id:'warning',class:'text text-danger',text:xhr.responseJSON.message});
                                $(event.data.divsError).append(TextWarning);
                            }
                        }
                    );
                }
                $('#achievementEditButton').off('click').on('click', {id:'#achievementForm',idEmpty:'#achievementForm' ,modals:Portfolio.settings.achievementsAddModal,divsError:Portfolio.settings.achieveModalDiv}, request);
                $('#achievementEditSaveModerator').off('click').on('click', {id:'#achievementFormModerator',idEmpty:'#achievementFormModerator',modals:Portfolio.settings.achievementsModalModerator,divsError:Portfolio.settings.achieveModalDivModerator}, request);
            },
            achievementDeleteData(){
                $('#achievementDeleteButton').off('click').on('click', async function () {
                    Portfolio.settings.achievementsAddModal.modal('hide');
                    Portfolio.settings.achieveModalDelete.modal('show');
                    $('#DeleteAchievementsButton').attr('achievement_id',$(this).attr('type'));
                });
                $('#DeleteAchievementsButton').off('click').on('click', async function () {
                    let dataId = $(this).attr('achievement_id');
                    Portfolio.load.ajaxPost(
                        '/students/achievement/delete/' + dataId,
                        {
                            user_id: Portfolio.settings.userId
                        },
                        function (xhr) {
                            if (xhr.status === 200 ) {
                                $('#achievement_'+dataId).remove();
                                Portfolio.settings.achieveModalDelete.modal('hide');
                            }
                        }
                    );
                });
            },
            achievementEditStatus(){
                function request(event){
                    if(event.data.bool){
                        if($('#achieve_field_comment').val().trim().length == 0){
                            if ($('#achieve_field_comment').hasClass("warning_empty")) return;;
                            $('#achieve_field_comment').addClass("warning_empty");
                            $('#group_achieve_field_comment').append($('<p>', {id: 'warning', class: 'text text-danger m-0', text: 'Для данного типа статуса комментарий обязателен !'}));
                            return;
                        }
                    }
                    let id = $('#achievementApproveButton').attr('achievementid');
                    let comment = $('[name = achieve_field_comment]').val();
                    let data = {
                        user_id: Portfolio.settings.userId,
                        status: event.data.status,
                        comment: comment
                    };

                    Portfolio.load.ajaxPost(
                        '/students/achievement/approve/' + id,
                        data,
                        function (xhr) {
                            if (xhr.status === 200 && xhr.responseJSON.success) {
                                Portfolio.settings.achievementsModalModerator.modal('hide');
                                Portfolio.load.achievementStart();
                            }else {
                                if ($(Portfolio.settings.achievementsModalModerator).find("#warning")) $("#warning").remove();
                                let TextWarning = $('<p>',{id:'warning',class:'text text-danger',text:xhr.responseJSON.message});
                                $(Portfolio.settings.achievementsModalModerator)
                                    .append(TextWarning);
                            }
                        });
                }
                $('#achievementApproveButton').off('click').on('click', {bool:false,status:2}, request);
                $('#achievementRevisionButton').off('click').on('click', {bool:true,status:1}, request);
                $('#achievementRejectedButton').off('click').on('click', {bool:true,status:3}, request);
            },
            achievementAddLinkField(param, e) {
                let max = -1;
                $('div[name=achieve_field_'+param.name+']').each(function(key,val){
                    if($(val).data('num') > max) max = $(val).data('num');
                });
                let $link = Portfolio.generate.field.linkGroup(param,null,max+1);
                $link.insertBefore($(e));
                //console.log(max);
            },
            approvePortfolio() {
                Portfolio.settings.portfolioApproveButton.off('click').on('click', function () {
                    Portfolio.load.ajaxPost(
                        '/students/portfolio/approve/{{ $portfolio?->id }}',
                        {
                            status: 2
                        },
                        function () {}
                    );
                })
            },
        },
        load: {
            ajaxGet(url, funcSuccess, block) {
                $(block).empty().html(Portfolio.settings.loader);
                $.ajax({
                    method: "GET",
                    url: url,
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    complete: function(xhr, textStatus) {
                        if(xhr.status === 200 && xhr.responseJSON.success) return funcSuccess(xhr.responseJSON.data)
                        return Portfolio.load.error(block,xhr.responseJSON.message);
                    }
                });
            },
            ajaxPost(url, data, funcSuccess) {
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: data,
                    complete: funcSuccess
                });
            },
            performanceStart(id) {
                Portfolio.load.ajaxGet(
                    Portfolio.settings.baseLink+'get_marks/'+id,
                    Portfolio.load.performanceEnd,
                    Portfolio.settings.performanceContent
                );
            },
            performanceEnd(data) {
                $(Portfolio.settings.performanceContent).empty();
                Portfolio.generate.content.markTables(Portfolio.settings.performanceContent, data);
            },
            activityStart(id) {
                Portfolio.load.ajaxGet(
                    Portfolio.settings.baseLink+'get_activity_list/'+id,
                    Portfolio.load.activityEnd,
                    Portfolio.settings.activityContent
                );
            },
            activityEnd(data) {
                $(Portfolio.settings.activityContent).empty();
                Portfolio.generate.content.activityBody(Portfolio.settings.activityContent, data);
            },
            activityEditStart(id,rb,activity) {
                Portfolio.load.ajaxGet(
                    Portfolio.settings.baseLink+'get_activity/'+id+'/'+rb+'/'+activity,
                    Portfolio.load.activityEditEnd,
                    Portfolio.settings.activityModalContent
                );
            },
            activityEditEnd(data) {
                $(Portfolio.settings.activityModalContent).empty();
                Portfolio.generate.content.activityModal(Portfolio.settings.activityModalContent, data);
            },
            achievementStart() {
                Portfolio.load.ajaxGet(
                    '/students/achievement/' + Portfolio.settings.userId,
                    Portfolio.load.achievementEnd,
                    Portfolio.settings.achievementContent
                );
            },
            achievementEnd(data) {
                $(Portfolio.settings.achievementContent).empty();
                Portfolio.generate.content.achievements(Portfolio.settings.achievementContent, data);
            },
            error(block, error) {
                $(block).html('<p class="text-danger" style="margin:5px;">Ошибка! '+error+'</p>');
            }
        },
        generate: {
            field: {
                init(param, value = null) {
                    if(param.type in this) return this[param.type](param, value);
                    return null;
                },
                string(param, value) {
                    let ident = 'achieve_field_'+param.name;
                    let $formGroup = $('<div>',{class:'form-group', id:'group_'+ident});
                    let $label = $('<label>',{for:ident,text:param.title+':'});
                    let inputParam = {type:'text',class:'form-control',id:ident,name:ident};
                    if(param.placeholder !== undefined && param.placeholder !== '') inputParam.placeholder = param.placeholder;
                    if(value !== null){
                        $.each(value.fields, function(id, val){
                           if (ident == id){
                               inputParam.value = val;
                           }
                        });
                    }
                    let $input = $('<input>',inputParam);
                    return $formGroup.append($label).append($input);
                },
                /* value = {start:'дд.мм.гггг',end:'дд.мм.гггг'}*/
                date(param, value) {
                    let ident = 'achieve_field_'+param.name;
                    let $formGroup = $('<div>',{class:'form-group', id:'group_'+ident});
                    let $formGroupLabel = $('<div>',{class:'form-group mb-0'});
                    let $label = $('<label>',{for:ident,text:param.title+':'});
                    let $formRow = $('<div>',{class:'portal-ui form-row'});
                    let inputParamS = {type:'text',class:'form-control inputmask-dataformat',placeholder:'dd.mm.yyyy',id:ident+'_start',name:ident+'_start'};
                    let inputParamE = {type:'text',class:'form-control inputmask-dataformat',placeholder:'dd.mm.yyyy',id:ident+'_end',name:ident+'_end'};
                    if(value !== null) {
                        inputParamS.value = value.fields.achieve_field_date_start;
                        if(value.fields.achieve_field_date_end !== undefined && value.fields.achieve_field_date_end !== "" && value.fields.achieve_field_date_start !== value.fields.achieve_field_date_end) inputParamE.value = value.fields.achieve_field_date_end;
                    }
                    if((param.oneDay !== undefined && param.oneDay) || (param.currentDay !== undefined && param.currentDay)) {
                        let $formGroupDay = $('<div>',{class:'form-group mb-2'});
                        let $formCheck = $('<div>',{class:'form-check form-check-inline portal-ui input-checkbox'});
                        let cType = (param.oneDay !== undefined && param.oneDay) ? 'one' : 'current';
                        let $cInput = $('<input>',{type:'checkbox',class:'form-check-input',id:ident+'_'+cType,name:ident+'_'+cType,'data-ident':ident, value:'1'});
                        $cInput.on('change',function() {
                            if($(this).is(":checked")) {
                                $('#'+$(this).data('ident')+'_end').prop('disabled',true);
                                $('#'+$(this).data('ident')+'_end').val(null);
                            }else{
                                $('#'+$(this).data('ident')+'_end').prop('disabled',false);
                            }
                        });
                        if(value !== null) {
                            if((cType === 'one' && (value.fields.achieve_field_date_start === value.fields.achieve_field_date_end || value.fields.achieve_field_date_end === undefined || value.fields.achieve_field_date_end === "" || value.fields.achieve_field_date_end === null)) || (cType === 'current' && (value.fields.achieve_field_date_start === value.fields.achieve_field_date_end || value.fields.achieve_field_date_end === undefined || value.fields.achieve_field_date_end === "" || value.fields.achieve_field_date_end === null))){
                                $cInput.prop('checked',true);
                                inputParamE.disabled = 'true';
                            }
                        }
                        let $formRowGroupS = $('<div>',{class:'form-group'}).append($('<input>',inputParamS));
                        let $formRowGroupD = $('<div>',{class:'form-group',text:'—'});
                        let $formRowGroupE = $('<div>',{class:'form-group'}).append($('<input>',inputParamE));
                        $formRow.append($formRowGroupS).append($formRowGroupD).append($formRowGroupE);
                        $formGroup.append($formGroupLabel.append($label)).append($formRow);

                        $formCheck.append($cInput);
                        $formCheck.append($('<label>',{for:ident+'_'+cType,class:'form-check-label',text:(cType === 'one') ? 'Один день' : 'По настоящее время'}));
                        $formGroup.append($formGroupDay.append($formCheck));
                    }else{
                        let $formRowGroupS = $('<div>',{class:'form-group'}).append($('<input>',inputParamS));
                        let $formRowGroupD = $('<div>',{class:'form-group',text:'—'});
                        let $formRowGroupE = $('<div>',{class:'form-group'}).append($('<input>',inputParamE));
                        $formRow.append($formRowGroupS).append($formRowGroupD).append($formRowGroupE);
                        $formGroup.append($formGroupLabel.append($label)).append($formRow);
                    }

                    return $formGroup;
                },
                /* one and multi */
                select(param, value) {

                },
                link(param, value) {
                    let $div = $('<div>',{class:'form-group'});
                    if(value !== null && value.fields.achieve_field_links_data !== null) {
                        if (value.fields.achieve_field_links_data != undefined){
                            for (let numberLink = 0; numberLink < value.fields.achieve_field_links_data.length; numberLink++ )
                                $div.append(Portfolio.generate.field.linkGroup(param, value, numberLink));
                        }
                    }

                    let $button = $('<button>',{type:'button',class:'portal-ui subtitle-text-small'});
                    $button.append($('<i>',{class:'portal-ui icon-plus-24',style:'color: var(--base-primary);padding: 0px 6px;'}));
                    $button.append($('<span>',{text:'Добавить ссылку'}));
                    $button.on('click',function(){
                        Portfolio.start.achievementAddLinkField(param,$(this));
                    });
                    //$div.append($info);
                    $div.append($button);
                    return $div;
                },
                linkGroup(param, value, numLink) {
                    let ident = 'achieve_field_'+param.name;
                    let $div = $("<div>",{name:ident,id:ident+'_group_'+numLink,'data-num':numLink});
                    let $groupLink = this.linkElement(param, value, numLink,'data');
                    let $groupName = this.linkElement(param, value, numLink,'name');
                    return $div.append($groupLink).append($groupName);
                },
                linkElement(param, value, numLink, type) {
                    let i = (type === 'data') ? 0 : 1;
                    let ident = 'achieve_field_'+param.name+'_'+type;
                    let $group = $('<div>',{class:'form-group'});
                    let $label = $('<label>',{for:ident+'_'+numLink,text:param.title[i]+':'});
                    let $groupRow = $('<div>',{class:'portal-ui form-row-control'});
                    let inputParam = {type:'text',class:'form-control',id:ident+'_'+numLink, name:ident+'[]'};
                    if(param.placeholder !== undefined && param.placeholder[i] !== undefined && param.placeholder[i] !== '') inputParam.placeholder = param.placeholder[i];
                    let $close;
                    if(i === 0) {
                        if (value !== null)
                            inputParam.value = value.fields.achieve_field_links_data[numLink];
                        $close = $('<button>',{type:'button',class:'portal-ui icon-cross-24 text-color-midnight-4'})
                            .on('click',function(){
                                $('#achieve_field_'+param.name+'_group_'+numLink).remove();
                            });
                    }else {
                        if (value !== null)
                            inputParam.value = value.fields.achieve_field_links_name[numLink];

                        $close = $('<span>',{style:'width:36px;'});
                    }
                    $groupRow.append($('<input>',inputParam));
                    $groupRow.append($close);
                    return $group.append($label).append($groupRow);
                },
                text(param, value) {
                    let ident = 'achieve_field_'+param.name;
                    let $formGroup =  $('<div>',{class:'form-group', id:'group_'+ident});
                    let $label = $('<label>',{for:ident,text:param.title+':'});
                    let inputParam = {class:'form-control',id:ident,name:ident,rows:4};
                    if(param.placeholder !== undefined && param.placeholder !== '') inputParam.placeholder = param.placeholder;
                    if(value !== null) {
                        let tree = 'achieve_field_'+param.name;
                        inputParam.val = value.fields[tree];
                        if (inputParam.val == undefined && value.type == 15){
                            value.fields.achieve_field_role != undefined ? inputParam.val = value.fields.achieve_field_role : inputParam.val = value.fields.achieve_field_what;
                        }
                    }
                    let $input = $('<textarea>',inputParam);
                    return $formGroup.append($label).append($input);
                },
                field(param,value){
                    let $formGroup = $('<div>',{class:'form-group'});
                    let ident = 'achieve_field_'+param.name;
                    let $label = $('<label>',{for:ident,text:param.title+':'});
                    let inputParam = {type:'text',class:'m-0 text text-color-secondary',id:ident,name:ident};
                    if(param.placeholder !== undefined && param.placeholder !== '') inputParam.placeholder = param.placeholder;
                    if(value !== null){
                        $.each(value.fields, function(id, val){
                            if (ident == id){
                                inputParam.value = val;
                            }
                        });
                        if (inputParam.value  == undefined && param.name == 'date' && value.fields.achieve_field_date_end != undefined){
                            inputParam.value = value.fields.achieve_field_date_start + ' - ' + value.fields.achieve_field_date_end;
                        }else if(inputParam.value  == undefined && param.name == 'date' && (value.fields.achieve_field_date_end == undefined ||  value.fields.achieve_field_date_one != undefined)){
                            inputParam.value = value.fields.achieve_field_date_start;
                        }
                        //console.log(inputParam.value);
                        if (inputParam.value  == undefined && param.name == 'links') inputParam.value = value.fields.achieve_field_links_data + ', ' + value.fields.achieve_field_links_name;
                    }
                    let $input = $(`<p class="${inputParam.class}" id="${inputParam.id}">${inputParam.value}</p>`);
                    return $formGroup.append($label).append($input);
                },
                file(param, value) {

                    /* <input id="fileinput_identity" name="file_upload" type="file" accept=".jpg, .jpeg, .png, .pdf" multiple> */
                    let $input = $('<input>',{id:'testfileinput',name:'file_upload',type:'file',accept:'.jpg, .jpeg, .png, .pdf',multiple:'true'});
                    /*$input.fileinput(Portfolio.settings.fileUpload).on('fileuploaded', function(event, data, msg) {
                        console.log('filefile');
                    });*/
                    return $input;
                }
            },
            part: {
                achievementsCategoryHeader(cat) {
                    let $header = $('<div>', {class: 'portfolio-content-header d-inline-flex flex-row'});
                    $header.append($('<h6>', {class: 'text-secondary', text: cat.name}));
                    //console.log(cat.types);
                    let $tooltip = $('<div>', {class: 'portal-ui icon-question-mark-24 text-color-midnight-4 portfolio-header-tooltip'});
                    let $area = $('<div>', {class: 'portal-ui text text-secondary tooltip-area'});
                    let $areaHeader = $('<div>', {class: 'tooltip-area-header'});
                    $areaHeader.append($('<span>', {class: 'portal-ui icon-warning-32 text-color-midnight-4'}));
                    $areaHeader.append($('<h5>', {class: 'text-secondary', text: cat.description}));
                    let $areaContent = $('<div>', {class: 'tooltip-area-content'});
                    let $ul = $('<ul>');
                    $.each(cat.types, function (tK, tV) {
                        $ul.append($('<li>', {text: tV.text}));
                    });
                    return $header.append($tooltip.append($area.append($areaHeader).append($areaContent.append($ul))));
                },
                achievementAddCard(id, cat) {
                    let $card = $('<div>', {class: 'portfolio-ach-card empty'});
                    let $button = $('<button>', {
                        type: 'button',
                        class: 'portal-ui text-color-midnight-4 icon-plus-24 icon-round bg-color-midnight-6 p-4 achievementAddCard',
                        'data-category': id
                    });
                    let $text = $('<div>', {class: 'portal-ui subtitle-text text-center text-color-midnight-4', text: cat.buttonName});
                    return $card.append($button).append($text);
                },
                achievementCard(data, nameCat, icon) {
                    let $card = $('<div>', {class: {{$isModerator}} ? 'achievementViewModerator portfolio-ach-card d-flex flex-column portfolio' : 'achievementEditCard portfolio-ach-card d-flex flex-column portfolio'
                        ,type: data.id,style:'cursor:pointer', id: 'achievement_' + data.id});
                    let $header = $('<div>', {class: 'd-flex flex-row justify-content-between'});
                    let $header_icon = $('<div>', {class: 'portal-ui icon-round icon-round-large text-color-primary  icon-' + icon});
                    let $content = $('<div>')
                        .append($('<div>', {class: 'portal-ui subtitle-text', text: nameCat}))
                        .append($('<div>', {class: 'portal-ui text text-limited', text: Portfolio.generate.part.achievementsHeader(data)}));
                    let $badge = Portfolio.generate.part.achievementBadge(data.status);
                    return $card.append($header.append($header_icon)).append($content).append($badge);
                },
                achievementsHeader(data) {
                    switch (data.type) {
                        case 2:
                            return data.fields.achieve_field_disciplines;
                        case 12:
                            return data.fields.achieve_field_number;
                        default:
                            return data.fields.achieve_field_name;
                    }
                },
                achievementBadge(id) {
                    switch (id) {
                        case 0:
                            return $('<div>', {class: 'badge badge-light-primary mt-auto', text: {{$isModerator}} ? 'Изменено' : 'На проверке'});
                        case 1:
                            return $('<div>', {class: 'badge badge-light-warning mt-auto', text: {{$isModerator}} ? 'На доработке' : 'Есть замечание'});
                        case 2:
                            return $('<div>', {class: 'badge badge-light-success mt-auto', text: 'Одобрено'});
                        case 3:
                            return $('<div>', {class: 'badge badge-light-danger mt-auto', text: 'Отклонено'});
                    }
                },
                deleteDataModals(boolType, edit, add) {
                    $('#achieveDivFields').empty();
                    $('#headerTextSelect').remove();
                    $('.select2').remove();
                    if (boolType == 1) {
                        $(edit).css('display', 'flex');
                        $(add).css('display', 'none');
                    } else if (boolType == 0) {
                        $(edit).css('display', 'none');
                        $(add).css('display', 'none');
                    } else if (boolType == 2) {
                        $(edit).css('display', 'none');
                        $(add).css('display', 'flex');
                    }
                },
                moderatorNotification(typeNotification, iconNotification, commentModerator) {
                    let $div = $('<div>', {class: 'moderator_notification snackbar ' + typeNotification})
                        .append($('<span>', {class: 'snackbar_icons_first ' + iconNotification}))
                        .append($('<p>', {class: 'text portal-ui text-color-secondary m-0', text: commentModerator}));
                    return $div;
                },
                inputEmpty(header) {
                    let data = $(header).find("input");
                    let empty = false;
                    $.each(data, function (key, value) {
                        if (value.value.length != 0 && $('#' + value.id).hasClass('warning_empty')) $('#' + value.id).removeClass("warning_empty");
                        if ($('.file-preview').find('.file-preview-frame').length != 0 && $('.file-drop-zone').hasClass("warning_empty_data")) $('.file-drop-zone').removeClass("warning_empty_data");
                        if ($('#warning_' + value.id).length != 0) $('#warning_' + value.id).remove();
                        if (value.value.length == 0) {
                            if (value.id == 'fileUploadAchievement') {
                                let files = FileUpload.validate('Achievement');
                                if (files) empty = files;
                            }else if ($('#' + value.id).is(':disabled') || value.id == 'achieve_field_theme') {
                                if ($('#' + value.id).hasClass('warning_empty')) $('#' + value.id).removeClass("warning_empty");
                            }else{
                                $('#' + value.id).addClass("warning_empty");
                                $('#group_' + value.id).append($('<p>', {id: 'warning_' + value.id, class: 'text text-danger m-0', text: 'Заполните поле !'}));
                                empty = true;
                            }
                        }
                        ;
                    });
                    data = $(header).find("textarea");
                    if (data.length != 0) {
                        $.each(data, function (key, value) {
                            if (value.value.length != 0 && $('#' + value.id).hasClass('warning_empty')) $('#' + value.id).removeClass("warning_empty");
                            if ($('#warning_' + value.id).length != 0) $('#warning_' + value.id).remove();
                            if (value.value.length == 0) {
                                $('#' + value.id).addClass("warning_empty");
                                $('#group_' + value.id).append($('<p>', {id: 'warning_' + value.id, class: 'text text-danger m-0', text: 'Заполните поле !'}));
                                empty = true;
                            }
                        });
                    }
                    return empty;
                },
            },
            content: {
                markTables(block, data) {
                    let $block = $(block);
                    $.each(data.marks,function(key,val){
                        $.each(val,function(y_key,y_val) {
                            $.each(y_val.child, function (p_key, p_val) {
                                let periodName = p_val.name+' '+y_val.name+' ('+data.groups[key]+')';
                                let $perfHeader = $('<div>',{class:'portfolio-content-header'});
                                $perfHeader.append($('<h5>',{text:periodName}));
                                let $perfContent = $('<div>',{class:'portfolio-content-table'});
                                let $table = $('<table>',{class:'table table-borderless'});
                                let $thead = $('<thead>');
                                let $tbody = $('<tbody>');
                                let $headTr = $('<tr>');
                                $headTr.append($('<th>',{text:'Предмет'}));
                                $headTr.append($('<th>',{text:'Тип'}));
                                $headTr.append($('<th>',{text:'Дата'}));
                                $headTr.append($('<th>',{text:'Оценка'}));
                                $headTr.append($('<th>',{text:'Примечание'}));
                                $.each(p_val.marks,function(m_key,m_val) {
                                    let $contentTr = $('<tr>');
                                    $contentTr.append($('<td>',{text:m_val.discipline}));
                                    $contentTr.append($('<td>',{text:m_val.control_kind}));
                                    $contentTr.append($('<td>',{text:m_val.date}));
                                    $contentTr.append($('<td>',{text:m_val.mark,class:'text-'+m_val.mark_color}));
                                    $contentTr.append($('<td>',{text:m_val.note}));
                                    $tbody.append($contentTr);
                                });
                                $table.append($thead.append($headTr)).append($tbody);
                                $block.append($perfHeader).append($perfContent.append($table));
                            });
                        });
                    });
                },
                activityBody(block, data) {
                    let $block = $(block);
                    Portfolio.temp.activity = data.education;
                    let $education = Portfolio.generate.content.activityEducation(data.education);
                    let $educationBlock = $('<div>',{class:'flex_column_education'}).append($education);
                    if(data.competition.length > 0) {
                        let countItem = Math.round(data.education.length*1.5);
                        let $div = $('<div>',{class:'adaptive_portfolio_column'});
                        let $competition = Portfolio.generate.content.activityCompetition(data.competition,countItem);
                        let $competitionBlock = $('<div>',{class:'d-flex flex-column flex_column_competition'}).append($competition);
                        $div.append($educationBlock).append($competitionBlock);
                        $block.append($div);
                    } else {
                        let $div = $('<div>',{class:'row'});
                        $div.append($educationBlock);
                        $block.append($div);
                    }
                    Portfolio.start.activityEditButton();
                },
                activityEducation(data) {
                    let $block = $('<div>',{class:'portfolio_column_new'});
                    let $blockHeader = $('<div>',{class:'portfolio-column-header d-flex flex-row'});
                    let $blockHeaderText = $('<div>',{class:'portal-ui text-color-secondary'}).append($('<h5>',{text:'Работы'}));
                    let $blockorganithation = $('<div>',{class:'portfolio_block_organithation_edication'});
                    $block.append($blockHeader.append($blockHeaderText));
                    $block.append($blockorganithation);
                    $.each(data,function(key,val){
                        let dActivity = val.active_id;
                        let dId = val.id;
                        let dRbId = val.rb_id;
                        let $cardBlock = $('<div>',{class:'portfolio-column-card d-flex flex-row'});
                        $cardBlock.append($('<span>',{class:Portfolio.settings.educationIcon[val.type_id]/*+' btnEducationEdit',style:'cursor:pointer;'*/,'data-activity':dActivity,'data-id':dId,'data-rb':dRbId,'data-index':key}));
                        let $cardContent = $('<div>',{class:'card-content content-w-fit'});
                        let $cardContentHeader = $('<div>',{class:'card-content-header'});
                        $cardContentHeader.append($('<div>').append($('<h5>',{class:'text-color-primary'/* btnEducationEdit'*/,text:val.type_name/*,style:'cursor:pointer;'*/,'data-activity':dActivity,'data-id':dId,'data-rb':dRbId,'data-index':key})));
                        let $cardDropdown = $('<div>',{class:'dropdown'});
                        $cardDropdown.append($('<a>',{role:'button','data-toggle':'dropdown','aria-expanded':'true'}).append($('<div>',{class:'portal-ui text-muted icon-menu-dots-24'})));
                        let $dropDownMenu = $('<div>',{class:'portal-ui dropdown-menu dropdown-menu-right'});
                        $dropDownMenu.append($('<button>',{class:'dropdown-item icon-l'/* btnEducationEdit'*/,'data-activity':dActivity,'data-id':dId,'data-rb':dRbId,'data-index':key}).append($('<span>',{class:'portal-ui icon-pensil-24 text-color-midnight-4'})).append($('<span>',{text:'Редактировать'})))
                        if(val.status != null) $dropDownMenu.append($('<button>',{class:'dropdown-item icon-l btnEducationDelete','data-activity':dActivity,'data-id':dId,'data-rb':dRbId,'data-index':key}).append($('<span>',{class:'portal-ui icon-cross-24 text-color-midnight-4'})).append($('<span>',{text:'Удалить'})))
                        $cardDropdown.append($dropDownMenu);
                        /*$cardContentHeader.append($('<div>',{class:'ml-auto'}).append($cardDropdown));*/
                        $cardContent.append($cardContentHeader);
                        $.each(val.params,function(pKey,pVal){
                            let $paramBlock = $('<div>');
                            $paramBlock.append($('<span>',{class:'text-color-midnight-4',text:pVal.name+': '}));
                            $paramBlock.append($('<span>',{text:pVal.value}));
                            $cardContent.append($paramBlock);
                        });
                        if(val.id == null) {
                            // Если вдруг нет в данной зачетке такой записи, а в базе есть
                            let $errorWork = $('<div>',{class:'badge badge-danger light', style:'white-space: normal;text-align: left;height:auto;',text:'Похоже произошла ошибка с данной работой, она оказалась на другом учебном плане. Пожалуйста, напишите на support@rosnou.ru чтобы мы исправили данную проблему не забыв приложить скриншот или идентификатор работы - '+val.active_id});
                            $cardContent.append($errorWork);
                        }
                        let $cardContentFooter = $('<div>',{class:'portal-ui card-content-status'});
                        if(val.id != null) {
                            if(val.status == null) {
                                /*let $btnModal = $('<button>',{type:'button',class:'btn btn-primary btn-portfolio-add btnEducationEdit','data-activity':dActivity,'data-id':dId,'data-rb':dRbId,'data-index':key}).append($('<span>',{class:'icon-attachment-24'})).append($('<span>',{text:'Загрузить работу'}));
                                $cardContentFooter.append($('<div>').append($btnModal));*/
                            } else {
                                $cardContentFooter.append($('<div>',{class:'badge badge-'+val.status.class+' light',text:val.status.name}))
                            }
                        }
                        if(val.mark != null) {
                            let $markDiv = $('<div>',{class:'subtitle-text'});
                            $markDiv.append($('<span>',{class:'text-muted',text:'Оценка: '}));
                            $markDiv.append($('<span>',{class:'text-'+val.mark.color,text:val.mark.name}));
                            $cardContentFooter.append($markDiv);
                        }
                        if(val.date != null) {
                            let $dateDiv = $('<div>',{class:'portal-ui icons-aligment'});
                            $dateDiv.append($('<span>',{class:'icon-calendar-24 text-muted'}));
                            $dateDiv.append($('<span>',{text:val.date}));
                            /*if(val.status != null) {
                                let $commentDiv = $('<div>',{class:'portal-ui icons-aligment'});
                                $commentDiv.append($('<span>',{class:'icon-comments-24 text-muted'}));
                                $commentDiv.append($('<span>',{text:' 0'}));
                                $cardContentFooter.append($commentDiv);
                            }*/
                            $cardContentFooter.append($dateDiv);
                        }
                        $blockorganithation.append($cardBlock.append($cardContent.append($cardContentFooter)));
                    });
                    return $block;
                },
                activityCompetition(data, countItem = 5) {
                    let $block = $('<div>',{class:'portfolio-column'});
                    let $blockHeader = $('<div>',{class:'portfolio-column-header d-flex flex-row'});
                    let $blockHeaderText = $('<div>',{class:'portal-ui text-color-secondary'}).append($('<h5>',{text:'Результаты освоения программы'}));
                    $block.append($blockHeader.append($blockHeaderText));
                    let $competitionBody = $('<div>',{class:'card-content w-100'});
                    let $competitionHideBody = $('<div>',{id:'competitionHideDiv',style:'display:none;'});
                    let i = 0;
                    $.each(data,function(key,val){
                        let $competitionRow = $('<div>',{class:'portal-ui d-flex flex-column g-10 pb-12'});
                        let $rowTitle = $('<div>',{class:'progress-title'});
                        $rowTitle.append($('<div>',{class:'text-muted',text:val.code}));
                        $rowTitle.append($('<div>',{class:'text-muted ml-auto'}).append($('<span>',{class:'text-bold',text:val.percent+'%'})));
                        $competitionRow.append($rowTitle);
                        let $progressBar = $('<div>',{class:'progress-bar',role:'progressbar',style:'width: '+val.percent+'%','aria-valuenow':val.percent,'aria-valuemin':0,'aria-valuemax':100});
                        $competitionRow.append($('<div>',{class:'progress progress-xs'}).append($progressBar));
                        $competitionRow.append($('<div>',{class:'progress-description text-color-secondary',text:val.name}));
                        if(i >= countItem) $competitionHideBody.append($competitionRow);
                        else $competitionBody.append($competitionRow);
                        i++;
                    });
                    $competitionBody.append($competitionHideBody);
                    let $competitionRow = $('<div>',{class:'portal-ui d-flex flex-column g-10'});
                    //Доделать стрелочку
                    let $buttonShow = $('<button>',{class:'text-color-primary btn-link',style:'font-weight:500',type:'button',id:'btnCompetitionShow'})
                        .append($('<span>',{text:'Перейти к полному списку '}))
                        .append($('<span>',{class:'icon-arrow-angle-right-16'}))
                        .on('click',function(){
                            $("#competitionHideDiv").slideDown(500);
                            $("#btnCompetitionShow").hide();
                            $("#btnCompetitionHide").show();
                        });
                    let $buttonHide = $('<button>',{class:'text-color-primary btn-link',style:'font-weight:500;display:none;',type:'button',id:'btnCompetitionHide'})
                        .append($('<span>',{text:'Скрыть полный список '}))
                        .append($('<span>',{class:'icon-arrow-angle-left-16'}))
                        .on('click',function(){
                            $("#competitionHideDiv").slideUp(500);
                            $("#btnCompetitionShow").show();
                            $("#btnCompetitionHide").hide();
                        }) ;
                    $competitionRow.append($('<div>',{class:'subtitle-text'}).append($buttonShow).append($buttonHide));
                    $competitionBody.append($competitionRow);
                    $block.append($('<div>',{class:'portfolio-column-card d-flex flex-row'}).append($competitionBody));
                    return $block;
                },
                activityModal(block, data) {
                    $block = $(block);

                    let $theme = Portfolio.generate.field.string({
                        name: 'activity_modal_theme',
                        title: 'Тема'
                        },null);
                    let $leader = Portfolio.generate.field.string({
                        name: 'activity_modal_leader',
                        title: 'Научный руководитель'
                    },null);

                    $block.append($theme);
                    $block.append($leader);

                    let $divInput = $('<div>',{id:'fileEducationActivity'});
                    $block.append($divInput);

                    let preview = [];
                    let previewConfig = [];
                    if(data.media !== undefined) {
                        preview = data.media.preview;
                        previewConfig = data.media.config;
                    }
                },
                achievementsAddModal(id, data = null, bool) {
                    $(Portfolio.settings.achieveModalDiv).empty().hide();

                    if(id < 0) return false;

                    $.each(Portfolio.settings.types[id].fields, function(key,val){
                        $(Portfolio.settings.achieveModalDiv).append(Portfolio.generate.field.init(val,data));
                    });

                    let $uploadDiv = $('<div>');
                    $(Portfolio.settings.achieveModalDiv).append($uploadDiv);

                    let preview = [];
                    let previewConfig = [];

                    let moderatorNotification = null;
                    if (data !== null){
                        if (data.status == 3){
                            moderatorNotification = Portfolio.generate.part.moderatorNotification('snackbar-warning','icon-warning-32',data.comment);
                            $(Portfolio.settings.achieveModalDiv).append(moderatorNotification);
                        }else if (data.status == 1){
                            moderatorNotification = Portfolio.generate.part.moderatorNotification('snackbar-info','icon-exclamation-32',data.comment);
                            $(Portfolio.settings.achieveModalDiv).append(moderatorNotification);
                        }

                        if(data.media_preview !== undefined) {
                            preview = data.media_preview.preview;
                            previewConfig = data.media_preview.config;
                        }
                    }

                    FileUpload.setUser(Portfolio.settings.userId).newInstance(
                        'Achievement',
                        $uploadDiv,
                        FileUpload.testHandler,
                        {
                            preview:preview,
                            previewConfig:previewConfig,
                        }
                    );

                    $(Portfolio.settings.achieveModalDiv).show();
                    Portfolio.start.mask();
                },
                achievementsAddModalModerator(id, data,bool = false) {
                    $(Portfolio.settings.achieveModalDivModerator).empty().hide();

                    if(id < 0) return false;
                    if (bool){
                        $.each(Portfolio.settings.types[id].fields, function(key,val){
                            $(Portfolio.settings.achieveModalDivModerator).append(Portfolio.generate.field.init(val,data));
                        });
                    }else{
                        $.each(Portfolio.settings.types[id].fields, function(key,val){
                            $(Portfolio.settings.achieveModalDivModerator).append(Portfolio.generate.field.field(val,data));
                        });
                    }
                    let ModerComment = [{ name: 'comment',title: 'Комментарий'}];
                    bool ? ModerComment = null : $(Portfolio.settings.achieveModalDivModerator).append(Portfolio.generate.field.text(ModerComment[0],null));

                    let $uploadDiv = $('<div>');
                    $(Portfolio.settings.achieveModalDivModerator).append($uploadDiv);

                    let preview = [];
                    let previewConfig = [];
                    let moderatorNotification = null;
                    if (data !== null){
                        if (data.status == 3){
                            moderatorNotification = Portfolio.generate.part.moderatorNotification('snackbar-warning','icon-warning-32',data.comment);
                            $(Portfolio.settings.achieveModalDivModerator).append(moderatorNotification);
                        }else if (data.status == 1){
                            moderatorNotification = Portfolio.generate.part.moderatorNotification('snackbar-info','icon-exclamation-32',data.comment);
                            $(Portfolio.settings.achieveModalDivModerator).append(moderatorNotification);
                        }
                        if(data.media_preview !== undefined) {
                            preview = data.media_preview.preview;
                            previewConfig = data.media_preview.config;
                        }
                    }

                    FileUpload.setUser(Portfolio.settings.userId).newInstance(
                        'Achievement',
                        $uploadDiv,
                        FileUpload.testHandler,
                        {
                            preview:preview,
                            previewConfig:previewConfig,
                        }
                    );
                    $('#achievementApproveButton').attr('achievementid', data.id);
                    $(Portfolio.settings.achieveModalDivModerator).show();
                    Portfolio.start.mask();
                },
                achievements(block, data) {
                    let $block = $(block);
                    let $dataTable = null;
                    $.each(Portfolio.settings.categories,function(catK,catV){
                        let $header = null;
                        $.each(data, function (key,value){
                            $.each(catV.types, function (keyT,valueT){
                                if (value.type == valueT.id && {{$isModerator}}) $header = Portfolio.generate.part.achievementsCategoryHeader(catV);
                            });
                        });
                        if (!{{$isModerator}}) $header = Portfolio.generate.part.achievementsCategoryHeader(catV);
                        let $content = $('<div>',{class:'portfolio-ach-cards d-flex flex-row flex-wrap align-items-stretch'});
                        let $addCard = Portfolio.generate.part.achievementAddCard(catK,catV);
                        if (!{{$isModerator}}) $content.append($addCard);
                        $.each(catV.types,function(keyCat,catVT) {
                            $.each(data, function (keyData, data) {
                                if (data.type == catVT.id) {
                                    $dataTable = Portfolio.generate.part.achievementCard(data,catVT.text,Portfolio.settings.types[catVT.id].icon);
                                };
                                $content.append($dataTable);
                                $dataTable = null;
                            });
                        });
                        $block.append($header).append($content);
                    });
                    Portfolio.start.achievementAddCard();
                    Portfolio.start.achievementEditCard(data);
                    Portfolio.start.achievementViewModerator(data);
                    Portfolio.start.achievementCreate();
                    Portfolio.start.achievementEditData();
                    Portfolio.start.achievementDeleteData(data);
                    Portfolio.start.achievementEditStatus();
                },
            }
        },
        setUser(user) {
            this.settings.userId = user;
            return this;
        },
        setTypes(types) {
            this.settings.types = types;
            return this;
        },
        setCategories(categories) {
            this.settings.categories = categories;
            return this;
        }
    };

    Portfolio
        .setTypes(@json($types))
        .setCategories(@json($categories))
        .setUser({{$user_info['id']}})
        .init();

</script>
@endsection
