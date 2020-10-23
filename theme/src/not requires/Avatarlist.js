import React, {Component} from 'react';

const Avatarlist = (props) => {
    return (
        <div className="avtarStyle ma4 bg-light-purple dib pa3 grow shadow-5 tc" >
            <img src={`https://joeschmoe.io/api/v1/${props.name}`} alt="" />
            <h1>{props.name}</h1>
            <p>{props.work}</p>
        </div>
    )
}
export default Avatarlist;