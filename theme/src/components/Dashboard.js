import React, { useState } from 'react';
import '../styles/Dashboard.scss';


const Dashboard = () => {
    const [menu,setMenu,active,setActive] = useState(false);
    const top = () => ({ explore: 'explore', energyMax: '100', energy: '50', hitPoint: '100' });
    const left = () =>{return 'left';}
    const right = () =>{return 'right';}
    const bottom = () =>{return 'bottom';}
    const pages = {
        "home": "playerHome",
        "explore": "playerExplore",
        "city": "city",
        "market": "market",
        }
    const getPage = (page) => {
        return pages[page];
    }

    const handleClick = (event) => {
        event.preventDefault();
        // console.log(event.target.getAttribute('href'));
        let pageFinal = event.target.getAttribute('href');
       console.log(pageFinal.substring(1));
    }

    return(<>
            <div className="dashboard">
                <div className="grid">
                    <header>
                        <div>
                            <ul className='topMenu'>
                                <li className='menuList'>Start
                                    <ul className="dropdown-menu">
                                        <li><a href='#explore' onClick={handleClick}>Explore</a></li>

                                        <li onClick={handleClick}>Explore</li>
                                        <li onClick={handleClick}>Up Comings</li>
                                    </ul>
                                </li>
                                <li className='menuList'>List1
                                    <ul className="dropdown-menu">
                                       <li>SubList</li>
                                    </ul>
                                </li>
                                <li className='menuList'>List2
                                     <ul className="dropdown-menu">
                                       <li>SubList</li>
                                    </ul>
                                </li>
                                <li className='menuList'>List3
                                    <ul className="dropdown-menu">
                                       <li>SubList</li>
                                    </ul>
                                </li>
                                <li className='menuList'>List4
                                    <ul className="dropdown-menu">
                                       <li>SubList</li>
                                    </ul>
                                </li>
                                <li className='menuList'>List5
                                    <ul className="dropdown-menu">
                                       <li>
                                           SubList
                                       </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <aside className="sidebar-left">
                        <ul>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                            <li>Left Sidebar</li>
                        </ul>
                    </aside>
                    <aside className="sidebar-right">
                        <ul>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                            <li>Right Sidebar</li>
                        </ul>
                    </aside>
                    <footer>
                        <ul className='topMenu'>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>
                            <li className='menuList'>Bottom</li>

                        </ul>
                    </footer>
                </div>
            </div>
    </>)
}

export default Dashboard;

