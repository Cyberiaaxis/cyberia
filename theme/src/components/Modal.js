import React, { Component } from "react";
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types';

export default class Modal extends Component {
    constructor(props) {
        super(props);

        this.state = {
            show: false,
            [this.props.id]: false,
        };

        this.wrapperRef = React.createRef();

        this.closeClick = this.closeClick.bind(this);
    }

    closeClick(event) {

        const elementTarget = event.target.dataset.ref;

        this.setState({
            [elementTarget]: { show: false }
        });
    }
    componentDidMount() {
        document.addEventListener('click', this.handleClickOutside, true);
    }

    componentWillUnmount() {
        document.removeEventListener('click', this.handleClickOutside, true);
    }

    handleClickOutside = event => {

        if (!event.target.dataset.target && !event.target.dataset.toggle) return false;

        const elementTarget = event.target.dataset.target.substring(1);

        const domNode = document.getElementById(elementTarget);

        if (!domNode) {
            this.setState({ [elementTarget]: { show: false } });

            return false;
        } else {
            this.setState({ [elementTarget]: { show: true } });
        }

    }

    render() {

        const elementTarget = this.state[this.props.id];

        let show = elementTarget.show ? 'modal flipX open' : 'modal flipX';

        const renderClass = { id: this.props.id, className: show };

        return (
            <div {...renderClass} ref={this.wrapperRef}>
                <div className="modal-backdrop"></div>
                <div className="modal-content">
                    <div className="modal-header">
                        Hello World
                    <button className="close" onClick={this.closeClick} data-ref={this.props.id}>&times;</button>
                    </div>
                    <div className="modal-body">
                        {this.props.body}
                    </div>
                    <div className="modal-footer"></div>
                </div>
            </div>
        )
    }
}

Modal.propTypes = {
    id: PropTypes.element.isRequired,
    body: PropTypes.string.isRequired
};
