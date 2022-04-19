export class ValidateAndSubmitButton extends React.Component{

    constructor(props) {
        super(props);
    }
    body = document.getElementsByTagName('body')[0];
    state ={
        hide:true,
        bodyStyle:{
            height:'50px',
            overflowY:'',
            paddingRight:'15px'
        },
        scroll:document.getElementById('scroll')

    }

    hundleOnClick(elem){

        let allInputs  = document.getElementsByTagName('input')
        let allspan  = Array.from(document.getElementsByTagName('span'));
        // console.log(allInputs);
        // console.log(allspan);
                if (document.readyState === "complete") {
                    for (let i = 1; i < allInputs.length; i++) {
                        // console.log(allInputs[i].name+" -> "+allInputs[i].value);
                        if((allInputs[i].validity.valid === false || allInputs[i].value === '' || allInputs[i].value === "on" || allInputs[i].value === "notname") && (allInputs[i].id !=='checkBoxReasonsForChoosingMBA_other')){
                            // console.log( allInputs[i].name + ' not allow '+ allInputs[i].id);
                            this.setState({hide:false});
                            this.setState({scroll:document.querySelector('#scroll')})
                            let spanElement = null;
                            console.log(allInputs[i].width+":"+allInputs[i].height);
                            console.log(allInputs[i]);

                            for (let j = 0; j < allspan.length ; j++) {
                                if(allspan[j].id.trim() === allInputs[i].name.trim()){
                                    console.log(allspan[j].id +':'+ allInputs[i].name);
                                    spanElement =  allspan[j];
                                }else if(allInputs[i].name.substring(0, allInputs[i].name.length-2)  === allspan[j].id.trim()) {
                                    console.log(allspan[j].id +':'+ allInputs[i].name);
                                    spanElement =  allspan[j];
                                }
                            }

                            let tabElement = document.getElementById('1-tab');
                            if(spanElement){
                                // console.log(spanElement.id +' = ' + allInputs[i].name);
                                    for (let j = 0; j < this.props.allName.length; j++) {
                                        if(this.props.allName[j].includes(spanElement.id) ) {
                                            tabElement = document.getElementById((j+1)+'-tab');
                                            break;
                                        }
                                        if(Array.isArray(this.props.allName[j])){
                                            for (let k = 0; k < this.props.allName[j].length; k++) {
                                                if(this.props.allName[j][k].includes(spanElement.id) ) {
                                                    tabElement = document.getElementById((j+1)+'-tab');
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                    function f() {
                                        return new Promise(resolve => setTimeout(() => {
                                            spanElement.scrollIntoView({
                                                block: "center",
                                                behavior: "smooth"
                                            });
                                            allInputs[i].focus();
                                            resolve(1)
                                        }, 300))
                                    }

                                    async function b() {
                                        let tab = new bootstrap.Tab(tabElement);
                                        tab.show();
                                        await f().then(b => {});
                                    }

                                    b().then(r => {})
                            }else {
                                if(i < allInputs.length)
                                    continue;
                                else {
                                    document.getElementById('basic-form').submit();
                                    console.log(allInputs[i].name);
                                }
                            }
                            break;
                        }else{

                            // console.log(allInputs[i].name);
                            // console.log(allInputs[i].value);
                        }
                    }
                }
    }

    offPlane(elem){

        this.setState({hide:true});
        this.setState({bodyStyle:{overflowY:''}});
        this.body.style.clear;
        // elem['target'].parentElement.parentElement.parentElement.parentElement.hidden = this.state.hide;
    }

    render() {
        this.body.style.overflowY = this.state.bodyStyle.overflowY;
        let styleAbs = {
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

        const divStyle1 = {
            border:'none'
        };
        const divStyle2 = {
            marginTop: '20px'
        };
        const divStyle3 = {
            padding: '0'
        };

        // if(!this.state.hide){
        //     return <div className={'position-absolute vh-100 w-100'} style={styleAbs } hidden={this.state.hide} >
        //         <div className={'col-lg-5 position-relative '} style={stPlane}>
        //             <div className={'p-5'}>
        //                 <div className={'py-5'}>
        //                     <p style={p}>{this.props.title}</p>
        //                 </div>
        //
        //                 <div className={'d-flex justify-content-center p-1'}>
        //                     <button onClick={this.offPlane.bind(this)} className={'btn btn-success'}>Ok</button>
        //                 </div>
        //             </div>
        //
        //         </div>
        //     </div>
        // }else{
            return <div  className="d-flex justify-content-end" style={divStyle2}>
                    <div className="" style={divStyle3}>
                        <button style={divStyle1} type={"submit"}  onClick={this.hundleOnClick.bind(this)} className={"submit"}>Отправить</button>
                    </div>
            </div>
        // }


    }




}
