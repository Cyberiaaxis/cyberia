import React from 'react';
import axios from 'axios';
import Marquee from 'react-marquee-master';
import '../styles/Lists.scss';


const listData = (event) => {
    axios.get('http://criminalimpulse.com/api/topplayerlist')
        .then(function (response) {
            localStorage.setItem('access_token', token);
            return lists(listTopPlayer, listTopPlayer);
        })
        .catch(function (error) {
            console.log(error.response);
        });
}

const lists = (marqueeItems, marqueeItemsSecond) => {

    // const marqueeItems = ['One', 'Two', 'Three', 'One1', 'Two2', 'Three3'];
    // const marqueeItemsSecond = ['first', 'second', 'thrid', 'fourth', 'fifth', 'sixth'];

    return[
        <div height='300px' className='player-left'>
            <p className='listHeading'>Menu Heading</p>
            <Marquee minHeight='250' marqueeItems={marqueeItems} />
        </div>,
        <div height='300px' className='player-right'>
            <p className='listHeading'>Menu Heading</p>
            <Marquee minHeight='250' marqueeItems={marqueeItemsSecond} />
        </div>
    ];



}

export default Lists;

