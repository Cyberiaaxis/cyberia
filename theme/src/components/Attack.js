import React, { useState } from "react";
import clsx from "clsx";
import { Box, Grid, makeStyles, withStyles, Typography, LinearProgress, MenuItem, Select, FormControl, FormHelperText, InputLabel } from "@material-ui/core";
import ProgressBar from "./ProgressBar";

const useStyles = makeStyles({
    root: {
        color: "#fff",
        height: "100vh",
        width: "100%",
        backgroundSize: "cover",
        backgroundImage: `url("https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg")`,
        fontFamily: ["Alegreya SC", "serif"].join(","),
    },

    "@keyframes shake": {
        "0%": { transform: "translate(1px, 1px) rotate(0deg)" },
        "10%": { transform: "translate(-1px, -2px) rotate(-1deg)" },
        "20%": { transform: "translate(-3px, 0px) rotate(1deg)" },
        "30%": { transform: "translate(3px, 2px) rotate(0deg)" },
        // '40%': { transform: 'translate(1px, -1px) rotate(1deg)' },
        // '50%': { transform: 'translate(-1px, 2px) rotate(-1deg)' },
        // '60%': { transform: 'translate(-3px, 1px) rotate(0deg)' },
        // '70%': { transform: 'translate(3px, 1px) rotate(-1deg)' },
        // '80%': { transform: 'translate(-1px, -1px) rotate(1deg)' },
        // '90%': { transform: 'translate(1px, 2px) rotate(0deg)' },
        // '100%': { transform: 'translate(1px, -2px) rotate(-1deg)' }
    },
    fire: {
        animation: "$shake 5s",
    },
    topbar: {
        flexGrow: 1,
    },

    select: {
        color: '#fff'
    },
});

const BorderLinearProgress = withStyles((theme) => ({
    root: {
        height: 10,
        borderRadius: 5,
    },
    colorPrimary: {
        backgroundColor: theme.palette.grey[theme.palette.type === "light" ? 200 : 700],
    },
    bar: {
        borderRadius: 5,
        backgroundColor: "#1a90ff",
    },
}))(LinearProgress);

const Attack = () => {
    const classes = useStyles();
    const [shake, setShake] = useState(false);
    const [age, setAge] = useState("");

    const animate = () => {
        // Button begins to shake
        setShake(true);

        // Buttons tops to shake after 2 seconds
        setTimeout(() => setShake(false), 5000);
    };

    const handleChange = (event) => {
        setAge(event.target.value);
    };

    return (
        <>
            <Box className={clsx(classes.root, shake && classes.fire)}>
                <Grid container alignItems="center">
                    <Grid item xs sm>
                        <Box margin={2}>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={35}>
                                    <Typography variant="body2">HP</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <ProgressBar variant="determinate" value={50} type="lg" />
                                </Box>
                            </Box>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={35}>
                                    <Typography variant="body2">HP</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <ProgressBar variant="determinate" value={100} type="lg" />
                                </Box>
                            </Box>
                        </Box>
                    </Grid>
                    <Grid item xs>
                        Baka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka
                        baka baka
                    </Grid>
                    <Grid item xs sm>
                        <Box display="flex" alignItems="center">
                            <Box minWidth={35}>
                                <Typography variant="body2">HP</Typography>
                            </Box>
                            <Box width="100%" mr={1}>
                                <ProgressBar variant="determinate" value={50} type="lg" />
                            </Box>
                        </Box>
                    </Grid>
                </Grid>

                <Grid item xs>
                    <Box display="flex">
<Box>esrdtf</Box>
                        <Box>
                            <FormControl variant="filled" className={classes.formControl}>
                                <InputLabel id="demo-simple-select-filled-label">Age</InputLabel>
                                <Select
                                    labelId="demo-simple-select-filled-label"
                                    id="demo-simple-select-filled"
                                    value={age}
                                    onChange={handleChange}
                                    className={classes.select}
                                    displayEmpty={true}
                                >
                                    <MenuItem value={11} className={classes.select}>
                                        <em>fists</em>
                                    </MenuItem>
                                    <MenuItem value={10}>Primary</MenuItem>
                                    <MenuItem value={20}>Secondary</MenuItem>
                                    <MenuItem value={30}>Melee</MenuItem>
                                    <MenuItem value={30}>Armor</MenuItem>
                                </Select>
                            </FormControl>

                            <button onClick={animate}>Click me</button>
                        </Box>
                        <Box></Box>
                        <Box>lol</Box>
                    </Box>
                </Grid>
            </Box>
        </>
    );
};

export default Attack;
