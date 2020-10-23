import React, { Component } from "react";
import PropTypes from 'prop-types';

class Modal extends Component {
    constructor(props) {
        super(props);
        this.state = { show: false };

        this.wrapperRef = React.createRef();

        this.closeClick = this.closeClick.bind(this);
    }

    closeClick() {
        this.setState({
            show: false
        });

        this.className = '';
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
            this.setState({
                show: false
            });

            return false;
        }
        this.setState({
            show: true
        });

    }

    render() {

        let show = (this.state.show) ? 'modal flipX open' : 'modal flipX';

        return (
            <div id={this.props.id} className={show} ref={this.wrapperRef}>
                <div className="modal-backdrop"></div>
                <div className="modal-content">
                    <div className="modal-header">
                        Hello World
                    <button className="close" onClick={this.closeClick}>&times;</button>
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

export default Modal;
