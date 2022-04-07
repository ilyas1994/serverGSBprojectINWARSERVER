
let dropdownValues =  JSON.parse( JSON.stringify(dataArrayForDropDown));
//
// console.log(JSON.stringify(dataArrayForDropDown));

import {dataPiker, dropDown, inputField, Label, RequiredSpan} from "./components.js";

let count = 0;
let names = [
    'surname',
    'name',
    'patronymic',
    'gender',
    'familyStatus',
    'amountOfChildren',
    'citizenship',
    'nationality',
    'dataOfBirth',
    'Iin',
    'typeDocument',
    'numberDocument',
    'kemVidanDoc',
    'dateMonthYearDoc',

    'cityOfResidence',
    'homeAdress',
    'mobileNumber',
    'email',
];





export function tabs_1() {
    // f_();
    let allcode = [];

    let title =['Фамилия','Имя','Отчество'];
    let input = [];
    let sec = [];

    for (let i = 0; i < 2; i++) {
        // input[i] = inputField(title[i], names[count],"col-lg-4", null,'', RequiredSpan());
        input[i] = inputField(title[i], names[count],"col-lg-4", null,'');
        count++;
    }

    input[2] = inputField(title[2], names[count], "col-lg-4");
    count++;

    allcode[0] =  <div className={"form-group row"} key={count}>
                        {input}
                        <div className={"col-lg-12"}>
                            <small>*СОГЛАСНО УДОСТОВЕРЕНИЮ ЛИЧНОСТИ</small>
                        </div>
                  </div>;
// ------------------------------------------------------------------------------------------
    input = [];
    // alert({{$dataDropDown['drop_down_genders'][0])}});
    title = ['Пол','Гражданский статус','Кол-во детей'];
    let gender = dropdownValues['gender'];
    let familyStatus = dropdownValues['familyStatus'];
    sec = [gender, familyStatus];

    for (let i = 0; i < sec.length; i++) {
        input[i] = dropDown( title[i],names[count],sec[i],'','col-lg-4');
        count++;
    }
    input[sec.length+1] =  <div key={sec.length+1} className={"col-lg-4"}>
                                <label htmlFor={""}>Кол-во детей<span className={"required"}>*</span></label>
                                <input type="number" name={names[count]} className={"user-children"}/>
                            </div>;
    count++;
    allcode[1] =  <div className={"form-group row"} key={count} >{input}</div>;


// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Гражданство','Национальность','Дата рождения'];
    let citizenShip =dropdownValues['citizenship'];
    let nationality = dropdownValues['nationality'];
    // let dataOfBirth ;
    sec = [citizenShip,nationality];

    for (let i = 0; i < sec.length; i++) {
        input[i] = dropDown(title[i],names[count],sec[i],'','col-lg-4');
        count++;
    }

    input[sec.length+1] = dataPiker(title[2],names[count]);
    count++;
    allcode[2] =  <div className={"form-group row"} key={count}>{input}</div>;
// ------------------------------------------------------------------------------------------
    input = [];
    title = ['ИИН/ПИНФЛ','Документ удостоверяющий личность'];
    // console.log(dropdownValues['typeDocument'])

    let typeDocument = dropdownValues['typeDocument'];
    sec = [typeDocument];
    // inputField(title[i], names[count],"col-lg-4", null,'', RequiredSpan());
    input[0] = inputField(title[0], names[count],"col-lg-4", null,'');
    count++;
    input[1] = dropDown(title[1], names[count],sec[0],'','col-lg-4');
    count++;

    allcode[3] =  <div className={"form-group row"} key={count}>{input}</div>;

// // ------------------------------------------------------------------------------------------
    input = [];
    title = ['№ документа удостоверяющий личность','Кем и когда выдан'];
    let kemVidanDoc =dropdownValues['kemVidanDoc'];
    sec = [kemVidanDoc];
    input[0] = inputField(title[0], names[count],"col-lg-4", null,'');
    count+=2;


    let dop = <input type="date" name={names[count]} className={"col-lg-0 user-cardissueddate"}/>;
    count--;

    input[1] = dropDown(title[1], names[count], sec[0], dop,'col-lg-4');
    count+=2;

    allcode[4] =  <div className={"form-group row"} key={count}>{input}</div>;
//
// // ------------------------------------------------------------------------------------------
    input = [];
    title = ['Город проживания','Домашний адрес','Мобильный телефон','Электронная почта'];
    for (let i = 0; i < title.length; i++) {
        if(i == 2) {
            input[i] = inputField(title[i], names[count], 'col-lg-3', '','');

        }
        else
            input[i] = inputField(title[i], names[count], 'col-lg-3',null,'');
             count++;
    }
    allcode[5] =  <div className={"form-group row"} key={count}>{input}</div>;


    count++;
 //----------------------------------------------------------------------------------------------------
   const buttonStyle = {
       marginTop: '20px'
   }
    const tab2 = document.getElementById('2-tab');
    allcode[6] = <div key={count} className="">
        <div className="d-flex align-items-lg-end" >
            <input value={"Далее 'Сведения о трудовой деятельности' "} type={'button'} onClick={function () {
                    let tab = new bootstrap.Tab(tab2)
                    tab.show()
            }}/>
        </div>
    </div>
    //----------------------------------------------------------------------------------------------------

    return(
        <div  className={'m-5'} >{allcode}</div>
    );


}




