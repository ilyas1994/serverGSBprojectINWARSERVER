let dropdownValues = null;

if(typeof dataArrayForDropDown !== 'undefined'){
     dropdownValues =  JSON.parse( JSON.stringify(dataArrayForDropDown));
}
let MBAprogram = null;
if(typeof programMBA !== 'undefined'){
    MBAprogram =  JSON.parse( JSON.stringify(programMBA));
}

import {
    AddEducation,

    CheckBox,
    dataPiker,
    dropDown, FilePicker,
    inputField,
    label, MBAPropgramRadio,
    OtherLanguageButton, RadioB, RequiredSpan,
    StarFabric,
    TextArea
} from "./components";

import {ValidateAndSubmitButton} from "./validateWindow";

import ReactDOM, {render} from "react-dom";
import {Input} from "postcss";
import {getElement} from "bootstrap/js/src/util";
import {getNames} from "./names";


let count = 0;


export function tabs_3(names) {
    // console.log(names);
    let allcode = [];
    let title =['Начало обучения', 'Конец обучения'];
    let input = [];
    let sec = [];
    let labelvar = <div key={0}>
                        <label htmlFor="" className="title mb-3">Образование</label>
                        <hr/>
                    </div>

    input[0] = dataPiker(title[0], names[count],'col-lg-6', <RequiredSpan id={names[count]}/>, 0);
    count++;
    input[1] = dataPiker(title[1], names[count],'col-lg-6', <RequiredSpan id={names[count]}/>, 1);
    count++;

    allcode[0] =  <div className={"form-group row"} key={count}>{labelvar}{input}</div>;
    //----------------------------------------------------------------------------------

    input = [];
    title = ['Язык обучения','Академическая степень/квалификация'];
    let qualification = ['qualification'];
    let languageEducation = ['languageEducation'];
    if(dropdownValues){
        qualification = dropdownValues['qualification'];
        languageEducation = dropdownValues['languageEducation'];
    }
    sec = [languageEducation,qualification];

    input[0] = dropDown(title[0], names[count], sec[0],null,'col-lg-4', <RequiredSpan id={names[count]}/> , 0);
    count++;
    input[1] = dropDown(title[1], names[count], sec[1],null,'col-lg-4', <RequiredSpan id={names[count]}/>, 1);
    count++;
    allcode[1] =  <div className={"form-group row"} key={count}>{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Полное наименование учебного заведения'];

    input[0] = inputField(title[0], names[count],'col-lg-8',null,'', <RequiredSpan id={names[count]}/>);
    count++;
    allcode[2] =  <div className={"form-group row"} key={count}>{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Специальность (например, юриспруденция или разработка нефтяных и газовых месторождений)'];
    input[0] = inputField(title[0], names[count],'col-lg-12',null,'', <RequiredSpan id={names[count]}/>);
    count++;
    allcode[3] =  <div className={"form-group row"} key={count}>{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    labelvar = <div key={0}>
                    <label htmlFor="" className="title mb-3">Если у Вас есть еще образование нажмите кнопку "добавить"</label>
                    <hr/>
                </div>
    input[0] = <div key={1}>
                  <AddEducation dropdownValues={dropdownValues}/>
               </div>

    allcode[4] = <div className={"form-group row"}  key={8}>
                    {labelvar}
                    {input}
                </div>;
//     input = [];
//     title = ['Язык обучения','Имеется ли второе высшее образование ','Имеется ли магистерская степень'];
//
//     // let languageEducation = ['languageEducation'];
//     let checkSecondDegree = ['checkSecondDegree'];
//     let checkMasterDegree = ['checkMasterDegree'];
//     if(dropdownValues){
//          languageEducation = dropdownValues['languageEducation'];
//          checkSecondDegree = dropdownValues['checkSecondDegree'];
//          checkMasterDegree = dropdownValues['checkMasterDegree'];
//     }
//
//     sec = [languageEducation];
//     for (let i = 0; i < sec.length ; i++) {
//         input[i] = dropDown(title[i], names[count], sec[i],null,'col-lg-4',<RequiredSpan id={names[count]}/>);
//         count++;
//     }


// ------------------------------------------------------------------------------------------
    input = [];
    let   checkLanguageKazakh = ['levellanguages'];
    let   checkLanguageEnglish = ['levellanguages'];
    let   checkLanguageFrench = ['levellanguages'];
    let   checkLanguageGerman = ['levellanguages'];
    let   checkLanguageChinese = ['levellanguages'];
    if(dropdownValues){
           checkLanguageKazakh = dropdownValues['levellanguages'];
           checkLanguageEnglish = dropdownValues['levellanguages'];
           checkLanguageFrench = dropdownValues['levellanguages'];
           checkLanguageGerman = dropdownValues['levellanguages'];
           checkLanguageChinese = dropdownValues['levellanguages'];
    }
    sec = [checkLanguageKazakh,checkLanguageEnglish,checkLanguageFrench,checkLanguageGerman,checkLanguageChinese ];
    let language = ['Казахский','Английский','Французский','Немецкий','Китайский'];
     labelvar = <div>
                    <label htmlFor="" className="title mb-3">Знание языков</label>
                    <hr/>
                </div>

    for (let i = 0; i < sec.length; i++) {
        input[i] =  <div key={i}>
                         <div className={'col-lg-12 row'}>
                             <div className={'col-lg-4 d-lg-flex align-items-center'}>
                                 { label(language[i],'col-lg-4 my-3')}
                             </div>
                             {dropDown('',names[count], sec[i], null, 'col-lg-7',null, i)}
                         </div>
                   </div>

        count++;
    }

    const arrayFromBack = ['qualification'];
    allcode[5] = <div id={'lang'} className={"form-group row"} key={count}>
                            {labelvar}
                            {input}
                            <OtherLanguageButton  dropdown={arrayFromBack}/>
                    </div>;
    count++;

    // ------------------------------------------------------------------------------------------

    input = [];
    title = ['Наличие сертификатов на знание Английского языка','Дата выдачи сертификата '];

    let certificateIssueDate = ['englishProficiencyCertificates'];
    if(dropdownValues){
        certificateIssueDate = dropdownValues['englishProficiencyCertificates'];
    }
    sec = [certificateIssueDate];

        input[0] = dropDown(title[0], names[count], sec[0],null,'col-lg-6',null,0);
        count++;

        input[1] = dataPiker(title[1],names[count],'col-lg-6');
        count++;

    allcode[6] =  <div className={"form-group row"} key={count}>{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Пожалуйста, поделитесь с нами деятельностью и/или интересами, которые имеют для Вас большое значение.'];
    let titleForCheckBox = ['Спорт','Искусство','Другое'];
    input[0] = <CheckBox name = {names[count]} column={1} count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} />;
    count++;
    allcode[7] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Пожалуйста, перечислите три ваших самых больших достижения'];
    input[0] = inputField(title[0], names[count],'col-lg-12',null,'',<RequiredSpan id={names[count]}/>);
    count++;

    allcode[8] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Почему вы решили обучаться на программе MBA?'];
    input[0] = TextArea(title[0], names[count],'col-lg-12',null,<RequiredSpan id={names[count]}/>);
    count++;

    allcode[9] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Какие информационные сайты вы читаете?'];
    titleForCheckBox = ['Tengrinews.kz','Neonomad.kz','Liter.kz','Хабар 24','The Village.kz','NUR.KZ',
                        'Zakon.kz','Newtimes.kz','Forbes Kazakhstan','Vesti.kz','The Steppe','Ratel.kz',
                        'Sputnik Казахстан','informБЮРО','Zakon.kz','Inbusiness.kz','Vlast.kz','Kapital.kz'
                         ];
    input[0] = <CheckBox classN={'col-lg-4'}  name={names[count]} column={3}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>}/>;
    count++;

    input[1] = inputField('', names[count],'col-lg-12','','Другое');
    count++;

    allcode[10] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Какими социальными сетями/мессенжерами вы пользуетесь?'];
    titleForCheckBox = ['Facebook','LinkedIn','Telegram','Viber',
                        'Tumblr','ВКонтакте','WhatsApp','Skype',
                        'Twitter','Одноклассники','Instagram'
    ];
    input[0] = <CheckBox classN={'col-lg-4'} name={names[count]} column={3}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>} />;
    count++;


    allcode[11] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Ваша страница в Facebook','Ваша страница в Instagram','Ваша страница в Twitter'];
    input[0] = <div key={'0'}>
                     <hr/>
                     {inputField(title[0], names[count],'col-lg-12','','')}
                   </div>
    count++;
    for (let i = 1; i < 3; i++) {
        input[i] = inputField( title[i], names[count],'col-lg-12','','');
        count++;
    }

    allcode[12] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Как Вы узнали о программах МВА Высшей Школы Бизнеса AlmaU '];
    titleForCheckBox = ['Рекомендация родственников, друзей, коллег, знакомых',
                        'Работодатель/Отдел кадров',
                        'Целенаправленный поиск МВА',
                        'Выставки/конференции/мероприятия',
                        'Реклама в медиа',
    ];

    input[0] = <RadioB classN={'col-lg-8'} name={names[count]} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>}/>;
    count++;
    //
    allcode[13] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Причины, по которым Вы выбрали МВА Высшей Школы Бизнеса AlmaU'];
    titleForCheckBox = ['Положительная репутация вуза на рынке бизнес-образования',
        'Практическая направленность обучения, приближенная к казахстанским реалиям',
        'Высококвалифицированный профессорско-преподавательский состав',
        'Клиентоориентированность персонала, индивидуальный подход',
        'Удобная форма обучения',
        'Доступная цена',
        'Гибкий график оплаты',
        'Наличие системы скидок',
        'Рекомендации родственников, друзей, коллег, знакомых',
        'Удобное месторасположение',
        'Нет или не знаю альтернативы',
        'Международная аккредитация',
        'Возможность обучения без отрыва от работы',''
    ];
    input[0] = <CheckBox input={true} classN={'col-lg-12'} name={names[count]} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>} />;
    count+=2;

    allcode[14] =  <div className={"form-group row"} key={count} >{input}</div>;


