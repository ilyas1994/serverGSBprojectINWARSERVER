import {eventListeners} from "@popperjs/core";


export function RequiredSpan(props) {
return <span id={props.id} className={'required'}>*</span>;
}

export function TextArea(title, name, className = 'col-lg-4', value = null, span = null){
        let input = '';
        input = <div key={name} className={className}>
                    <div className={'position-relative'}>
                        <label className={'form-label'} htmlFor="">{title} {span}</label>
                        <textarea type="text" name={name} required={true} className={'form-control '} defaultValue={value} maxLength={32}/>
                        <div className="invalid-feedback">
                            Заполните {title}
                        </div>
                    </div>
                </div>

    return(input)
}


export function dropDownClick( title, name, section, sample = null, className = 'col-lg-4', span = null){
    let sec = [];

    function dropdownClick(e) {
        let iin = document.getElementsByName('Iin');
        switch (e['target'].selectedIndex) {
            case 0:{
                iin[0].setAttribute('minlength','9');
                iin[0].setAttribute('maxlength','9');
                iin[0].parentElement.children[2].innerText = 'Поле должно быть не меньше 9 цифр!';
                break;
            }
            case 1:{
                iin[0].setAttribute('minlength','11');
                iin[0].setAttribute('maxlength','11');
                iin[0].parentElement.children[2].innerText = 'Поле должно быть не меньше 11 цифр!';
                break;
            }

            case 2:{
                iin[0].setAttribute('minlength','12');
                iin[0].setAttribute('maxlength','12');
                iin[0].parentElement.children[2].innerText = 'Поле должно быть не меньше 12 цифр!';
                break;
            }
            case 3:{
                iin[0].setAttribute('minlength','12');
                iin[0].setAttribute('maxlength','12');
                iin[0].parentElement.children[2].innerText = 'Поле должно быть не меньше 12 цифр!';
                break;
            }
            case 4:{
                iin[0].setAttribute('minlength','12');
                iin[0].setAttribute('maxlength','12');
                iin[0].parentElement.children[2].innerText = 'Поле должно быть не меньше 12 цифр!';
                break;
            }
            case 5:{
                iin[0].setAttribute('minlength','12');
                iin[0].setAttribute('maxlength','12');
                iin[0].parentElement.children[2].innerText = 'Поле должно быть не меньше 12 цифр!';
                break;
            }
        }

    }

    for (let i = 0; i < section.length; i++) {
        sec[i] =  <option  value={i+1} key={i}>{section[i]}</option>;
    }

    return  <div key={name} className={className}>
        {title !== '' ? <label htmlFor="" >{title}{span}</label> : ""}
        <select name={name} onChange={dropdownClick.bind(this)}  className={"col-lg-0 selectpicker user-gender"}>
            {sec}
        </select>
        {sample}
    </div>
}
export function inputFieldOnlyNumber(title, name, className = null, value = null, placeholder = '', span = null){
    let input = '';
    let req =  span !== null
    let reqClass =  span !== null ? 'form-control ' : ''
    let tooltip = '';
    let maxlength = 0;
    let minlength = 0;
    if(name === 'Iin') {
        maxlength = 9;
        minlength = 9;

        tooltip = <div className="invalid-tooltip">
            Поле должно быть не меньше {minlength} цифр!
        </div>
    }
    else {
        maxlength = 32;
        minlength = 0;
        tooltip = <div className="invalid-tooltip">
            Заполните обязательное поле {title}
        </div>
    }
    function isNumberKey(evt)
    {

        evt.returnValue =  (evt.keyCode !== 46 && evt.keyCode > 31 && (evt.keyCode < 48 || evt.keyCode > 57));
        if (evt.returnValue) evt.preventDefault();
    }


    input = <div key={name} className={className}>
                <div className={'position-relative'}>
                    <label className={''} htmlFor="">{title}{span}</label>
                    <input type="text" name={name} required={req} onKeyDown={isNumberKey.bind(this)}  placeholder={placeholder} className={'user-surname '+reqClass} defaultValue={value}
                           maxLength={maxlength}
                    minLength={minlength}/>
                    {tooltip}
                </div>
            </div>
    return(input)
}
export function inputField(title, name, className = null, value = null, placeholder = '', span = null){
    let input = '';
    let req =  span !== null
    let reqClass =  span !== null ? 'form-control ' : '';

        input = <div key={name} className={className}>
                 <div className={'position-relative'}>
                    <label className={''} htmlFor="">{title}{span}</label>
                    <input type="text" name={name}  required={req} placeholder={placeholder}  className={'user-surname '+reqClass} defaultValue={value}

                           maxLength = {33}/>
                     <div className="invalid-tooltip">
                         Заполните обязательное поле {title}
                     </div>
                    </div>


                </div>
    return(input)
}
export function inputFieldEmail(title, name, className = null, value = null, placeholder = '', span = null){
    let input = '';
    let req =  span !== null
    let reqClass =  span !== null ? 'form-control ' : ''
    function onKeydown(evt) {
        if(evt.key === '@'){
            evt.preventDefault();
        }
    }

    input = <div key={5} className={className}>
        <div  className={'position-relative'}>
            <label className={''} htmlFor="">{title}{span}</label>
            <div  className={'d-flex position-relative'} >
                <input type="text" name={name} required={req} placeholder={placeholder} onKeyDown={onKeydown.bind(this)} className={'user-surname '+reqClass} defaultValue={value} maxLength={32}/>
                {dropDown( '', 'mail[]', ['@mail.ru','@gmail.com','@inbox.ru','@list.ru','@bk.ru','@yandex.ru','@yahoo.com','@hotmail.com','@outlook.com'],null,'col-lg-5')}
                <div  className="invalid-tooltip">
                    Заполните обязательное поле {title}
                </div>
            </div>
        </div>
    </div>
    return(input)
}


