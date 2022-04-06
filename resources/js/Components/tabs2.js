// let dropdownValues =  JSON.parse( JSON.stringify(dataArrayForDropDown));
import {dropDown, inputField, RadioB, RadioButton, RequiredSpan} from "./components.js";

let count = 0;
let names = [
             'positionAtWord',
             'nameOfTheCompany',
             'legalAdress',

             'firstWorkExperience',
             'upravlencheskiy_stazh',
             'jobType',
             'fieldOfActiviy',
             'availabilityOfBusinessTrips',
    'availabilityOfBusinessTripsInputYes',
    'availabilityOfBusinessTripsInputDuration'
];


export function tabs_2() {
    let allcode = [];

    let title =['Занимаемая должность',
                'Компания (полное наименование)',
                'Юридический адрес',
                'Общий трудовой стаж со дня окончания вуза (первое высшее образование)'
                 ];
    let input = [];
    let sec = [];

        input[0] = inputField(title[0], names[count],'col-lg-4',null,'', RequiredSpan());
        count++;
        input[1] = inputField(title[1], names[count], 'col-lg-8',null,'', RequiredSpan());
        count++;
        input[2] = inputField(title[2], names[count],'col-lg-12',null,'', RequiredSpan());
        count++;
        input[3] = inputField(title[3], names[count],'col-lg-12',null,'', RequiredSpan());


    allcode[0] =  <div className={"form-group row"} key={count}>{input}</div>;
    //----------------------------------------------------------------------------------

    input = [];
    title = ['Управленческий стаж','Вы являетесь','Сфера деятельности'];
    let upravlencheskiy_stazh = ['sdfdsf'];
    let jobType = ['sdfdsf'];

    sec = [upravlencheskiy_stazh, jobType];

        count++;
        input[0] = inputField(title[0], names[count],'col-lg-8',null,'', RequiredSpan());
        count++;
        input[1] = dropDown(title[1],names[count],sec[0],'','col-lg-4', <RequiredSpan/>);
        count++;
        input[2] = dropDown(title[2],names[count],sec[1],null,null, <RequiredSpan/>);
        count++;

        allcode[1] =  <div className={"form-group row"} key={count}>{input}</div>;
// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Наличие командировок'];
   let titleForCheckBox = ['Да','Нет'];
    let arraycount = count;
   let one = <div className={'col-lg-8 ms-5'} hidden>
                   <input type="text" name={names[arraycount + 1]} placeholder="Если «Да», сколько раз в год"
                          className=" user-how_many_trips col-lg-8" />
                   <input type="text" name={names[arraycount + 2]} placeholder="Продолжительность"
                          className=" user-how_long_trips col-lg-8 " />
               </div>

    let popUpElement = [one]
    input[0] = <RadioB input={true} popupIndex={[0]} popUpElement={popUpElement} classN={'col-lg-8'} name={names[count]} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan/>}/>;

    count+=2;
    allcode[2] =  <div className={"form-group row"} key={count} >{input}</div>;
    count++;

    //--------------------------------------------------------------------------------
    const buttonStyle = {
        marginTop: '20px'
    }
    const tab3 = document.getElementById('3-tab');
    allcode[3] = <div key={count} className="">
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
