import React, { useState } from "react";
import clsx from "clsx";
import { Box, Grid, makeStyles, withStyles, Typography, Switch, FormGroup, FormControlLabel, FormHelperText, FormLabel, LinearProgress, MenuItem, Select, FormControl, Button, InputLabel } from "@material-ui/core";
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
        color: "#fff",
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
    const [weapon, setWeapon] = useState("");
    const [state, setState] = useState({
        gilad: true,
        jason: false,
        antoine: true,
    });

    const animate = () => {
        // Button begins to shake
        setShake(true);

        // Buttons tops to shake after 2 seconds
        setTimeout(() => setShake(false), 5000);
    };

    const handleChange = (event) => {
        setWeapon(event.target.value);
    };

    const handleChangeSwitch = (event) => {
        setState({ ...state, [event.target.name]: event.target.checked });
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
                        <Box border={1} width="25%">
                            <FormControl variant="filled" className={classes.formControl}>
                                <InputLabel id="demo-simple-select-filled-label">Weapon</InputLabel>
                                <Select labelId="demo-simple-select-filled-label" id="demo-simple-select-filled" value={weapon} onChange={handleChange} className={classes.select} displayEmpty={true} fullWidth={true}>
                                    <MenuItem value={1} className={classes.select}>
                                        fists
                                    </MenuItem>
                                    <MenuItem value={10}>Primary</MenuItem>
                                    <MenuItem value={20}>Secondary</MenuItem>
                                    <MenuItem value={30}>Melee</MenuItem>
                                    <MenuItem value={30}>Armor</MenuItem>
                                </Select>
                            </FormControl>
                            <Button variant="contained" color="primary" onClick={animate} fullWidth={true}>
                                Hit Him
                            </Button>
                        </Box>
                        <Box border={1} width="45%" padding={3}>
                            <FormControl component="fieldset">
                                <FormLabel component="legend">Assign responsibility</FormLabel>
                                <FormGroup>
                                    <FormControlLabel control={<Switch checked={state.gilad} onChange={handleChangeSwitch} name="gilad" />} label="Gilad Gray" />
                                    <FormControlLabel control={<Switch checked={state.jason} onChange={handleChangeSwitch} name="jason" />} label="Jason Killian" />
                                    <FormControlLabel control={<Switch checked={state.antoine} onChange={handleChangeSwitch} name="antoine" />} label="Antoine Llorca" />
                                </FormGroup>
                                <FormHelperText>Be careful</FormHelperText>
                            </FormControl>
                        </Box>
                        <Box border={1} width="30%">Chat box goes here Chat box goes hereChat box goes hereChat box goes hereChat box goes hereChat box goes here </Box>
                    </Box>
                </Grid>
            </Box>
        </>
    );
};

export default Attack;
