@extends('crudQuiz.layouts.layouts')



@section('content')
    <div class="container">
        <div class="row">


            <div id="div_choise" class="col-12 mt-3">
                <button id="btnCheckBox" onclick=createElement1("checkbox") class="btn btn-primary">CheckBox (множественный ответ)
                </button>
                <button id="btnRadioBtn" onclick=createElement1("radioBtn") class="btn btn-info ms-5">RadioButton (один ответ)</button>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <div class="row">

            <div class="col-12 mb-4">
                {{--qform--}}
                <form id="formSend" action="{{ route('crud.store') }}" method="POST">
                    <input id="type_question" type="hidden" name="type___question">
                    <input id="type_test" type="hidden" name="type_test">
                    <input id="variantTest" type="hidden" name="variant_test">
                    <input id="counterCount" type="hidden" name="counter">
                    @csrf

                    <div class="col-2">
                        <div class="form-group">
                            <select id="selectedVal" class="form-select" name="selectedTest"
                                    aria-label="Default select example">
                                <option selected>Выберите тест</option>
                                <option value="1">First test</option>
                                <option value="2">Second test</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <select id="idVariantTest" class="form-select" name="variantTest"
                                    aria-label="Default select example">
                                <option selected>Выберите вариант теста</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <input class="mb-3" type="text" value="Введите вопрос" name="answer">
                    </div>

                    <div id="dynamicDiv" class="col-12 form-check"></div>

                </form>

                <div id="btnAdd" class="col-12">
                    <button onclick="addElement()">Добавить</button>
                    <button onclick="deleteElement()" style="margin-left: 30px;">Удалить</button>

                </div>

                <div class="col-12 mt-4">
                    <button id="addBtn" onclick="sendToForm()" style="width: 150px; visibility: hidden">
                        Создать
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection

<script>

    let counter = 0;
    let isSetCheckBox = false;
    let typeTest = "";
    let counterCheckbox = 0;
    let dynamicCounterForInput = 0;

    function createElement1(type) {
        if (type === 'checkbox') {
            isSetCheckBox = true;
            typeTest = "checkbox";
            addElement('checkbox');
            document.getElementById('type_question').value = "checkbox";
            let divBtn = document.getElementById('div_choise');
            divBtn.style.display = "none";
        } else if (type === 'radioBtn') {
            typeTest = "radioBtn";
            addElement('radioBtn');
            document.getElementById('type_question').value = "radio";
            // let radioboxbtn =  document.getElementById('btnRadioBtn');
            // radioboxbtn.style.display = "none";
            let divBtn = document.getElementById('div_choise');
            divBtn.style.display = "none";
        }
    }


    function addElement() {

        let dynamicDiv = document.getElementById('dynamicDiv');



        // checkbox
        if (typeTest === 'checkbox') {

            let checkboxDiv = document.createElement('div');
            checkboxDiv.className = "col-12 form-check";
            checkboxDiv.id=counter.toString();

            let create_input = document.createElement('input');
            create_input.className = "mt-1 col-4 form-check";
            create_input.type = "text";
            create_input.placeholder = "Заполните поле";
            create_input.name = "input_" + counter.toString();
            create_input.id = counter.toString();
            // create_input.id = "create_input" + counter.toString();

            let checkBx = document.createElement('input');
            checkBx.className = "form-check-input mt-2";
            checkBx.type = "checkbox";
            checkBx.value = counter.toString();
            checkBx.name = "checkbox_" + counter.toString();
            // checkBx.id = "checkBoxID";
            // checkBx.id = counter.toString();
            // dynamicDiv.append(checkBx);
            // dynamicDiv.append(create_input);
            checkboxDiv.append(checkBx);
            checkboxDiv.append(create_input);
            dynamicDiv.append(checkboxDiv);
        }

        if (typeTest === 'radioBtn') {
            let qwe_ = 0;
            qwe_++;

            // let dynamicDiv = document.getElementById('dynamicDiv');
            let createDiv = document.createElement('div');
            createDiv.className="form-check";

            createDiv.id=counter.toString();

            let create_input = document.createElement('input');
            // create_input.className = "mt-1 col-4 form-check"
            create_input.className = "mt-1 col-4 form-check-label"
            create_input.setAttribute("for", counter.toString());
            create_input.type = "text";
            create_input.placeholder = "Заполните поле";
            create_input.name = 'input_' + counter.toString();
            create_input.id= counter.toString();


            let radio = document.createElement('input');
            radio.className = "form-check-input mt-2";
            radio.type = "radio";
            radio.name = 'radio';
            radio.value = counter.toString();
            radio.setAttribute("for", counter.toString());
            if (counter === 0) {
                radio.setAttribute('checked', true);
            }

            createDiv.append(radio);
            // createDiv.append(labelInput);
            createDiv.append(create_input);
            dynamicDiv.append(createDiv);

        }

        counter++;
        dynamicCounterForInput = counter;
        let addBtn = document.getElementById('addBtn');

        if (counter === 2) {
            addBtn.style = "visibility: visible";
        }

    }

    function deleteElement() {
        // alert(counter);

        // document.getElementById().remove();
        if (counter !== 2) {
            document.getElementById((counter - 1).toString()).remove();
            counter--;
            dynamicCounterForInput = counter;
            // console.log(counter);
        } else  {
            alert('Меньше двух ответов не должно быть')
        }

    }
    let asd = [];

    function sendToForm() {
        asd.length = 0;
        let selectedVal = document.getElementById('selectedVal');
        let idVariantTest = document.getElementById('idVariantTest');
        // let create_inputs = document.getElementById('create_input').value;

        // let div = document.getElementById('dynamicDiv');
        let div = document.getElementById('dynamicDiv');
        // for (let i = 0; i < div.children.length; i++) {
        for (let i = 0; i < div.children.length; i++) {
            // asd.push(div.children[i].length);
            // asd.push(div.childElementCount);
            console.log(div.childElementCount);
            // console.log(div.children[i].className)
        }
        console.log(asd);
        let checkCheckBox = [];
        let checkValInput = false;
        // for (let n = 0; n < div.children.length; n++) {
        for (let n = 0; n < div.childElementCount; n++) {

            if (div.children[n].children[0].type === "checkbox") {
                checkCheckBox.push(div.children[n].children[0].checked);
            } else if (div.children[n].children[0].type === "radio") {
                checkCheckBox.length = 0;
            }

            if (div.children[n].children[1].type === "text") {
                if (div.children[n].children[1].value === "") {
                    checkValInput = true;
                    checkCheckBox.push(false);

                    // checkEmptyRadio.push(false);

                }
            }
        }

        // alert('Заполните пустые ответы')

          // console.log(checkCheckBox);
        if (checkValInput === true) {
            alert('Заполните или удалите ответ');
            return;
        }

        // if (!checkCheckBox.includes(true) && checkCheckBox.length !== 0) {
        if (!checkCheckBox.includes(true) && checkCheckBox.length !== 0) {
            alert('Выберите правильный вариант ответа')
            return
        }
        // console.log(checkCheckBox);

        let variantTest = document.getElementById('variantTest').value = idVariantTest.value;
        if (variantTest === "Выберите вариант теста") {
            alert("Выберите вариант теста из списка");
            return;
        }


       let typeTest = document.getElementById('type_test').value = selectedVal.value;
        document.getElementById('counterCount').value = counter;

      if (typeTest === "Выберите тест") {
          alert("Выберите тип теста");
          return;

      }
        document.getElementById('formSend').submit();

    }

</script>