import React, { Component } from "react";

import "../styles/Pop.scss";

export default class Popup extends Component {

    randomRange(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    render() {
        const events = {
            "event": [
                {
                    "event": "Robert attacked Schwartz and won the fight",
                },
                {
                    "event": "Rocky attacked Rockwood and Lost the fight",
                },
                {
                    "event": "Hackers team hacked all PC of police department",
                },
                {
                    "event": "Jacky attacked Renko and tie the fight",
                },
                {
                    "event": "Holf attacked BodyBagger and sattlement the fight",
                }
            ]
        }

        const _this = this;

        const listed = events.event.map(function (value, key) {
        const odd = {
                top: _this.randomRange(10, 40) + '%',
                 right: _this.randomRange(10, 40) + '%',
                 bottom: _this.randomRange(10, 40) + '%',
                 marginTop: 10+'rem',
             }
             const even = {
                 left: _this.randomRange(10, 30) + '%',
                 top: _this.randomRange(40, 6) + '%',
                 //    bottom: _this.randomRange(40, 100) + '%',

             }

            return <p className='popup' key={key} data-tooltip={value.event} style={(key % 2 === 0) ? even : odd} ></p>;
        });

        return [
            <div className='action'>
                {listed}
            </div>
        ];
    }


}
