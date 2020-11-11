import React, { useState } from 'react';
import '../styles/Dashboard.scss';


const Dashboard = () => {
    const [menu,setMenu,active,setActive] = useState(false);
    const top = () => { return 'top';}
    const left = () =>{return 'left';}
    const right = () =>{return 'right';}
    const bottom = () =>{return 'bottom';}

    return(<>
            <div className="dashboard">
                <div class="grid">
                    <header>
                        Top Menu Bar
                    </header>
                    <aside class="sidebar-left">
                        Left Sidebar
                    </aside>
                    <aside class="sidebar-right">
                        Right Sidebar
                    </aside>
                    <footer>
                        Bottom Menu Bar
                    </footer>
                </div>
            </div>
    </>)
}

export default Dashboard;

