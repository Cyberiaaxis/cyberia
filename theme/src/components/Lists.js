import Axios from 'axios';
import React from 'react';
import Marquee from 'react-marquee-master';
import '../styles/Lists.scss';

export default function List() {

    Axios.get('http://criminalimpulse.com/api/topplayerlist')
        .then(function (response) {
            console.log(response);
            let listTopPlayer = response.data;
            console.log(this.lists(listTopPlayer, listTopPlayer));
        })
        .catch(function (error) {
            console.log(error);
        });


    const lists = (listTopPlayer, listTopPlayer) => {
        console.log(listTopPlayer);
        // const marqueeItems = ['One', 'Two', 'Three', 'One1', 'Two2', 'Three3'];
        // const marqueeItemsSecond = ['first', 'second', 'thrid', 'fourth', 'fifth', 'sixth'];

        return [
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

    return lists;
}

