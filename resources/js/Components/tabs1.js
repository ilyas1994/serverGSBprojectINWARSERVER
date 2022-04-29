let dropdownValues = null;
if(typeof dataArrayForDropDown !== 'undefined'){
     dropdownValues =  JSON.parse( JSON.stringify(dataArrayForDropDown));
    console.log(dropdownValues)

}

import {
    dataPiker,
    dropDown, dropDownClick, DropDownKemVidanDoc,
    inputField,
    inputFieldEmail,
    inputFieldOnlyNumber, inputFieldOnlyNumberForMobile,
    Label,
    RequiredSpan
} from "./components.js";

let count = 0;


export function tabs_1(names) {
    let allcode = [];
    let title =['Фамилия','Имя','Отчество'];
    let input = [];
    let sec = [];

    for (let i = 0; i < 2; i++) {
        input[i] = inputField(title[i], names[count],"col-lg-4 ", null,'', <RequiredSpan id={names[count]}/>);
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

    title = ['Пол','Гражданский статус','Кол-во детей'];
    let gender = ['gender'];
    let familyStatus = ['familyStatus'];
    if(dropdownValues){
        gender =dropdownValues['gender'];
        familyStatus = dropdownValues['familyStatus'];
    }
    sec = [gender, familyStatus];

    for (let i = 0; i < sec.length; i++) {
        input[i] = dropDown( title[i],names[count],sec[i],'','col-lg-4', <RequiredSpan id={names[count]}/>, i);
        count++;
    }

    input[sec.length+1] =  inputFieldOnlyNumber(title[2], names[count],"col-lg-4", null,'', <RequiredSpan id={names[count]}/>);
        // <div key={sec.length+1} className={"col-lg-4"}>
        //                         <label htmlFor={""}>Кол-во детей<span className={"required"}>*</span></label>
        //                         <input type="number" name={names[count]} className={"user-children"}/>
        //                     </div>;
    count++;
    allcode[1] =  <div className={"form-group row"} key={count} >{input}</div>;


// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Гражданство','Национальность','Дата рождения'];
    let citizenship =['citizenship','citizenship1'];
    let nationality = ['nationality','1nationality'];
    if(dropdownValues){
        citizenship =dropdownValues['citizenship'];
        nationality = dropdownValues['nationality'];
    }

    // let dataOfBirth ;
    sec = [citizenship,nationality];


    input[0] = dropDownClick(title[0],names[count],sec[0],'','col-lg-4', <RequiredSpan id={names[count]}/>);
    count++;
    input[1] = dropDown(title[1],names[count],sec[1],'','col-lg-4', <RequiredSpan id={names[count]}/>, 0);
    count++;

    input[2] = dataPiker(title[2], names[count],'col-lg-4', <RequiredSpan id={names[count]}/>);
    count++;
    allcode[2] =  <div className={"form-group row"} key={count}>{input}</div>;
// ------------------------------------------------------------------------------------------
    input = [];
    title = ['ИИН/ПИНФЛ','Документ удостоверяющий личность'];
    // console.log(dropdownValues['typeDocument'])

    let typeDocument = ['typeDocument'];
    if(dropdownValues){
        typeDocument =dropdownValues['typeDocument'];
    }
    sec = [typeDocument];
    // inputField(title[i], names[count],"col-lg-4", null,'', RequiredSpan());
    input[0] = inputFieldOnlyNumber(title[0], names[count],"col-lg-4", null,'', <RequiredSpan id={names[count]}/>);
    count++;
    input[1] = dropDown(title[1], names[count],sec[0],'','col-lg-4', <RequiredSpan id={names[count]}/>, 0);
    count++;

    allcode[3] =  <div className={"form-group row"} key={count}>{input}</div>;

// // ------------------------------------------------------------------------------------------
    input = [];
    title = ['№ документа удостоверяющий личность','Кем выдан'];
    let kemVidanDoc =['МЮ РК','МВД РК','Другое'];
    if(dropdownValues){
        kemVidanDoc =dropdownValues['kemVidanDoc'];
    }
    sec = [kemVidanDoc];
    input[0] = inputFieldOnlyNumber(title[0], names[count],"col-lg-4", null,'', <RequiredSpan id={names[count]}/>);
    count+=2;


    // let dop = <input type="date" name={names[count]} className={"col-lg-0 user-cardissueddate"}/>;
    let dop = dataPiker('когда', names[count+1],'col-lg-6', <RequiredSpan id={names[count]}/>);
    count--;

    input[1] = <DropDownKemVidanDoc
        title={title[1]}
        name={names[count]}
        otherName={names[count+1]}
        section={sec[0]}
        sample={dop}
        className={'col-lg-6'}
        span={<RequiredSpan id={names[count]}/>}
    />;
    count+=3;

    allcode[4] =  <div className={"form-group row"} key={count}>{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Город проживания','Домашний адрес'];
    for (let i = 0; i < title.length; i++) {
        input[i] = inputField(title[i], names[count], 'col-lg-6',null,'', <RequiredSpan id={names[count]}/>);
        count++;
        // if(i === 2 ) {
        //     // input[i] = inputField(title[i], names[count], 'col-lg-3', '','', RequiredSpan());
        //     input[i] = inputFieldOnlyNumber(title[i], names[count], 'col-lg-3', '','', <RequiredSpan id={names[count]}/>);
        // }

    }

    allcode[5] =  <div className={"form-group row"} key={count}>{input}</div>;
//------------------------------------------------------------------------------------
    input = [];
    title = ['Мобильный телефон','Второй мобильный номер'];
        input[0] =inputFieldOnlyNumberForMobile(title[0], names[count], 'col-lg-3 d-flex', '','',null,'+7 ')
    count++;
        input[1] =inputFieldOnlyNumberForMobile(title[1], names[count], 'col-lg-3 d-flex', '','',null,'+7 ')
    count++;
    allcode[6] =  <div className={"form-group row"} key={count}>{input}</div>;
//------------------------------------------------------------------------------------

    input = [];
    input[0] = inputFieldEmail('Личная электронная почта', names[count], 'col-lg-6',null,'', <RequiredSpan id={names[count]}/>);
    count++;
    input[1] = inputField('Электронная почта (корпоративный)', names[count], 'col-lg-6',null,'');
    count++;

    allcode[7] =  <div className={"form-group row"} key={count}>{input}</div>;

    count++;
 //----------------------------------------------------------------------------------------------------
   const buttonStyle = {
       marginTop: '20px'
   }
    const tab2 = document.getElementById('2-tab');
    allcode[8] = <div key={count} className="">
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