export function dataPiker(title, name, className = 'col-lg-4',span = null) {

    let tooltip = span !== null ?  <div className="invalid-tooltip">
                                        Заполните обязательное поле {title}
                                   </div> : '';
    let req = span  !== null;
    return(
                <div key={name} className={className}>
                    <div className={'position-relative'}>
                        <label htmlFor={""}>{title}{span}</label>
                        <input type="date"  required={req} name={name} className={"user-dateofbirth"}/>
                        {tooltip}
                    </div>

                </div>
        )
}

export function label(title, className= 'col-lg-4'){
    return(
        <label htmlFor="" className={className}> {title}</label>
    )
}
export function dropDown( title, name, section, sample = null, className = 'col-lg-4', span = null){
    let sec = [];

    for (let i = 0; i < section.length; i++) {
         sec[i] =  <option  value={i+1} key={i}>{section[i]}</option>;
    }

    return  <div key={name} className={className}>
                    {title !== '' ? <label htmlFor="" >{title}{span}</label> : ""}
                    <select name={name}   className={"col-lg-0 selectpicker user-gender"}>
                        {sec}
                    </select>
                    {sample}
             </div>
}


export class OtherLanguageButton extends React.Component{
    newLang = [];
    langCount = 0;
    drop;

    constructor(props) {
        super(props);
        this.state = {newStateLang:[]}
        this.input = this.props.input;
        this.drop = this.props.dropdown;
    }

    handlerClick() {

        this.newLang[this.langCount] = <div key={this.langCount}>
                                            <div className={'col-lg-12 row'}>
                                                <div className={'col-lg-4 d-lg-flex align-items-bottom'}>
                                                    <input  type="text"/>
                                                </div>
                                                {dropDown('','asdasd', this.drop, null, 'col-lg-7')}
                                            </div>

                                      </div>
        this.setState({newStateLang :  this.newLang});
        this.langCount++;
        // console.log(this.state.newStateLang);
    }
    render(){
        return  <div >
                    <div >
                        {this.state.newStateLang}
                    </div>
                    <div >
                        <div  className="plus user-language_plus" onClick={this.handlerClick.bind(this)} >Добавить ещё</div>
                    </div>
                </div>;

    }

}

