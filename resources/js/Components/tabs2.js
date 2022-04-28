let dropdownValues = null;
if(typeof dataArrayForDropDown !== 'undefined'){
     dropdownValues =  JSON.parse( JSON.stringify(dataArrayForDropDown));
}

import {
    dropDown,
    DropDownfieldOfActivity,
    inputField,
    inputFieldOnlyNumber,
    label,
    RadioB,
    RadioButton,
    RequiredSpan
} from "./components.js";

let count = 0;


export function tabs_2(names) {

    let allcode = [];

    let title =['Занимаемая должность',
                'Компания (полное наименование)'
                 ];
    let input = [];
    let sec = [];

        input[0] = inputField(title[0], names[count],'col-lg-4',null,'', <RequiredSpan id={names[count]}/>);
        count++;
        input[1] = inputField(title[1], names[count], 'col-lg-8',null,'', <RequiredSpan id={names[count]}/>);
        count++;



    allcode[0] =  <div className={"form-group row"} key={count}>{input}</div>;
    //----------------------------------------------------------------------------------

    input = [];
    title = ['Юридический адрес'];


    input[0] = inputField(title[0], names[count],'col-lg-12',null,'', <RequiredSpan id={names[count]}/>);
    count++;

    allcode[1] =  <div className={"form-group row"} key={count}>{input}</div>;
// ------------------------------------------------------------------------------------------

    input = [];
    title = ['Общий трудовой стаж со дня окончания вуза (первое высшее образование)'];


    input[0] = inputField(title[0], names[count],'col-lg-12',null,'', <RequiredSpan id={names[count]}/>);
    count++;

    allcode[2] =  <div className={"form-group row"} key={count}>{input}</div>;
// ------------------------------------------------------------------------------------------



    input = [];
    title = ['Управленческий стаж','Вы являетесь','Сфера деятельности'];
    let fieldOfActivity = ['fieldOfActivity','sadsa','asdsad'];
    let jobType = ['jobType'];
    if(dropdownValues){
         fieldOfActivity = dropdownValues['fieldOfActivity'];
         jobType = dropdownValues['jobType'];
    }


    sec = [jobType,fieldOfActivity ];


        input[0] = inputField(title[0], names[count],'col-lg-8',null,'', <RequiredSpan id={names[count]}/>);
        count++;
        input[1] = dropDown(title[1],names[count],sec[0],'','col-lg-4',<RequiredSpan id={names[count]}/>, 0);
        count++;
        input[2] = <DropDownfieldOfActivity title={title[2]}
                                            name={names[count]}
                                            dopmenuname={names[count+1]}
                                            otherName={names[count+2]}
                                            section={sec[1]}
                                            span={<RequiredSpan id={names[count]}/>} key={1}/>;
        count+=3;

        allcode[3] =  <div className={"form-group row"} key={count}>{input}</div>;
// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Наличие командировок'];
   let titleForCheckBox = ['Да','Нет'];
    let arraycount = count;

   let one = <div className={'col-lg-8 ms-5 d-flex'} >
                              {inputFieldOnlyNumber('Сколько раз в год', names[arraycount + 1], 'col-lg-6 me-2', '','', <RequiredSpan id={names[arraycount + 1]}/>)}
                              {inputFieldOnlyNumber('Продолжительность', names[arraycount + 2], 'col-lg-6', '','', <RequiredSpan id={names[arraycount + 2]}/>)}
               </div>

    let popUpElement = [one]
    input[0] = <RadioB input={true} hidden={true} popupIndex={[0]} popUpElement={popUpElement} classN={'col-lg-8'} name={names[count]} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>}/>;

    count+=2;
    allcode[4] =  <div className={"form-group row"} key={count} >{input}</div>;
    count++;

    //--------------------------------------------------------------------------------
    const buttonStyle = {
        marginTop: '20px'
    }
    const tab3 = document.getElementById('3-tab');
    allcode[5] = <div key={count} className="">
        <div className="d-flex align-items-lg-end" >
            <input value={"Далее 'Профиль' "} type={'button'} onClick={function () {
                let tab = new bootstrap.Tab(tab3)
                tab.show()
            }}/>
        </div>
    </div>

    return(
        <div  className={'m-5'}>{allcode}</div>
    );
// ------------------------------------------------------------------------------------------
}
