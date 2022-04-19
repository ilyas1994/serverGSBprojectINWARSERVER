@extends('crudQuiz.layouts.layouts')



@section('content')


    {{--@dd($question)--}}
    <div class="container-fluid">

        <div class="row">
            @php
                $counter = 0;
            @endphp

            @isset($question)


                    <form id="sendForm" action="{{ route('crud.update', $question[0]->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 mt-5">
                        <input type="text" name="name" value="{{ $question[0]->name }}">
                        <input type="hidden" name="name_id" value="{{ $question[0]->id }}">
                    </div>
                    @isset($answer)

                            @for($i = 0; $i < count($answer); $i++)
                                <div id="mainDiv" class="form-check mt-3">
                                    <input type="hidden" name="counter" value="{{ $counter }}">
                                    <input type="hidden" name="answer_id_{{ $counter }}" value="{{ $counter }}">
                                    @if($question[0]->type_question === "checkbox")

                                        <input class="form-check-input" name="true_answer_{{ $counter }}" type="checkbox">
                                    @elseif($question[0]->type_question === "radio")

                                        <input id="radio_id{{ $counter }}"  onclick="radioClick()" class="form-check-input" name="true_answer_{{ $counter }}" type="radio">

                                    @endif

                                    <input type="text"  name="name_answer_{{ $counter }}" value="{{ $answer[$i]->name }}">
                                    <input type="hidden" name="id_{{ $counter }}" value="{{ $answer[$i]->id }}">
                                </div>
                                @push($counter++)

                                @endpush
                            @endfor
                    @endisset
                </form>
                <div class="col-12">
                    <button type="submit" onclick="btnSendForm()" class="mt-4">Сохранить</button>
                </div>

            @endisset
        </div>
    </div>

@endsection

<script>


        let count = 0;
    function radioClick() {
            count++;
        if (count >= 2) {
            alert('Больше двух ответов нельзя выбирать');
            let counter = {{ $counter }};
            for (let i = 0; i < counter; i++) {
                document.getElementById('radio_id' + [i]).checked = false;
            }
            count = 0;
        }
    }

    function btnSendForm() {
        document.getElementById('sendForm').submit();
    }


</script>