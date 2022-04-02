@extends('crudQuiz.layouts.layouts')



@section('content')



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
            {{--        @dd($data)--}}

            <div class="col-12 mt-3">
                <button class="btn btn-success"><a style="text-decoration: none; color: white"
                                                   href="{{ route('crud.create') }}">Создать вопрос</a></
                ></button>

            </div>
            @if(isset($null))
                <div class="col-12 mt-4">
                    <h3>Вопросов еще нет</h3>
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
                            <li><a class="dropdown-item" href="{{ route('dropdownState', '1') }}">First test</a></li>
                            <li><a class="dropdown-item" href="{{ route('dropdownState', '2') }}">Second test</a></li>
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


                    {{--                @isset($dataa)--}}
                    {{--                @foreach($data as $key => $val)--}}
                    {{--                @foreach($data as $key => $val)--}}

                    {{--                    <div class="col-12">--}}
                    {{--                    <h5>{{ $key }} </h5>--}}
                    {{--                </div>--}}
                    {{--                @dd($val)--}}
                    {{--                @for($i = 0; $i < count($val); $i++)--}}




                    {{--                        <div class="col-12">--}}
                    {{--                             <div class="form-check">--}}
                    {{--                             <div class="">--}}
                    {{--                                <input class="form-check-input" disabled type="radio" name="flexRadioDefault"--}}
                    {{--                                <input class="" disabled type="hidden" name="flexRadioDefault"--}}

                    {{--                                       id="{{ $counter }}">--}}
                    {{--                                       id="{{ $counter }}">--}}
                    {{--                                 @if($val[$i]['type_answer'] == 1)--}}
                    {{--                                     <label class="form-check-label" for="{{ $val[$i]['question_id'] }}">--}}
                    {{--                                     <label class="form-check-label" for="{{ $val[$i]['question_id'] }}">--}}

                    {{--                                     <label class="" for="{{ $val[$i]['question_id'] }}">--}}
                    {{--                                         <label class="" for="{{ $val[$i]['question_id'] }}">--}}
                    {{--                                         <i class="fas fa-check"></i>  {{ $val[$i]['answer'] }}--}}
                    {{--                                     </label>--}}
                    {{--                                 @else--}}

                    {{--                                     <label class="form-check-label" for="{{ $val[$i]['question_id'] }}">--}}
                    {{--                                     <label class="" for="{{ $val[$i]['question_id'] }}">--}}
                    {{--                                       {{ $val[$i]['answer'] }}--}}
                    {{--                                     </label>--}}
                    {{--                                 @endif--}}

                    {{--                            </div>--}}

                    {{--                        </div>--}}

                    {{--                    @push($counter++)--}}
                    {{--                    @endpush--}}

                    {{--                @endfor--}}
                    {{--            @dump($data)--}}
                    @isset($data, $dropDown)

                        <div class="col-12">
                            @for($i = 0; $i < count($data); $i++)

                                @foreach($data[$i] as $keyName => $val)
                                    <div class="col-12 mb-3">
                                        <h2 class="styleH2">{{ $keyName }}</h2>
                                    </div>

                                    @for($j = 0; $j < count($val); $j++)
                                        <div class="col-12">
                                            @if($val[$j]['true_answer'] == 1)
                                                <h5 style="color: green"><i class="far fa-check-circle"></i> {{ $val[$j]['name_answer'] }}</h5>
                                            @else
                                                <h5><i class="fas fa-ban"></i> {{ $val[$j]['name_answer'] }}</h5>
                                            @endif
                                        </div>
                                    @endfor
                                @endforeach
                                <div class="col-12 mb-3">
                                    <a style="color: rgba(0,0,255,0.61); text-decoration: none"
                                       href={{ route('crud.edit', '1') }}><i class="fas fa-edit ps-4"></i>
                                        <span>Изменить</span></a>
                                </div>

                            @endfor
                        </div>

                    @endisset
                    @push($counterQuiz++) @endpush
                    @endisset

                </div>
        </div>
    </div>
@endsection






