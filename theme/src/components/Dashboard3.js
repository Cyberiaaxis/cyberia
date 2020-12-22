import React, { useState, useEffect, useRef } from "react";
import { Card, CardMedia, CardContent, Link, MenuItem, makeStyles, withStyles, Paper, Box, Button, Grid, MenuList, Badge, Avatar, Popover } from "@material-ui/core";
import ProgressBar from "./ProgressBar";
import mafia from '../images/mafia.jpg';
import '../styles/Dash.css';

const useStyles = makeStyles((theme) => ({
    media: {
        height: 0,
        paddingTop: '56.25%', // 16:9
    },
    card: {
        position: 'relative',
        width: 200,
    },
    overlay: {
        position: 'absolute',
        top: 0,
        left: '20px',
        color: 'white',
    },

    btnStart: {
        background: 'linear-gradient(to left,#E4EE0D,#FC9500)',
        fontSize: '1.5rem',
    },

    root: {
        display: 'flex',
        minHeight: '100vh',
        flexDirection: 'column',
        backgroundImage: `url(${mafia})`,
        backgroundSize: 'cover',
    },

    body: {
        display: 'flex',
        flex: 1,
    },

    content: {
        flex: 1,
    },

    header: {
        display: 'flex',
    },
    footer: {
        display: 'flex',
    },
    asideLeft: {
        /* 12em is the width of the columns */
        flex: '0 0 2em',
    },
    asideRight: {
        /* 12em is the width of the columns */
        background: 'indigo',
        flex: '0 0 1em',
    },
}));

const StyledBadge = withStyles((theme) => ({
    badge: {
        backgroundColor: "#44b700",
        color: "#44b700",
        boxShadow: `0 0 0 2px ${theme.palette.background.paper}`,
        "&::after": {
            position: "absolute",
            top: 0,
            left: 0,
            width: "100%",
            height: "100%",
            borderRadius: "50%",
            animation: "$ripple 1.2s infinite ease-in-out",
            border: "1px solid currentColor",
            content: '""',
        },
    },
    "@keyframes ripple": {
        "0%": {
            transform: "scale(.8)",
            opacity: 1,
        },
        "100%": {
            transform: "scale(2.4)",
            opacity: 0,
        },
    },
}))(Badge);

export default function Dashboard() {
    const classes = useStyles();
    const [section, setSection] = useState("home");

    return (
        <div className={classes.root}>
            <Box className={classes.header}>
                <header></header>
            </Box>
            <Box className={classes.body}>
                <Box className={classes.asideLeft}>
                    <div className="location">
                        <div className="bg">
                            <img src={mafia} alt="Mafia" />
                        </div>
                        <div className="country">Asia</div>
                    </div>

                    <ul className="skew-menu">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a href="">Home</a>
                        </li>
                    </ul>
                </Box>
                <Box className={classes.content}>
                    <article>
ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguiossssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssqwesrdtfyguio
                    </article>
                </Box>
                <Box className={classes.asideRight}>
                    <ul className="menu ml-auto sidebar-column">
                        <li className="d-flex float-menu">
                            <a href="#">
                                <i className="fa fa-trophy" aria-hidden="true"></i>
                            </a>

                            <a href="#">
                                <i className="fa fa-bar-chart" aria-hidden="true"></i>
                            </a>

                            <a href="#">
                                <i className="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i className="fa fa-cog"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i className="fa fa-bar-chart" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i className="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i className="fa fa-cog"></i>
                            </a>
                        </li>
                    </ul>
                </Box>
            </Box>
            <Box className={classes.footer}>
                <ul className="menu main-menu">
                    <li>
                        <a href="#">
                            Crime
                </a>
                    </li>
                    <li>
                        <a href="#">
                            Inventory
                </a>
                    </li>
                    <li>
                        <a href="#">
                            Clan
                </a>
                    </li>
                    <li>
                        <a href="#">
                            Party
                </a>
                    </li>
                </ul>
                <ul className="menu ml-auto">
                    <li>
                        <a href="#">
                            <i className="fa fa-trophy" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i className="fa fa-bar-chart" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i className="fa fa-envelope" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i className="fa fa-cog"></i>
                        </a>
                    </li>
                </ul>
            </Box>
        </div>
    );
}
