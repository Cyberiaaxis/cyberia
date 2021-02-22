import React, { useState, useEffect } from "react";
import { makeStyles } from "@material-ui/core/styles";
import io from "socket.io-client";
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

const socket = io("http://localhost:4000", {
    transports: ["websocket", "polling", "flashsocket"],
});
const useStyles = makeStyles((theme) => ({
    root: {
        display: "flex",
        flexWrap: "wrap",
        justifyContent: "space-around",
        overflow: "hidden",
        backgroundColor: theme.palette.background.paper,
    },
    gridList: {
        width: 500,
        height: 450,
    },
    icon: {
        color: "rgba(255, 255, 255, 0.54)",
    },
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
    const [state, setStaet] = useState({ message: "", name: "" });
    const [chat, setChat] = useState([]);
    const { register, errors, handleSubmit, clearErrors } = useForm();

    const onSubmit = (data, e) => {
        // console.log(e);
        e.preventDefault();
        e.target.reset();
        const { name, message } = data;
        socket.emit("message", data);
    };

    let search = window.location.search;
    let params = new URLSearchParams(search);
    let foo = params.has("player") ? params.get("player") : 1;
    socket.on("message", function (data) {
        const { name, message } = data;
        setChat([...chat, { name, message }]);
        // setStaet([...chat, { name, message }]);
    });

    const renderChat = () => {
        // console.log(chat);
        //    console.log(chat);

        const html = (name, message) => {
            if (name === "1") {
                // console.log(name);
                return (
                    <>
                        <Grid item xs={1} className={classes.avatar}>
                            <Avatar alt="Alice" src="https://material-ui.com/static/images/avatar/3.jpg" className={classes.small} />
                        </Grid>
                        <Grid item xs={1} className={classes.avatar}>
                            <ListItemText secondary="09:30"></ListItemText>
                        </Grid>
                        <Grid item xs={8}>
                            <ListItemText align="right" primary={message}></ListItemText>
                        </Grid>
                    </>
                );
            } else {
                // console.log(name);
                return (
                    <>
                        <Grid item xs={8}>
                            <ListItemText align="right" primary={message}></ListItemText>
                        </Grid>
                        <Grid item xs={1} className={classes.avatar}>
                            <Avatar alt="Alice" src="https://material-ui.com/static/images/avatar/3.jpg" className={classes.small} />
                        </Grid>
                        <Grid item xs={1} className={classes.avatar}>
                            <ListItemText secondary="09:30"></ListItemText>
                        </Grid>
                    </>
                );
            }
        };

        return chat.map(({ name, message }, index) => (
            <div>
                <ListItem key={index} className={classes.listItem}>
                    <Grid container alignItems="center">
                        {html(name, message)}
                    </Grid>
                </ListItem>
            </div>
        ));
    };

    return (
        <>
            <Box style={{ maxHeight: 120, overflow: "auto" }}>{renderChat()}</Box>
            <Divider />
            <Grid container>
                <form onSubmit={handleSubmit(onSubmit)}>
                    <Grid item>
                        <Box width={1}>
                            <TextField name="message" id="outlined-basic-email" label="Type Something" inputRef={register({ required: true })} />
                            <TextField type="hidden" name="name" width="5%" value={foo} inputRef={register({ required: true })} />
                            <Fab color="primary" aria-label="Talk" type="submit">
                                <SendIcon />
                            </Fab>
                        </Box>
                        {errors.message && errors.message.type === "required" && <span>This is required</span>}
                        {errors.message && errors.message.type === "maxLength" && <span>Max length exceeded</span>}
                    </Grid>
                </form>
            </Grid>
        </>
    );
};

export default Chat;
