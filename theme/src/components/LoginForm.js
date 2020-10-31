import React from 'react';
import '../styles/LoginForm.scss';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faUser, faKey, faArrowAltCircleRight } from "@fortawesome/free-solid-svg-icons";
import { useForm } from 'react-hook-form';
import useFetchApi from './useFetchApi';
import Modal from "./Modal";
import { useHistory, Link } from 'react-router-dom';

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
            <p className='top'><Link to='/' data-toggle="modal" data-target='#forget' className="nav-link">Recover Account</Link></p>
            <form className="form-inline" method="post" onSubmit={handleSubmit(onSubmit)}>
                <div className="form-group">
                    <div className="input-group">
                        <span className="form-addon"><FontAwesomeIcon icon={faUser} color='#63102f' size="xs" /></span>
                        <input type="email" placeholder='Username' className='form-control' name='email' ref={register({ required: true })} />
                    </div>
                    {errors.email && <span>This field is required</span>}
                </div>
                <div className="form-group">
                    <div className='input-group'>
                        <span className="form-addon"><FontAwesomeIcon icon={faKey} color='#63102f' size="xs" /></span>
                        <input type="password" placeholder='Password' className='form-control' name='password' ref={register({ required: true, maxLength: 20 })} />
                    </div>
                    {errors.password && <span>This field is required</span>}
                </div>
                <div className="form-group">
                    <button type="submit" className="btn btn-primary" ><FontAwesomeIcon icon={faArrowAltCircleRight} color='red' size="xs" /></button>
                </div>
                        {JSON.stringify(error.errors) && error.errors.email && <span>{error.errors.email}</span>}
            </form>
            <p className='bottom'><Link to='/' data-toggle="modal" data-target='#registration' className="nav-link">Create Account</Link></p>
            {loading && JSON.stringify(result) }
        </div>
            <Modal body='Forget' id='forget'/>
                        <Modal body='Registration' id='registration'/>
    </>);
}