export function Check(props) {
    const divStyle = {
        marginLeft: '0px',
        width:'1em',
        height:'1em'
    };
    let req =  props.span !== null
    return  <div  className="">
        {/*<div  className={'col-lg-12'} >*/}
            <div className={'position-relative'}>
                <input className={'form-check-input p-0'}   type="checkbox"  style={divStyle} name={props.name+'[]'} onChange={props.it.handleClick.bind(this)} id={props.id}  />
                {props.metka}
                {/*<div className="invalid-feedback">Example invalid select feedback</div>*/}
            </div>
        {/*</div>*/}
    </div>
}


export class CheckBox extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            allcheck:null
        }
    }
    allArr;
    handleClick(i){
        let radioElements = i['target'].parentElement.parentElement.parentElement.parentElement;
        let countAllCheck = radioElements.childElementCount;


        for (let j = 1; j < countAllCheck; j++) {
            for (let k = 0; k < radioElements.children[j].childElementCount; k++) {
                // console.log(radioElements.children[j].children[k].children[0].children[0].id.split('_')[0]);
                if(radioElements.children[j].children[k].children[0].children[0].id.split('_')[0] !== '')
                  radioElements.children[j].children[k].children[0].children[0].value = radioElements.children[j].children[k].children[0].children[0].id.split('_')[0];
                else  radioElements.children[j].children[k].children[0].children[0].value = 'def';

            }
            // radioElements.children[j].children[0].children[0].value = radioElements.children[j].children[0].children[0].id.split('_')[0];
        }
        // console.log(i['target'].id);
    }
     click(it){
         // console.log(it['target'].parentElement.children[0]);
        it['target'].parentElement.children[0].checked = true;
    }
    onChangeOtherInput(it){
        it['target'].parentElement.children[0].value = it['target'].value;
    }
    howMany(){
        let all = [];
        let column = this.props.column;
        let start = 0;
        let end = Math.ceil(this.props.count/column);
        for (let j = 0; j < column; j++){
            let chekbox = [];
            for (let i = start; i < end; i++) {
                if(this.props.input) {
                    if (this.props.checkBoxTitle.length - 1 === i)
                        chekbox[i] = <Check
                                            metka = {<input id={'checkBoxReasonsForChoosingMBA_other'} type="text"  placeholder="Другие" name={this.props.name+'[]'}  htmlFor={this.props.checkBoxTitle[i] + '_' + i}
                                                     className="mbareasons_another_input col-8 ms-1" onChange={this.onChangeOtherInput.bind(this)} onClick={this.click.bind(this)} maxLength="64"/>}
                                            name={this.props.name}
                                            it={this}
                                            id={this.props.checkBoxTitle[i] + '_' + i}
                                            title={this.props.checkBoxTitle[i]} key={i}
                                            value={this.props.checkBoxTitle[i]}
                                            span={this.props.span}
                                     />
                    else
                        chekbox[i] = <Check
                                            metka = {<label  className=" col-lg-8 ms-2"  htmlFor={this.props.checkBoxTitle[i] + '_' + i} >{this.props.checkBoxTitle[i]}</label>}
                                            name={this.props.name}
                                            it={this}
                                            id={this.props.checkBoxTitle[i] + '_' + i}
                                            title={this.props.checkBoxTitle[i]}
                                            key={i}
                                            span={this.props.span}
                                     />
                }else{
                    chekbox[i] = <Check
                                        metka = {<label  className="col-lg-8 ms-2" htmlFor={this.props.checkBoxTitle[i] + '_' + i} >{this.props.checkBoxTitle[i]}</label>}
                                        name={this.props.name}
                                        it={this}
                                        id={this.props.checkBoxTitle[i] + '_' + i}
                                        title={this.props.checkBoxTitle[i]}
                                        key={i}
                                        span={this.props.span}
                                    />
                }
            }
            start = end;
            if(this.props.count-end >= Math.ceil(this.props.count/column)) end += Math.ceil(this.props.count/column);
            else end = this.props.count;

            all[j] =  <div key={j} className={this.props.classN }>
                         {chekbox}
                      </div>;
        }
        this.allArr = all;
        return  all
    }

    render(){
        //
        return(
            <div className={'row '}>
                  <label  htmlFor="">{this.props.title} {this.props.span}</label>
                  {this.howMany()}
            </div>
        )}
}


