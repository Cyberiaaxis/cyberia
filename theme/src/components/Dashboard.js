import React, { useState } from "react";
import '../styles/Dashboard.scss';

const topBar = [
    {
        "name": "Home",
        "url": "playerHome",
        "subMenu": [
        {
            "name": "Home1",
            "url": "playerHome",
                    "subMenu": null
        },
        {
            "name": "Home2",
            "url": "playerHome",
                    "subMenu": null
        },
        {
            "name": "Home3",
            "url": "playerHome",
                    "subMenu": null
        },
    ],
    },
    {
        "name": "Actions",
        "url": "playerActions",
        "subMenu": null
    },
    {
        "name": "Travel",
        "url": "PlayerTravel",
        "subMenu": null
    },
    {
        "name": "Communication",
        "url": "playerCommunication",
        "subMenu": null
    }
];

const bottomBar = [
    {
        "name": "Settings",
        "url": "playerSettings",
        "sub-menu": null
    },
    {
        "name": "Analyst",
        "url": "playerAnalyst",
                "sub-menu": null
    },
    {
        "name": "Achievement",
        "url": "playerAchievement",
                "sub-menu": null
    },
    {
        "name": "Competition",
        "url": "playerCompetition",
                "sub-menu": null
    }
];

const leftSideBar = [
    {
        "name": "Start",
        "url": "playerExplore",
                "sub-menu": null
    },
    {
        "name": "Inventory",
        "url": "PlayerInventory",
                "sub-menu": null
    },
    {
        "name": "Donator House",
        "url": "city",
                "sub-menu": null
    }
];

const RightSideBar = [
    {
        "name": "Competitions",
        "url": "competitions",
                "sub-menu": null
    },
    {
        "name": "Hall of Fame",
        "url": "hof",
                "sub-menu": null
    }
];


const Header = ({ section, setSection }) => {

    function handleClick(e) {
        e.preventDefault();
        setSection(e.target.dataset.href)
    }

    return (

        <header>
            <ul className="navbar">
                {
                    topBar.map((menuTitle, key) => {

                        let subMenuList = [];
                        if (menuTitle.subMenu) {
                            menuTitle.subMenu.map(subMenu => {
                                // console.log(subMenu.name);
                                subMenuList.push(<li><a className={section === subMenu.url ? 'menuList nav-link active' : 'menuList nav-link'} key={key} href="#" data-href={subMenu.url}>{subMenu.name}</a></li>);
                                // console.log(subMenuList);
                            })
                        }

                        return (
                            <li>
                                <a className={section === menuTitle.url ? 'menuList nav-link active' : 'menuList nav-link'} key={key} href="#" data-href={menuTitle.url}>{menuTitle.name}</a>
                                <ul className="dropdown-menu">{subMenuList}</ul>
                            </li>
                        )
                    })
                }
            </ul>
        </header>
    );
};

const Footer = ({ section, setSection }) => {

    function handleClick(e) {
        e.preventDefault();
        setSection(e.target.dataset.href)
    }

    return (
        <footer>
            <nav className="navbar">
                {
                    bottomBar.map(function (value, key) {
                        return <a className={section === value.url ? 'nav-link active' : 'nav-link'} onClick={handleClick} href="#" data-href={value.url}>{value.name}</a>
                    })
                }
            </nav>
        </footer>
    );
};

const AsideLeft = ({ section, setSection }) => {

    function handleClick(e) {
        e.preventDefault();
        setSection(e.target.dataset.href)
    }

    return (
        <aside>
            <nav className='sidebar-left'>
                {
                    leftSideBar.map(function (value, key) {
                        return <a className={section === value.url ? 'nav-link active' : 'nav-link'} onClick={handleClick} href="#" data-href={value.url}>{value.name}</a>
                    })
                }
            </nav>
        </aside>
    );
};


const AsideRight = ({ section, setSection }) => {

    function handleClick(e) {
        e.preventDefault();
        setSection(e.target.dataset.href)
    }

    return (
        <aside>
            <nav  className='sidebar-right'>
                {
                    RightSideBar.map(function (value, key) {
                        return <a className={section === value.url ? 'nav-link active' : 'nav-link'} onClick={handleClick} href="#" data-href={value.url}>{value.name}</a>
                    })
                }
            </nav>
        </aside>
    );
};

const Main = ({ section }) => {

    let page;

    switch (section) {
        case 'home':
            page = "Home";
            break;
        case 'explore':
            page = "Explore";
            break;
        case 'city':
            page = "city";
            break;
        case 'market':
            page = "Market";
            break;
        default:
            page = "Home";
            break;
    }

    return (
        <main>
            <h1>{page}</h1>
        </main>
    );
};

export default function Dashboard() {
    const [section, setSection] = useState("home");

    return (
        <div className="dashboard">
            <div className="grid">
                <Header {...{ section, setSection }} />
                {/* <AsideLeft {...{ section, setSection }} /> */}
                {/* <Main section={section} /> */}
                {/* <AsideRight {...{ section, setSection }} /> */}
                {/* <Footer {...{ section, setSection }} /> */}
            </div>
        </div>
    );
}
