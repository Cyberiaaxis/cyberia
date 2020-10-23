import React, { Component } from 'react';
import './Avatar.css';
import 'tachyons';
import Avatarlist from './Avatarlist';


class Avatar extends Component{

    constructor(){
        super();
        this.state = {
            name: 'Welcome in Developers World'
        }
    }

    nameChange(){
        this.setState({
            name: 'Developers World is awesome'
        })
    }

    render(){
        const Avatarlistarray = [
            {
                id: 1,
                name: 'Nitin Sharma',
                work: "Design Developer"
            },
            {
                id: 2,
                name: 'Amit',
                work: "Frontend Developer"
            },
            {
                id: 3,
                name: 'Laxman',
                work: "Backend Developer"
            },
            {
                id: 4,
                name: 'Abhishek',
                work: "Content Developer"
            }

        ]

        const arrayavatarcard = Avatarlistarray.map((avatarcard, i) => {
            return <Avatarlist key={i} id={Avatarlistarray[i].id} name={Avatarlistarray[i].name} work={Avatarlistarray[i].work} />
        });
        
        return (
            <div className="mainPage">
                <h1> {this.state.name} </h1>
                {arrayavatarcard}<br></br>
                <button onClick = {()=> this.nameChange()}> Subcribe </button>
            </div>
        )
    }

}

export default Avatar;