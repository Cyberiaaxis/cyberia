import React, { userState, useEffect } from "react";
import { makeStyles } from "@material-ui/core/styles";
import Paper from "@material-ui/core/Paper";
import Grid from "@material-ui/core/Grid";
import Box from "@material-ui/core/Box";
import Divider from "@material-ui/core/Divider";
import TextField from "@material-ui/core/TextField";
import Typography from "@material-ui/core/Typography";
import List from "@material-ui/core/List";
import ListItem from "@material-ui/core/ListItem";
import ListItemIcon from "@material-ui/core/ListItemIcon";
import ListItemText from "@material-ui/core/ListItemText";
import Avatar from "@material-ui/core/Avatar";
import Fab from "@material-ui/core/Fab";
import SendIcon from "@material-ui/icons/Send";
import { useForm } from "react-hook-form";
import { useState } from "react";
import { io } from "socket.io-client";

const socket = io.connect("http://localhost:3000");

const useStyles = makeStyles((theme) => ({
    chatSection: {
        width: "100%",
        height: "150px",
        overflowY: "auto",
    },
    headBG: {
        backgroundColor: "#e0e0e0",
    },
    borderRight500: {
        borderRight: "1px solid #e0e0e0",
    },
    messageArea: {
        overflowY: "auto",
    },
    avatar: {
        marginLeft: "5px",
    },
    small: {
        width: theme.spacing(3),
        height: theme.spacing(3),
    },
    large: {
        width: theme.spacing(7),
        height: theme.spacing(7),
    },
    listItem: {
        padding: 0,
    },
}));

const Chat = () => {
    const classes = useStyles();

    const { register, handleSubmit, errors, clearErrors } = useForm();
    const [state, setState] = useState({ name: "", message: "" });
    const [chat, setChat] = useState([]);
    // console.log(state);
    useEffect(() => {
        socket.on("message", ({ name, message }) => {
            setChat([...chat, { name, message }]);
        });
    });

    // const onTextChange = (e) => {
    //     console.log(e);
    //     setState({ ...state, [e.traget.name]: e.target.value });
    // };

    const onSubmit = (e) => {
        e.preventDefault();
        console.log(state);
        const [name, message] = state;
        socket.emit("message", { name, message });
        setState({ message: "", name });
    };

    const Comment = () => {
        return chat.map(({ name, message }, index) => (
            <ListItem key={index} className={classes.listItem}>
                <Grid container alignItems="center">
                    <Grid item xs={8}>
                        <ListItemText align="right" secondary={name} primary={message} />
                    </Grid>
                    <Grid item xs={1} className={classes.avatar}>
                        <Avatar alt="Alice" src="https://material-ui.com/static/images/avatar/3.jpg" className={classes.small} />
                    </Grid>
                    <Grid item xs={1} className={classes.avatar}>
                        <ListItemText secondary="09:30"></ListItemText>
                    </Grid>
                </Grid>
            </ListItem>
        ));
    };

    return (
        <div>
            <Grid container component={Paper} className={classes.chatSection}>
                <Grid item xs={12}>
                    <List className={classes.messageArea} id="comments">
                        <Comment />
                    </List>
                    <Divider />
                    <form className="form-inline" method="post" onSubmit={onSubmit}>
                        <Grid container style={{ padding: "20px" }}>
                            <Grid item xs={10}>
                                <TextField name="chatText"  id="outlined-basic-email" label="Type Something" inputRef={register({ required: true })} />
                            </Grid>
                            <Grid item xs={2}>
                                <Fab color="primary" aria-label="add" type="submit">
                                    <SendIcon />
                                </Fab>
                            </Grid>
                        </Grid>
                    </form>
                </Grid>
            </Grid>
        </div>
    );
};

export default Chat;