export function Radio(props) {
    const divStyle = {
        marginLeft: '0px',
        width:'1em',
        height:'1em',

    };
    return  <div  className="form-check">
                    <div className={'position-relative'}>
                        <input  className="form-check-input p-0" required={true}  type="radio"  style={divStyle} name={props.name} onChange={props.it.handleClick.bind(this)} id={props.id}  />
                        <label  className="form-check-label col-lg-11 ms-1" htmlFor={props.id} >{props.title}</label>
                        {props.popUpElement}
                         <div className="invalid-feedback">Выберите один из пункта</div>
                    </div>
            </div>
}

export class RadioB extends React.Component{

    constructor(props) {
        super(props);

    }

    handleClick(i){
        let countAll = i['target'].parentElement.parentElement.parentElement.childElementCount;
        let  radioElements = i['target'].parentElement.parentElement.parentElement;
        for (let j = 0; j < countAll; j++) {
            // console.log(radioElements.children[j].children[0].children[0].name);
           radioElements.children[j].children[0].children[0].value = radioElements.children[j].children[0].children[0].id;
        }

        for (let j = 0; j < countAll; j++) {
            if(radioElements.children[j].children[0].childElementCount > 2){
                // console.log(radioElements.children[j].children[0].children[2].className+" off");
                radioElements.children[j].children[0].children[2].hidden = true;
            }
        }

        if(i['target'].parentElement.childElementCount > 2){
            // console.log(  i['target'].parentElement.children[2].className+" on");
                          i['target'].parentElement.children[2].hidden = false;
        }
    }

    howMany(){
        let all = [];

        let column = this.props.column;
        let start = 0;
        let end = Math.ceil(this.props.count/column);
        for (let j = 0; j < column; j++){
            let chekbox = [];
            for (let i = start; i < end; i++) {
                if(this.props.input) {
                    if(this.props.popupIndex.includes(i)) {
                        chekbox[i] = <Radio
                            popUpElement={this.props.popUpElement[i]}
                            popupArray={this.props.popupIndex}
                            name={this.props.name}
                            it={this}
                            id={this.props.checkBoxTitle[i]}
                            title={this.props.checkBoxTitle[i]}
                            key={i}
                        />
                    }else{
                        chekbox[i] = <Radio
                            popupArray={this.props.popupIndex}
                            name={this.props.name}
                            it={this}
                            id={this.props.checkBoxTitle[i]}
                            title={this.props.checkBoxTitle[i]}
                            key={i}
                        />
                    }
                }else{
                    chekbox[i] = <Radio
                        name={this.props.name}
                        it={this}
                        id={this.props.checkBoxTitle[i]}
                        title={this.props.checkBoxTitle[i]}
                        key={i}
                    />
                }
            }
            start = end;
            if(this.props.count-end >= Math.ceil(this.props.count/column)) end += Math.ceil(this.props.count/column);
            else end = this.props.count;
            all[j] =  <div key={j} className={this.props.classN}>
                {chekbox}
            </div>;
        }

        return  all
    }

    render(){
        return(
            <div className={'row'}>

                    <label  htmlFor="">{this.props.title} {this.props.span}</label>
                    {this.howMany()}

            </div>
        )}
}



export class MBAPropgramRadio extends React.Component{

    constructor(props) {
        super(props);

    }

