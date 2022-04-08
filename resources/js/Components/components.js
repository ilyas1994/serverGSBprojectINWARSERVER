
export function RequiredSpan() {
return <span className={'required'}>*</span>;
}

export function TextArea(title, name, className = 'col-lg-4', value = null, span = null){
        let input = '';
        input = <div key={name} className={className}>
                    <div className={'position-relative'}>
                        <label className={'form-label'} htmlFor="">{title} {span}</label>
                        <textarea type="text" name={name} required={false} className={'form-control '} defaultValue={value} maxLength={32}/>
                        <div className="invalid-feedback">
                            Заполните {title}
                        </div>
                    </div>
                </div>

    return(input)
}

export function inputField(title, name, className = null, value = null, placeholder = '', span = null){
    let input = '';
    let req =  span !== null
    let reqClass =  span !== null ? 'form-control ' : ''
        input = <div key={name} className={className}>
                 <div className={'position-relative'}>
                    <label className={''} htmlFor="">{title}{span}</label>
                    <input type="text" name={name} required={req} placeholder={placeholder} className={'user-surname '+reqClass} defaultValue={value} maxLength={32}/>
                        <div className="invalid-tooltip">
                            Заполните обязательное поле {title}
                        </div>
                    </div>


                </div>
    return(input)
}
export function dataPiker(title, name, className = 'col-lg-4',span = null) {
    return(
                <div key={name} className={className}>
                    <label htmlFor={""}>{title}{span}</label>
                    <input type="date" name={name} className={"user-dateofbirth"}/>
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
    //
    // console.log(section +' '+ section.length)
    for (let i = 0; i < section.length; i++) {
         sec[i] =  <option  value={i+1} key={i}>{section[i]}</option>;
    }
    return  <div key={name} className={className}>
                    {title !== '' ? <label htmlFor="" >{title}{span}</label> : ""}
                    <select name={name}  className={"col-lg-0 selectpicker user-gender"}>
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
                <input className={'form-check-input p-0'} value={props.title}  type="checkbox"  style={divStyle} name={props.name+'[]'} onChange={props.it.handleClick.bind(this)} id={props.id}  />
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
            option1: false,
            option2: false,
            option3: false,
        }
    }

    handleClick(i){
        // console.log(i['target'].id);
    }
     click(it){
         // console.log(it['target'].parentElement.children[0]);
        it['target'].parentElement.children[0].checked = true;
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
                                            metka = {<input type="text"  placeholder="Другие" name={this.props.name+'[]'}  htmlFor={this.props.checkBoxTitle[i] + '_' + i}
                                                     className="mbareasons_another_input col-8 ms-1" onClick={this.click.bind(this)} maxLength="64"/>}
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

        return  all
    }

    render(){
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
                <input  className="form-check-input p-0" required={false} type="radio" value={props.title} style={divStyle} name={props.name} onChange={props.it.handleClick.bind(this)} id={props.id}  />
                <label  className="form-check-label col-lg-11 ms-1" htmlFor={props.id} >{props.title}</label>
                {props.popUpElement}
                 <div className="invalid-feedback">More example invalid feedback text</div>
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


export function Star(props) {
    const divStyle = {
        marginLeft: '0px',
        width:'1em',
        height:'1em'
    };
    return <div className={'col-lg-12  row'}>
                <label  htmlFor="">{props.title}{props.span} </label>

                <div className="rating-area col-lg-6">
                    <input type="radio" id={props.id+"1"} name={props.name} value="10"/>
                    <label htmlFor={props.id+"1"} title="Оценка «1»"></label>

                    <input type="radio" id={props.id+"2"} name={props.name} value="9"/>
                    <label htmlFor={props.id+"2"} title="Оценка «2»"></label>

                    <input type="radio" id={props.id+"3"} name={props.name} value="8"/>
                    <label htmlFor={props.id+"3"} title="Оценка «3»"></label>

                    <input type="radio" id={props.id+"4"} name={props.name} value="7"/>
                    <label htmlFor={props.id+"4"} title="Оценка «4»"></label>

                    <input type="radio" id={props.id+"5"} name={props.name} value="6"/>
                    <label htmlFor={props.id+"5"} title="Оценка «5»"></label>

                    <input type="radio" id={props.id+"6"} name={props.name} value="5"/>
                    <label htmlFor={props.id+"6"} title="Оценка «6»"></label>

                    <input type="radio" id={props.id+"7"} name={props.name} value="4"/>
                    <label htmlFor={props.id+"7"} title="Оценка «7»"></label>

                    <input type="radio" id={props.id+"8"} name={props.name} value="3"/>
                    <label htmlFor={props.id+"8"} title="Оценка «8»"></label>

                    <input type="radio" id={props.id+"9"} name={props.name} value="2"/>
                    <label htmlFor={props.id+"9"} title="Оценка «9»"></label>

                    <input type="radio" id={props.id+"10"} name={props.name} value="1"/>
                    <label htmlFor={props.id+"10"} title="Оценка «10»"></label>

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
        console.log(i['target'].id);
    }

    howMany(){
        let all = [];
        let column = this.props.column;
        let start = 0;
        let end = Math.ceil(this.props.count/column);
        for (let j = 0; j < column; j++){
            let star = [];
            for (let i = start; i < end; i++) {
                star[i] = <Star name={this.props.name[i]} it={this} id={this.props.titleForStar[i]+'_'+i} title={this.props.titleForStar[i]} key={i} span={this.props.span}/>
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
                 console.log(    files_);

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
                <label htmlFor="" className="title ">{this.props.uploadLabel}</label>
                <hr className={'mt-0'}/>

                <input type={"file"} multiple aria-label="file example" required={false} name={this.props.name+'[]'} className="form-control" id="exampleFormControlFile1" onChange={this.handleFiles.bind(this)}/>
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
