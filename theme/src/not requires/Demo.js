import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import './Demo.css'

const Demo = ({name}) => {
    return <div className="mindiv_style">
        <h1> Hello {name}</h1>
        <p> Welcome in Gaming Zone</p>
    </div> 
}

// class Demo extends Component{
//     render(){
//         return <div className="mindiv_style">
//             <h1> Hello {props.name}</h1>
//             <p> Welcome in Gaming Zone</p>
//         </div> 
//     }
// }
export default Demo;