// ------------------------------------------------------------------------------------------
     input = [];
    title = [];
    let titleForStar =['Качество образования ',
         'Большой выбор программ ',
         'Месторасположение бизнес-школы ',
         'Наличие скидок ',
         'Продолжительность обучения ',
         'Стоимость обучения ',
         'Репутация бизнес-школы /университета ',
         'Наличие гибкой системы оплаты ',
         'Форма обучения ',
         'Состав преподавателей '
    ];


     labelvar = <div>
                    <label htmlFor="" className="title mb-3">Какие характеристики программы МВА для Вас важны (отметьте каждый пункт) </label>
                    <hr/>
                </div>

    input[0] = <StarFabric  input={true} classN={'col-lg-6'} name={names[count]} column={2}  count={titleForStar.length} title={title} titleForStar={titleForStar} key={count} />
    count++;

    allcode[15] = <div className={"form-group row"} key={count}>{labelvar}{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Другое'];
    input[0] = inputField(title[0], names[count],'col-lg-12','','');
    count++;

    allcode[16] =  <div className={"form-group row"} key={count} >{input}</div>;

// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Источник финансирования Вашего обучения'];
    titleForCheckBox = [
        'собственные средства',
        'средства работодателя',
        'частично за счет работодателя, частично из собственных средств'
    ];
    let pop =  <div className="financing_company" >
        <div className="row">
            <div className="col-lg-6">
                {/*<label htmlFor="">Реквизиты<RequiredSpan id={names[count]}/></label>*/}
                <input type="text" name={names[count][0]}
                       placeholder="Реквизиты"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][6]}
                       placeholder="Наименование"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][1]}
                       placeholder="БИН"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][7]}
                       placeholder="РНН"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][2]}
                       placeholder="Юридический адрес"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][8]}
                       placeholder="Телефон, факс"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][3]}
                       placeholder="Банк"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][9]}
                       placeholder="ИИК"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][4]}
                       placeholder="Электронная почта"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][10]}
                       placeholder="Сайт"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][5]}
                       placeholder="ФИО руководителя компании"/>
            </div>
            <div className="col-lg-6">
                <input type="text" name={names[count][11]}
                       placeholder="Должность руководителя компании"/>
            </div>
        </div>
    </div>;
    count++;
    let popUpElement = ['',pop,pop];

    input[0] = <RadioB input={true} hidden={true} popupIndex={[1,2]} popUpElement={popUpElement} classN={'col-lg-12'} name={names[count]} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>} />;

    count++;
    allcode[17] =  <div className={"form-group row"} key={count} >{input}</div>;


