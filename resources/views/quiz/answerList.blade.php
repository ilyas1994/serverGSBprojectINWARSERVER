@extends('crudQuiz.layouts.layouts')




@section('content')
    <style>
        body {
            background-color: rgba(44, 33, 33, 0.74);;

        }
    </style>
    <div class="container-fluid">
        <div class="row">
{{--            @dd($data)--}}
            <div class="col-12 justify-content-center d-flex">

            <div class="col-3 mt-5">

            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th class="col-1 text-center" scope="col">Номер вопроса</th>
                    <th class="col-1 text-center" scope="col">Вариант ответа</th>
                    <th class="col-1" scope="col">Тип ответа</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < count($data); $i++)
                <tr>
                    <th class="text-center" scope="row">{{ $data[$i]->countQuiz }}</th>
                    <td class="text-center">{{ $data[$i]->possibleAnswer }}</td>
                    <td>{{ $data[$i]->checkAnswer }}</td>
                </tr>
                @endfor
                </tbody>
            </table>

            </div>
            </div>

        </div>
    </div>


@endsection