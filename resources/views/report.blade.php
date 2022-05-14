@extends('layouts.app')

@section('title') Ведомость @endsection

@section('header')
    @parent
@endsection

@auth
@section('content')
    <div class="container">
        <section class="section">
            <div class="section-title section-title-center">
                <h4>Ведомость № 1 осеннего семестра 2020 года</h4>
                <h4>По дисциплине: Основы алгоритмизации и программирования</h4>
                {{--                <h3>@if(!empty($students[0]->group))--}}
                {{--                        Специальность {{ $students[0]->group->specialty->fullNameOfSpecialty }}--}}
                {{--                    @endif--}}
                {{--                </h3>--}}
                <h4>
                    @if(!empty($students[0]->group))
                        <tr>
                            <td>Преподаватель: Рябычина Ольга Петровна</td>
                        </tr>
                    @endif
                </h4>
                <h4>@if(!empty($students[0]->group))
                        <tr>
                            <td>{{ $students[0]->group->specialty->faculty->fullNameOfFaculty }}</td>
                            <td>
                                Специальность: {{ $students[0]->group->specialty->fullNameOfSpecialty }}
                            </td>
                            <td>
                                Группа: {{ $students[0]->group->groupCode }}
                            </td>
                        </tr>
                    @endif
                </h4>
            </div>
            {{--            <form action="{{route('report')}}" method="get">--}}
            {{--                <div class="mb-3">--}}
            {{--                    <div class="form-label">Специальность</div>--}}
            {{--                    <select id="specialtySelect" name="shortNameOfSpecialty" class="form-select form-select-sm"--}}
            {{--                            aria-label=".form-select-sm example">--}}
            {{--                        <option selected disabled>Выберите специальность</option>--}}
            {{--                        @foreach($specialties as $specialty)--}}
            {{--                            <option class="specialty" value="{{$specialty->shortNameOfSpecialty}}"--}}
            {{--                                    @if(isset($_GET['shortNameOfSpecialty']) && $_GET['shortNameOfSpecialty'] == $specialty->shortNameOfSpecialty) selected @endif>--}}
            {{--                                {{$specialty->shortNameOfSpecialty}}--}}
            {{--                            </option>--}}
            {{--                        @endforeach--}}
            {{--                    </select>--}}
            {{--                    <div class="form-label">Группа</div>--}}
            {{--                    <select id="groupSelect" name="group_id" class="form-select form-select-sm"--}}
            {{--                            aria-label=".form-select-sm example">--}}
            {{--                        <option selected disabled>Выберите группу</option>--}}
            {{--                        @foreach($groups as $group)--}}
            {{--                            <option class="group" data-specialty="{{ $group->specialty->shortNameOfSpecialty }}"--}}
            {{--                                    value="{{ $group->id }}"--}}
            {{--                                    @if(isset($_GET['group_id'])) @if($_GET['group_id'] == $group->id) selected @endif @endif>--}}
            {{--                                {{ $group->groupCode }}--}}
            {{--                            </option>--}}
            {{--                        @endforeach--}}
            {{--                    </select>--}}
            {{--                </div>--}}
            {{--                <button type="submit" class="btn btn-success">Выбрать</button>--}}
            {{--            </form>--}}
            <div class="section-content">
                <div class="report">
                    <table class="pure-table pure-table-bordered">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>ФИО студента</th>
                            @if(!empty($students) && !empty($students[0]->attestation))
                                @foreach($students[0]->attestation as $attestation)
                                    <th style="writing-mode: vertical-rl">{{$attestation->date}}</th>
                                @endforeach
                            @endif
                            <th>Отметка текущей успеваемости</th>
                        </tr>
                        </thead>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->studentId}}</td>
                                <td>{{$student->fioStudent}}</td>
                                @if(!empty($student->attestation))
                                    @foreach($student->attestation as $attestation)
                                        <td>{{$attestation->mark}}</td>
                                    @endforeach
                                @endif
                                <td>8</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <script>
        let groups = $('.group');

        function filerValuesByDataKey(selector, dataOption) {
            let value = $(selector).find(":selected").val()
            if (value === 'all') {
                $(groups).show("400");
            } else {
                console.log(value)
                $(groups).hide();
                $('[data-' + dataOption + '="' + value + '"]').show()
            }
            $("#groupSelect").prop("selectedIndex", -1);
        }

        $('#specialtySelect').change(function () {
            filerValuesByDataKey('#specialtySelect', 'specialty')
        })
    </script>
@endsection
@endauth

@section('footer')
    @parent
@endsection