    handleClick(i){
        let countAll = i['target'].parentElement.parentElement.parentElement.childElementCount;
        let  radioElements = i['target'].parentElement.parentElement.parentElement;
        for (let j = 0; j < countAll; j++) {
            // console.log(radioElements.children[j].children[0].children[0].name);
            radioElements.children[j].children[0].children[0].value = radioElements.children[j].children[0].children[0].id;
        }

        for (let j = 0; j < countAll; j++) {
            if(radioElements.children[j].children[0].childElementCount > 2){
                // console.log(radioElements.children[j].children[0].children[2].className+" off");
                radioElements.children[j].children[0].children[2].hidden = true;
            }
        }

        if(i['target'].parentElement.childElementCount > 2){
            // console.log(  i['target'].parentElement.children[2].className+" on");
            i['target'].parentElement.children[2].hidden = false;
        }
    }

    howMany(){
        let all = [];

        let column = this.props.column;
        let start = 0;
        let end = Math.ceil(this.props.count/column);
        for (let j = 0; j < column; j++){
            let chekbox = [];
            for (let i = start; i < end; i++) {
                if(this.props.input) {
                    // if(this.props.popupIndex.includes(i)) {
                        chekbox[i] = <Radio
                            popUpElement={this.props.popUpElement[i]}
                            popupArray={this.props.popupIndex}
                            name={this.props.name}
                            it={this}
                            id={this.props.checkBoxTitle[i]}
                            title={this.props.checkBoxTitle[i]}
                            key={i}
                        />
                    // }else{
                    //     chekbox[i] = <Radio
                    //         popupArray={this.props.popupIndex}
                    //         name={this.props.name}
                    //         it={this}
                    //         id={this.props.checkBoxTitle[i]}
                    //         title={this.props.checkBoxTitle[i]}
                    //         key={i}
                    //     />
                    // }
                }
            }
            start = end;
            if(this.props.count-end >= Math.ceil(this.props.count/column))
                end += Math.ceil(this.props.count/column);
            else end = this.props.count;
            all[j] =  <div key={j} className={this.props.classN}>
                            {chekbox}
                      </div>;
        }

        return  all
    }

    render(){
        return(
            <div className={'row'}>

                <label  htmlFor="">{this.props.title} {this.props.span}</label>
                {this.howMany()}

            </div>
        )}
}

export function Star(props) {
    const divStyle = {
        marginLeft: '0px',
        width:'1em',
        height:'1em'
    };

        let allStarArr = [];
    let span = <RequiredSpan id={props.name}/>;

    for (let i = 10; i > 0; i--) {
            let StarArrinp = [];
            let StarArrlab = [];
             StarArrinp.push(
                                <input onClick={props.it.handleClick.bind(this)}  type="radio" required={true}  key={i} id={props.id+i.toString()} name={props.name} />
                            )
             StarArrlab.push(<label key={i+1} htmlFor={props.id+i.toString()} title={"Оценка "+i}/>)
             allStarArr.push(StarArrinp.concat(StarArrlab)) ;
            // props.span['props'].id = props.name;
        }
    // console.log(span)

    return <div className={'col-lg-12  row'}>
                <label  htmlFor="">{props.title}{span}  </label>
                <div className="rating-area col-lg-6">
                    {allStarArr}
                    <div className="invalid-feedback">поставьте оценку</div>
                </div>
          </div>

}

