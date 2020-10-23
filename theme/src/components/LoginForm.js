import React, { Component } from 'react';
import axios from 'axios';
import '../styles/LoginForm.scss';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faUser, faKey, faArrowAltCircleRight } from "@fortawesome/free-solid-svg-icons";


export default class LoginForm extends Component{
    constructor(props) {
        super();

        this.state = {
            user: '',
            isLoggedIn: false
         };

        this.handleSubmit = this.handleSubmit.bind(this);
    }


    handleSubmit(event) {
        event.preventDefault();
        const data = new FormData(event.target);
        const _this = this;

        axios.post('http://criminalimpulse.com/api/login', data)
            .then(function (response) {
                let user = response.data.user;
                let token = response.data.access_token;

                localStorage.setItem('access_token', token);

                _this.setState({
                    isLoggedIn: true,
                    user: user
                })

            })
            .catch(function (error) {
                console.log(error.response.data);
            });
    }

    render(){
        return (
            <div>
                <p className='top'>Recover Account</p>
                <form className="form-inline" method="post" onSubmit={this.handleSubmit}>
                    <div className="form-group">
                        <span className="form-addon"><FontAwesomeIcon icon={faUser} color='#63102f' size="xs" /></span>
                        <input type="email" placeholder='Username' className='form-control' name='email' />
                    </div>
                    <div className="form-group">
                        <span className="form-addon"><FontAwesomeIcon icon={faKey} color='#63102f' size="xs" /></span>
                        <input type="password" placeholder='Password' className='form-control' name='password' />
                    </div>
                    <button type="submit" className="btn btn-primary" ><FontAwesomeIcon icon={faArrowAltCircleRight} color='red' size="xs" /></button>
                </form>
                <p className='bottom'>Sign Up</p>
            </div>
        );
    }

}
