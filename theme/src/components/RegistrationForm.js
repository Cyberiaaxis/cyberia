import React from 'react';
import '../styles/RegistrationForm.scss';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faUser, faKey, faArrowAltCircleRight } from "@fortawesome/free-solid-svg-icons";
import { useForm } from 'react-hook-form';
import useFetchApi from './useFetchApi';
import { useHistory } from 'react-router-dom';


import {  } from 'react-router-dom';
export default function LoginForm() {
    const { register, errors, handleSubmit, clearErrors } = useForm();
    const url = 'http://criminalimpulse.com/api/login';
    const { error, result , api, loading} = useFetchApi();
    const history = useHistory();

    const onSubmit = (res) => {
         api(url,{method: 'post',data: res});

         if(!error){
            return history.push('/player-dashboard');
         }

         console.log(res);
    };

    return (<>
    <div>
        <label>lol</label>
        <input/>
    </div>
        <div>
        <label>lol</label>
        <input/>
    </div>
        <div>
        <label>lol</label>
        <input/>
    </div>
        <div>
        <label>lol</label>
        <input/>
    </div>
    </>);
}
