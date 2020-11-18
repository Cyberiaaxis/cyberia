import React, { useState } from "react";
import '../styles/Dashboard.scss';

const pages = [
    {
        "url": "home",
        "name": "playerHome"
    },
    {
        "name": "playerExplore",
        "url": "explore"
    },
    {
        "name": "citye",
        "url": "city"
    },
    {
        "name": "market",
        "url": "market"
    }
];


const Header = ({ section, setSection }) => {

    function handleClick(e) {
        e.preventDefault();
        setSection(e.target.dataset.href)
    }

    return (
        <header>
            <nav className="navbar">
                {
                    pages.map(function (value, key) {
                        return <a className={section === value.url ? 'nav-link active' : 'nav-link'} onClick={handleClick} href="#" data-href={value.url}>{value.name}</a>
                    })
                }
            </nav>
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
                    pages.map(function (value, key) {
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
                    pages.map(function (value, key) {
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
                    pages.map(function (value, key) {
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
                <AsideLeft {...{ section, setSection }} />
                <Main section={section} />
                <AsideRight {...{ section, setSection }} />
                <Footer {...{ section, setSection }} />
            </div>
        </div>
    );
}
