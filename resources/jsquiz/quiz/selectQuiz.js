let questions = null;
if(typeof question !== 'undefined'){
    questions = JSON.parse(  JSON.stringify(question));
}

import {CheckBox, RadioB, RequiredSpan} from "./components";

export class SelectQuiz extends React.Component{
    title = ['Тест по профилю «Менеджмент»','Тест на определение готовности к обучению','Тест на знание иностранного языка/ Английский язык']
    constructor(props) {
        super(props);
        this.handleClick = this.handleClick.bind(this);
    }
    state = {
        quizSel:'-1'
    }

    handleClick(id){
        console.log(id);
        this.setState({quizSel:id});
    }


    render() {
         let typeTest = '';
        let radio = [];
        switch (this.state.quizSel){
            case '-1':{
                let quiz_Type = [];
                for (let i = 0; i < this.title.length; i++) {
                    quiz_Type.push(<QuizType key={i} title={this.title[i]}  onClick={this.handleClick} id={i+1}/>);
                }

                return <div>
                            <div className="col-lg-12 text-center mb-2">
                                <h3>Тесты</h3>
                            </div>
                            <div className={'d-flex justify-content-center'}>
                                {quiz_Type}
                            </div>
                        </div>
            }
            case '1':{

                var result = Object.keys(questions).map((key) => [Number(key), questions[key]]);

                    let i = 0;
                    for (const key1 of Object.values(result[0])) {
                        for (const [key,valio] of Object.entries(key1)) {
                            if(key.length === 1)  typeTest = key

                            console.log(key)
                            console.log(valio)
                            // radio.push(<div className={'col-lg-10'}>{key}</div>);
                            let title = []
                            for (let j = 0; j < valio.length; j++) {
                                console.log(valio[j])
                                title.push(valio[j])
                            }
                            if(i < 30){
                                radio.push(<div className={'my-3'}    key={i}>
                                            <RadioB
                                                classN={'col-lg-12'} name={i+'_[]'} column={1}
                                                count={title.length} title={key}
                                                checkBoxTitle={title} key={i}
                                                identifier={i}
                                                span={<RequiredSpan id={key}/>}/>
                                        </div>);
                            }else{
                                radio.push(<div className={'my-3'}    key={i}>
                                               <CheckBox
                                                   identifier ={i}
                                                   name = {i+"_"}
                                                   column={1}
                                                   count={title.length}
                                                   title={key}
                                                   checkBoxTitle={title}
                                                 />
                                            </div>);
                            }
                            i++;
                        }
                    }
            }
            case '2':{
                break;
            }
            case '3':{
                break;
            }

        }

        return <div className={'row'}>
                    <BackToSelect  onClick={this.handleClick} />
                    <form action={testRoutes} method={'GET'}>
                        {radio}
                        <input type="text" hidden={true} defaultValue={typeTest}/>
                        <div className={'col-lg-4 my-5'}>
                            <button className={'btn btn-success'} type={'submit'} >Отправить</button>
                        </div>
                    </form>
                </div>
    }
}



function BackToSelect(props) {
    function click(e) {
        props.onClick('-1');
    }
    return <div>
                <button  className={'btn btn-success'} onClick={click.bind(this)}>назад</button>
            </div>
}

 function QuizType(props) {
    let style = {
        padding:'3px 10px'
    }

    let divStyle = {
        border:'grey solid 1px'
    }

    let fontSize15 ={
        fontSize:'15pt',
        height:'150px'
    }
      function click(e) {
          props.onClick(e.target.id)
      }

     return <div className="col-lg-3 mx-2" style={divStyle}>
                <div className=" d-flex justify-content-center text-center">
                    <div className={'col-lg-10  my-5 px-3'}>
                        <div style={fontSize15}>
                            <p>{props.title}<br/><br/></p>
                        </div>
                        <div>
                            <button id={props.id} className={'btn btn-success'} onClick={click.bind(this)}>Открыть</button>
                        </div>
                    </div>
                </div>
            </div>
}