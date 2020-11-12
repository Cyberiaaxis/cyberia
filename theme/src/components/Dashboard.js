import React, { useState } from 'react';
import '../styles/Dashboard.scss';


const Dashboard = () => {
    const [menu,setMenu,active,setActive] = useState(false);
    const top = () => ({ explore: 'explore', energyMax: '100', energy: '50', hitPoint: '100' });
    const left = () =>{return 'left';}
    const right = () =>{return 'right';}
    const bottom = () =>{return 'bottom';}



    return(<>
            <div className="dashboard">
                <div className="grid">
                    <header>
                        <div>
                            <ul className='topMenu'>
                                <li className='menuList'>Explore</li>
                                <li className='menuList'>Top Menu Bar</li>
                                <li className='menuList'>Top Menu Bar</li>
                                <li className='menuList'>Top Menu Bar</li>
                                <li className='menuList'>Top Menu Bar</li>
                                <li className='menuList'>Top Menu Bar</li>
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