export class StarFabric extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            option1: false,
            option2: false,
            option3: false,
        }
    }

    handleClick(i){
        // console.log(i['target'].parentElement);
        let StarCount = i['target'].parentElement.childElementCount;
        let  radioElements = i['target'].parentElement;
        let value = 1;
        for (let j = 0; j < StarCount; j+=2) {
            // console.log(radioElements.children[j].name);
            radioElements.children[j].value = value;
            value++;
        }
    }

    howMany(){
        let all = [];
        let column = this.props.column;
        let start = 0;
        let end = Math.ceil(this.props.count/column);
        for (let j = 0; j < column; j++){
            let star = [];
            for (let i = start; i < end; i++) {
                star[i] = <Star name={this.props.name[i]} it={this} id={this.props.titleForStar[i]} title={this.props.titleForStar[i]} key={i} />
            }
            start = end;
            if(this.props.count-end >= Math.ceil(this.props.count/column)) end += Math.ceil(this.props.count/column);
            else end = this.props.count;
            all[j] =  <div key={j} className={this.props.classN}>
                {star}
            </div>;
        }

        if(this.props.title.length > 0){
            all[all.length-1] =  <label key={all.length-1} htmlFor="">{this.props.title} </label>
        }
        return  all
    }

    render(){
        return(
            <div className={'row'}>
                {this.howMany()}
            </div>
        )}
}

export class FilePicker extends React.Component{
     ul ;
     li = [];
     count = 0;
     picker ;
    filesArray = [];
    constructor(props) {
        super(props);

    }
    state = {
        files: <p>No files selected!</p>
    }

    deleteFile(e){
            let  index =  e['target'].parentElement.id;
            let name = e['target'].parentElement.children[1].alt;
        // console.log(name);
        this.li = this.li.filter(item => item['props'].id !== index);


        // this.filesArray = Array.from(this.picker.files).filter(item => item['name'] !== name);
        this.filesArray =  this.filesArray.filter(item => item['name'] !== name);
        // console.log(filesArray);
        const dt = new DataTransfer();
        this.filesArray.forEach((file) => {
            dt.items.add(file)
        })
         this.picker.files = dt.files

           if( this.filesArray.length > 0){
               this.ul = <ul className={'d-flex '}>{this.li}</ul>
               this.setState(() => { return { files: this.ul };});
           }else{
               this.setState(() => { return { files:  <p>No files selected!</p> };});
           }

    }
    handleFiles(e) {
            const liStyle = {
                listStyleType: 'none'
            }
            const closeStyle = {
                left: '0px', top:'0px', backgroundColor:'red'
            }
                this.picker = e['target'];
                this.filesArray= this.filesArray.concat(Array.from(this.picker.files));

                const dt1 = new DataTransfer();
                this.filesArray.forEach((file) => {
                    dt1.items.add(file)
                })
                 this.picker.files = dt1.files;
                 let files_ = this.picker.files;
                 // console.log(    files_);

            if (! files_.length) {
                this.setState( files_,  <p>No files selected!</p>);
            } else {
                   this.li = [];
                    for (let i = 0; i < files_.length; i++) {
                        let img = <img src={window.URL.createObjectURL( files_[i])} height={60} alt={ files_[i].name}/>
                         this.li.push(<li style={liStyle} key={this.count} id={this.count.toString()}  className={'ms-2 position-relative'}>
                                     {<button type="button" style={closeStyle} onClick={this.deleteFile.bind(this)} className="btn-close position-absolute rounded-circle" aria-label="Close"/>}
                                     {img}
                                 </li>)
                        this.count++;
                    }

                    this.ul = <ul className={'d-flex '}>{this.li}</ul>
                    this.setState(() => { return { files: this.ul };});
            }
    }

    render(){
        // this.picker = <input type={"file"} multiple accept={"image/*"} className="form-control-file" id="exampleFormControlFile1" onChange={this.handleFiles.bind(this)}/>

        const d_none = {
            display:'none'
        };
        return (
            <div className={'mt-5'}>
                <label htmlFor="" className="title ">{this.props.uploadLabel} {this.props.span}</label>
                <hr className={'mt-0'}/>

                <input type={"file"} multiple aria-label="file example" required={true} name={this.props.name} className="form-control" id="exampleFormControlFile1" onChange={this.handleFiles.bind(this)}/>
                <div className="invalid-feedback">Загрузите файлы</div>
                <div id={"fileList"}>
                    {this.state.files}
                </div>
            </div>
        );
    }
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
