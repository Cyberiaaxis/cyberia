import React, { Component, createRef, useEffect, useState } from "react";
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types';

export default function Modal(props) {

    const [show, setShow] = useState(false);

    console.log(props);

    const wrapperRef = createRef();

    const closeClick = (event) => {

        const elementTarget = event.target.dataset.ref;

        setShow({
            [elementTarget]: { show: false }
        });
    }

    useEffect(() => {
        document.addEventListener('click', handleClickOutside, true);
    }, []);

    const handleClickOutside = event => {

        //    event.preventDefault();

        if (!event.target.dataset.target && !event.target.dataset.toggle) return false;

        const elementTarget = event.target.dataset.target.substring(1);

        const domNode = document.getElementById(elementTarget);

        if (!domNode) {
            setShow({ [elementTarget]: { show: true } });

            return false;
        } else {
            setShow({ [elementTarget]: { show: true } });
        }

    }

    let showClass, elementTarget = show[props.id];

    if (show[props.id] != undefined) {
        elementTarget = show[props.id];
        showClass = elementTarget.show ? 'modal flipX open' : 'modal flipX';
    } else {
        showClass = 'modal flipX'
    }

    const renderClass = { id: props.id, className: showClass };


    return (
        <div {...renderClass} ref={wrapperRef}>
            <div className="modal-backdrop"></div>
            <div className="modal-content">
                <div className="modal-header">
                    {props.id}
                    <button className="close" onClick={closeClick} data-ref={props.id}>&times;</button>
                </div>
                <hr></hr>
                <div className="modal-body">
                    {props.body}
                </div>
                <div className="modal-footer"></div>
            </div>
        </div>
    );
}

Modal.propTypes = {
    id: PropTypes.element.isRequired,
    body: PropTypes.string.isRequired
};
