import React, { useState } from 'react';
import '../styles/Dashboard.scss';


const Dashboard = ( ) => {
    const [menu,setMenu,active,setActive] = useState(false);
    const top = () => { return 'top';}
    const left = () =>{return 'left';}
    const right = () =>{return 'right';}
    const bottom = () =>{return 'bottom';}

    return(
        <div className='dashboard'>

        </div>
    )
    //       top, left, right, bottom,
    // ;
}

export default Dashboard;

