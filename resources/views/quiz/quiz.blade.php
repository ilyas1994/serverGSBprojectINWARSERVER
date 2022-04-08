@extends('crudQuiz.layouts.layouts')



@section('content')

{{--Так получилось что здесь создаются вопросы в админке сам тест находится в quizTest.blade.php--}}

    <div class="container-fluid">
        <div class="row">


            @if(Session::has('data'))
                @php
                    $data = Session::get('data');
                @endphp
            @endif

            @if(Session::has('dropDown'))
                @php
                    $dropDown = Session::get('dropDown');
                @endphp
            @endif

            <div class="col-12 mt-3">
                <button class="btn btn-success"><a style="text-decoration: none; color: white"
                                                   href="{{ route('crud.create') }}">Создать вопрос</a></button>

            </div>

                    @isset($success)

                    <div id="alertId" class="alert alert-success mt-3" role="alert">
                       Успешная запись
                    </div>

                    @endisset

                    @isset($fail)
                        <div id="alertIdFail" class="alert alert-success mt-3" role="alert">
                            Что то пошло не так
                        </div>
                    @endisset

            @if(isset($null))
                <div class="col-12 mt-4">
                    <h3>Добавьте вопросы</h3>
                </div>
            @else

                <div class="col-12 mt-5">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            @isset($dropDown)
                                @if($dropDown == 1)
                                    First test
                                @else
                                    {{ $dropDown }}
                                @endif
                            @endisset
                        </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dropdownState', 1) }}">First test</a></li>
                            <li><a class="dropdown-item" href="{{ route('dropdownState', 2) }}">Second test</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            {{--                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}

                        </ul>
                    </div>
                </div>

                <div class="col-12 mt-5">

                    @php
                        $counter = 0;
                        $counterQuiz = 1;

                    @endphp

                    @isset($data)


                        <div class="col-12">
                            @for($i = 0; $i < count($data); $i++)

                                @foreach($data[$i] as $keyName => $val)

                                    <div class="col-12 mb-3">
                                        <h2 class="styleH2">{{ $keyName }}</h2>
                                    </div>

                                    @for($j = 0; $j < count($val); $j++)
                                        <div class="col-12">
                                            @if($val[$j]['true_answer'] == 1)
                                                <h5 style="color: green"><i
                                                            class="far fa-check-circle"></i> {{ $val[$j]['name_answer'] }}
                                                </h5>
                                            @else
                                                <h5><i class="fas fa-ban"></i> {{ $val[$j]['name_answer'] }}</h5>
                                            @endif
                                        </div>
                                    @endfor

                                    <div class="col-12 mb-3 d-flex">
                                        @isset($val[0]['question_id'])
                                            <button class="btn btn-outline-info ms-3" type="submit"><a style="text-decoration: none"
                                                                                                          href={{ route('crud.edit', $val[0]['question_id'] ) }}>
                                                    <span>Изменить</span></a></button>

                                            <form action="{{ route('crud.destroy', $val[0]['question_id']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
{{--                                                <i class="fas fa-backspace"></i>--}}

                                                <button onclick="return confirm ('Вы точно хотите удалить {{  $keyName }} ?')"  class="btn btn-outline-danger ms-3" type="submit">Удалить</button>
                                            </form>

                                        @endisset
                                    </div>
                                @endforeach


                            @endfor
                        </div>

                    @endisset
                    @push($counterQuiz++) @endpush

                    @endisset

                </div>
        </div>
    </div>
@endsection


<script>


    {{--function delAlert() {--}}
    {{--   document.getElementById('alertId').remove();--}}
    {{--}--}}
    {{--function delAlertFail() {--}}
    {{--   document.getElementById('alertIdFail').remove();--}}
    {{--}--}}

    {{--@isset($success)--}}

    {{--setTimeout(delAlert, 2000);--}}
    {{--@endisset--}}


    {{--@isset($fail)--}}
    {{--setTimeout(delAlertFail, 2000);--}}
    {{--    @endisset--}}

</script>




