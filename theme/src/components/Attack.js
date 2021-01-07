import React, { useState } from "react";
import clsx from "clsx";
import { Box, Grid, makeStyles, withStyles, Typography, Switch, Slider, FormGroup, FormControlLabel, FormHelperText, FormLabel, LinearProgress, MenuItem, Select, FormControl, Button, InputLabel } from "@material-ui/core";
import ProgressBar from "./ProgressBar";

const useStyles = makeStyles({
    root: {
        color: "#fff",
        height: "100vh",
        width: "100%",
        opacity: '0.9',
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
    blood:{
        // backgroundColor: '#7f0000',
    },

});

const iOSBoxShadow = "0 3px 1px rgba(0,0,0,0.1),0 4px 8px rgba(0,0,0,0.13),0 0 0 1px rgba(0,0,0,0.02)";

const marks = [
    {
        value: 0,
    },
    {
        value: 20,
    },
    {
        value: 37,
    },
    {
        value: 100,
    },
];

const IOSSlider = withStyles({
    root: {
        color: "#3880ff",
        height: 2,
        padding: "15px 0",
    },
    thumb: {
        height: 28,
        width: 28,
        backgroundColor: "#fff",
        boxShadow: iOSBoxShadow,
        marginTop: -14,
        marginLeft: -14,
        "&:focus, &:hover, &$active": {
            boxShadow: "0 3px 1px rgba(0,0,0,0.1),0 4px 8px rgba(0,0,0,0.3),0 0 0 1px rgba(0,0,0,0.02)",
            // Reset on touch devices, it doesn't add specificity
            "@media (hover: none)": {
                boxShadow: iOSBoxShadow,
            },
        },
    },
    active: {},
    valueLabel: {
        left: "calc(-50% + 12px)",
        top: -22,
        "& *": {
            background: "transparent",
            color: "#000",
        },
    },
    track: {
        height: 2,
    },
    rail: {
        height: 2,
        opacity: 0.5,
        backgroundColor: "#bfbfbf",
    },
    mark: {
        backgroundColor: "#bfbfbf",
        height: 8,
        width: 1,
        marginTop: -3,
    },
    markActive: {
        opacity: 1,
        backgroundColor: "currentColor",
    },
})(Slider);

const Attack = () => {
    const classes = useStyles();
    const [shake, setShake] = useState(false);
    const [weapon, setWeapon] = useState("");
    const [state, setState] = useState({
        checkedA: true,
        checkedB: true,
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

    const colorChange = (event) => {

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
                        <Box padding={1}>
                            <b>1. bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka</b> <br/>
                            <b>2. baka bakaBaka baka bakaBaka baka baka</b>
                        </Box>

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
                    <Box  display="flex" height={400}>
                        {/* https://codepen.io/giana/pen/zvZEBd */}
                        {/* https://jsfiddle.net/qstmpx7g/4/ */}
                        <Box className={classes.blood}  border={1} width="50%">Attacker Area</Box>
                        <Box  border={1} width="50%">defender Area</Box>
                    </Box>
                </Grid>
                <Grid item xs>
                    <Box display="flex">
                        <Box border={1} width="30%">
                            <FormControl variant="filled" className={classes.formControl}>
                                <InputLabel id="demo-simple-select-filled-label">Weapon</InputLabel>
                                <Select labelId="demo-simple-select-filled-label" id="demo-simple-select-filled" value={weapon} onChange={handleChange} className={classes.select} fullWidth={true}>
                                    <MenuItem value={1} className={classes.select}>
                                        fists
                                    </MenuItem>
                                    <MenuItem value={10}>Primary</MenuItem>
                                    <MenuItem value={20}>Secondary</MenuItem>
                                    <MenuItem value={30}>Melee</MenuItem>
                                    <MenuItem value={30}>Armor</MenuItem>
                                </Select>
                            </FormControl>
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
                        <Box border={1} width="50%" padding={3}>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={25}>
                                    <Typography variant="body2">Strength</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <IOSSlider aria-label="ios slider" defaultValue={60} marks={marks} valueLabelDisplay="on" />
                                </Box>
                            </Box>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={35}>
                                    <Typography variant="body2">Strength</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <IOSSlider aria-label="ios slider" defaultValue={60} marks={marks} valueLabelDisplay="on" />
                                </Box>
                            </Box>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={35}>
                                    <Typography variant="body2">Strength</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <IOSSlider aria-label="ios slider" defaultValue={60} marks={marks} valueLabelDisplay="on" />
                                </Box>
                            </Box>
                        </Box>
                        <Box border={1} width="20%">
                            Chat box goes here Chat box goes hereChat box goes hereChat box goes hereChat box goes hereChat box goes here{" "}
                        </Box>
                    </Box>
                </Grid>
            </Box>
        </>
    );
};

export default Attack;
