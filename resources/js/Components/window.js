export class DocWindow extends React.Component{
    constructor(props) {
        super(props);
    }
     body = document.getElementsByTagName('body')[0];
     state ={
          hide:false,
          bodyStyle:{
                             height:'50px',
                        overflowY:'hidden',
                       paddingRight:'15px'
                    }
     }

     hundleOnClick(elem){
        this.setState({hide:true});
        this.setState({bodyStyle:{overflowY:''}});
         this.body.style.clear;
         // elem['target'].parentElement.parentElement.parentElement.parentElement.hidden = this.state.hide;
     }

    render() {
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        document.body.scrollTop = 0;
       this.body.style.overflowY = this.state.bodyStyle.overflowY;
       let styleAbs = {
            top:'50%',
            left:'50%',
            transform:'translate(-50%, -50%)',
            backgroundColor:'#424242a3',
        }
        let stPlane ={
            top:'50%',
            left:'50%',
            transform:'translate(-50%, -50%)',
            backgroundColor:'white'
        }
        let p ={
            marginBottom: '0px'
        }

        let h4 ={
            marginTop: '30px'
        }
        return <div className={'position-absolute vh-100 w-100'} style={styleAbs } hidden={this.state.hide} >
                    <div className={'col-lg-5 position-relative '} style={stPlane}>
                        <div className={'p-5'}>
                            <div className={'py-5'}>

                                <h4>Перед заполнением формы, приготовьте следующие скан документы: </h4>
                                <hr/>
                                <p style={p}>- Удостоверение личности</p>
                                <p style={p}>- Резюме</p>
                                <p style={p}>- 6 фото 3х4</p>
                                <p style={p}>- Диплома о высшем образовании</p>
                                <p style={p}>- Приложения к диплому о высшем образовании</p>
                                <p style={p}>- Справка с места работы с указанием должности</p>
                                <p style={p}>- Медицинская справка (форма 075У)</p>

                                <h4 style={h4}>Дополнительные документы для EXECUTIVE MBA: </h4>
                                <hr/>
                                <p style={p}>- Мотивационное эссе в word</p>
                                <p style={p}>- Копия паспорта</p>
                                <p style={p}>- 2 рекомендательных письма</p>

                            </div>
                            <div className={'d-flex justify-content-center p-1'}>
                                <button onClick={this.hundleOnClick.bind(this)} className={'btn btn-success'}>У меня есть скан всех документов</button>
                            </div>
                        </div>

                    </div>
                </div>

    }




}
