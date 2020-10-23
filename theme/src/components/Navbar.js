import React, { Component } from "react";
import { Link } from 'react-router-dom';
import logo from '../images/logo.svg';
// import logo from "../images/pulse.gif";
import '../styles/Navbar.scss'
import LoginForm from "./LoginForm";
import Modal from "./Modal";


class Navbar extends Component {

    render() {
        return (
            <div className="navbar bg-transparent fixed-top">
                <div className="logo"> <img src={logo} alt='logo' /> </div>

                <ul className="menu">
                    <li><Link to='/' data-toggle="modal" data-target='#home' className="nav-link">Home</Link></li>
                    <li><Link to='/' className="nav-link">Services</Link></li>
                    <li><Link to='/' className="nav-link">Products</Link></li>
                    <li><Link to='/' className="nav-link">Clients</Link></li>
                </ul>
                <LoginForm />
                <Modal body='LOL' id='home'/>
            </div>
        )
    }
}

export default Navbar;