// ------------------------------------------------------------------------------------------
    input = [];
    title = ['Выберите программу МВА'];

    //окончательная версия

    titleForCheckBox = [];
    popUpElement = [];
    for (const key of Object.keys(MBAprogram)) {
        titleForCheckBox.push(key);
        let popupArr = [];

        for (let i = 0; i < MBAprogram[key].length; i++) {

            popupArr.push(<label key={i} className="radio source_label_">
                                <input type="radio" name={names[count]} defaultChecked={true} value={key+" -> "+MBAprogram[key][i]}/>
                                <span>{MBAprogram[key][i]}</span>
                            </label>);
        }
        let popup = ''
        if(popupArr.length > 0){
            popup = <div className="label_in_ ms-5" id="label_in_1_" >
                {popupArr}
            </div>
        }
        popUpElement.push(popup);
    }

    titleForCheckBox = ['General MBA - Казахстанская программа MBA',
        'Казахстанская модульно-дистанционная программа',
        'xecutive MBA Двудипломная программа с Высшей Школой Менеджмента Санкт-Петербургского Государственного Университета (Россия)',
        'МВА Финансовый инжиниринг',
        'МВА Менеджмент в здравоохранении',
        'МВА Менеджмент в социальной сфере(г. Нур-Султан)',
        'МВА (г. Ташкент)',
        'МВА (г. Душанбе)'
    ];

     input[0] = <MBAPropgramRadio input={true}  popUpElement={popUpElement} classN={'col-lg-12'} name={'notname'} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>}/>;

    // input[0] = <RadioB input={true} hidden={true} popupIndex={[0,1,3,4]} popUpElement={popUpElement} classN={'col-lg-12'} name={'notname'} column={1}  count={titleForCheckBox.length} title={title} checkBoxTitle={titleForCheckBox} key={count} span={<RequiredSpan id={names[count]}/>}/>;
    count++;


    allcode[18] =  <div className={"form-group row"} key={count+100} > {input}</div>;


    // ------------------------------------------------------------------------------------------


    allcode[19] = <FilePicker name={names[count]+'[]'} uploadLabel={'Прикрепить скан удостоверение личности (.pdf или .jpg, .png)'} key={count} span={<RequiredSpan id={names[count]}/>} />
    count++;
    allcode[20] = <FilePicker name={names[count]+'[]'} uploadLabel={'Прикрепить резюме (.pdf или .doc)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[21] = <FilePicker name={names[count]+'[]'} uploadLabel={'6 фото 3х4 (.pdf или .doc)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[22] = <FilePicker name={names[count]+'[]'} uploadLabel={'Прикрепить скан диплома с приложением (.pdf или .jpg, .png)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[23] = <FilePicker name={names[count]+'[]'} uploadLabel={'Прикрепить скан справки с места работы с указанием должности (.pdf или .jpg, .png)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[24] = <FilePicker name={names[count]+'[]'} uploadLabel={'Медицинская справка (форма 075У) (.pdf или .doc)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[25] = <FilePicker name={names[count]+'[]'} uploadLabel={'Прикрепить скан сертификата на знание Английского языка (.pdf или .jpg)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[26] = <FilePicker name={names[count]+'[]'} uploadLabel={'Прикрепить мотивационное эссе (.pdf или .doc)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[27] = <FilePicker name={names[count]+'[]'} uploadLabel={'Копия паспорта (.pdf или .jpg, .png)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;
    allcode[28] = <FilePicker name={names[count]+'[]'} uploadLabel={'2 рекомендательных письма (.pdf или .jpg, .png)'} key={count} span={<RequiredSpan id={names[count]}/>}/>
    count++;

    // ------------------------------------------------------------------------------------------

    allcode[29] = <div key={count}>
        <small className=" ">Нажимая на кнопку, я даю свое согласие на обработку персональных
            данных и
            соглашаюсь <a
                href="https://gsb.almau.edu.kz/wp-content/uploads/2017/03/%d0%9f%d0%be%d0%bb%d0%b8%d1%82%d0%b8%d0%ba%d0%b0-%d0%9a%d0%be%d0%bd%d1%84%d0%b8%d0%b4%d0%b5%d0%bd%d1%86%d0%b8%d0%b0%d0%bb%d1%8c%d0%bd%d0%be%d1%81%d1%82%d0%b8.pdf "
                target="_blank ">c политикой конфиденциальности</a>
        </small>
    </div>
    count++;

    // ------------------------------------------------------------------------------------------

    allcode[30] = <ValidateAndSubmitButton allName={getNames()} key={count} />
    count++;

    return(
        <div className={'m-5'}>{allcode}</div>
    );
// ------------------------------------------------------------------------------------------
}
