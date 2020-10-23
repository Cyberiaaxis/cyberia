import React, { Component } from "react";
import Popup from './Popup';

import "../styles/Slider.scss";


class Slider extends Component {
    state = {
        imageIndex: 0
    };

    componentDidMount() {
        this.loop = setInterval(() => {
            this.setImageIndex();
        }, 9000);
    }

    componentWillUnmount() {
        clearInterval(this.loop);
    }

    setImageIndex = () => {
        let { imageIndex } = this.state;
        if (imageIndex === 6) {
            imageIndex = 0;
        } else {
            imageIndex += 1;
        }
        this.setState({ imageIndex });
    };

    render() {
        const { imageIndex } = this.state;
        const images = [
            "https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg",
            "https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978",
            "https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg",
            "https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978",
            "https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg",
            "https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg",
            "https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978",
            "https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg",
            "https://content.api.news/v3/images/bin/3dad2a36dcd4369995d2cc8ef1d42978",
            "https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg"
        ];
        const imageList = images;

        return (
            <div className="app" id={imageIndex}>
                <Popup />
                <img src={imageList[imageIndex]} className="w-100 h-100" alt={imageIndex} />
            </div>
        );
    }
}

export default Slider;