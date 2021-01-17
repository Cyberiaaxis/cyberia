import React, { useState, useRef } from "react";
import clsx from "clsx";
import {
    Box,
    Grid,
    makeStyles,
    withStyles,
    Typography,
    Avatar,
    Badge,
    Popper,
    Fade,
    CardMedia,
    Switch,
    Slider,
    FormGroup,
    FormControlLabel,
    FormHelperText,
    FormLabel,
    LinearProgress,
    MenuItem,
    Select,
    FormControl,
    Button,
    InputLabel,
} from "@material-ui/core";
import ProgressBar from "./ProgressBar";

import mafia from "../images/mafia.jpg";

const useStyles = makeStyles({
    body: {
        margin: 0,
    },

    root: {
        color: "#fff",
        height: "100vh",
        width: "100%",
        opacity: "0.9",
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
    blood: {
        // backgroundColor: '#7f0000',
    },
    formControl: {
        width: "100%",
    },
    circle: {
        width: "100%",
        height: "100%",
        // background:  'repeating-radial-gradient( circle at 0 0, #8A0303,  #ccc 50px )',
        // borderRadius: '50%',
        // boxShadow: "2px 3px 100px #8A0303, 0 0 200px inset white",
        // '0 0 250px inset #8A0303',
        // animation: "$pulse 5s infinite",
    },
    // cloudCircle: {
    //     width: "100px",
    //     height: "180px",
    //     background: "#8a0303",
    //     borderRadius: "50%",
    //     filter: `url(#filter)`,
    //     // animation: "$pulse2 5s infinite",
    // },
    weapon: {
        height: "10%",
        width: "10%",
        backgroundSize: "100% 100%",
        backgroundImage: `url("../images/gunaim.png")`,
    },
    primaryHitButton: {
        height: "100%",
        width: "100%",
        backgroundSize: "100% 100%",
        backgroundImage: `url("../images/gunaim.png")`,
    },
      typography: {
        padding: '2',
  },

    "@keyframes pulse": {
        "0%": { boxShadow: "inset 2px 3px 300px #8A0303, 0 0 200px  #8A0303" },
        "50%": { boxShadow: "inset 2px 3px 300px #8A0303, 0 0 200px  #8A0303" },
        "100%": { boxShadow: "0 0 0 inset transparent" },
    },

    "@keyframes pulse2": {
        "0%": { background: "#8a0303" },
        "50%": { background: "#d1001c" },
        "100%": { background: "transparent" },
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
            color: "red",
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

const Attack = () => {
    const classes = useStyles();
    const [shake, setShake] = useState(false);
    const [weapon, setWeapon] = useState("");
    const [state, setState] = useState({
        checkedA: true,
        checkedB: true,
    });
    const [anchorEl, setAnchorEl] = useState(null);
    const [open, setOpen] = useState(false);
    const [placement, setPlacement] = useState();
    const menuref = useRef(null)

    const animate = () => {
        // Button begins to shake
        setShake(true);

        // Buttons tops to shake after 2 seconds
        setTimeout(() => setShake(false), 5000);
    };

    const handleChange = (event) => {
        setWeapon(event.target.value);
    };

    const handleOpen = (newPlacement) => (event) => {
        setAnchorEl(event.currentTarget);
        setOpen((prev) => placement !== newPlacement || !prev);
        setPlacement(newPlacement);
    };

    const handleClose = (event) => {
        console.log("close");
    };

    const colorChange = (event) => {};

    return (
        <>
            <Popper open={open} anchorEl={menuref.current} placement={placement} transition>
                {({ TransitionProps }) => (
                    <Fade {...TransitionProps} timeout={350}>
                        <Typography className={classes.typography}>The content of the Popper.</Typography>
                    </Fade>
                )}
            </Popper>
            <Box className={clsx(classes.root, shake && classes.fire)}>
                <Grid container alignItems="center">
                    <Grid item xs sm>
                        <Box margin={2} display="flex" alignItems="center">
                            <StyledBadge
                                // minWidth={35}
                                overlap="circle"
                                anchorOrigin={{
                                    vertical: "top",
                                    horizontal: "right",
                                }}
                                variant="dot"
                            >
                                <Avatar alt="WoodenBat" src="/static/images/avatar/1.jpg" />
                            </StyledBadge>
                            <Box width="100%" ml={1}>
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
                        </Box>
                    </Grid>
                    <Grid item xs sm lg>
                        <Box padding={1}>
                            <b>1. bakaBaka baka bakaBaka baka bakaBaka baka bakaBaka</b> <br />
                            <b>2. baka bakaBaka baka bakaBaka baka baka</b>
                        </Box>
                    </Grid>
                    <Grid item xs sm>
                        <Box margin={2} display="flex">
                            <Box width="100%">
                                <Box display="flex" alignItems="center">
                                    <Box minWidth={35}>
                                        <Typography variant="body2">HP</Typography>
                                    </Box>
                                    <Box width="100%" mr={1}>
                                        <ProgressBar variant="determinate" value={50} type="lg" />
                                    </Box>
                                </Box>
                            </Box>
                            <StyledBadge
                                // minWidth={35}
                                overlap="circle"
                                anchorOrigin={{
                                    vertical: "top",
                                    horizontal: "right",
                                }}
                                variant="dot"
                            >
                                <Avatar alt="WoodenBat" src="/static/images/avatar/1.jpg" />
                            </StyledBadge>
                        </Box>
                    </Grid>
                </Grid>
                <Grid item xs>
                    <Box display="flex" height="100%">
                        <Box width="50%">
                            <Box margin={10}>
                                <img src={mafia} width={200} />
                            </Box>
                        </Box>
                        <Box width="50%">
                            <Box margin={10}>
                                <img src={mafia} width={200} />
                            </Box>
                        </Box>
                    </Box>
                </Grid>
                <Grid item xs>
                    <Box display="flex">
                        <Box border={1} width="30%">
                            <Box border={1} display="flex">
                                <Box width="75%" display="flex">
                                    <FormControl variant="filled" className={classes.formControl}>
                                        <InputLabel className={classes.select} id="demo-simple-select-filled-label">
                                            Primary Weapon
                                        </InputLabel>
                                        <Select labelId="demo-simple-select-filled-label" id="demo-simple-select-filled" value={weapon} onChange={handleChange} className={classes.select} displayEmpty={true} fullWidth={true}>
                                            <MenuItem ref={menuref} onMouseEnter={handleOpen("right-start")} onMouseLeave={handleClose} value={1}>
                                                fists
                                            </MenuItem>
                                            <MenuItem onMouseEnter={handleOpen("right-start")} onMouseLeave={handleClose} value={1}>
                                                fists
                                            </MenuItem>
                                            <MenuItem onMouseEnter={handleOpen("right-start")} onMouseLeave={handleClose} value={1}>
                                                fists
                                            </MenuItem>
                                            <MenuItem onMouseEnter={handleOpen("right-start")} onMouseLeave={handleClose} value={1}>
                                                fists
                                            </MenuItem>
                                            <MenuItem onMouseEnter={handleOpen("right-start")} onMouseLeave={handleClose} value={1}>
                                                fists
                                            </MenuItem>
                                        </Select>
                                    </FormControl>
                                </Box>
                                <Box width="25%" padding={1}>
                                    <Button variant="contained" color="primary" className={classes.primaryHitButton} onClick={animate}>
                                        Hit Him
                                    </Button>
                                </Box>
                            </Box>
                            <Box border={1} display="flex">
                                <Box width="75%">
                                    <FormControl variant="filled" className={classes.formControl}>
                                        <InputLabel  className={classes.select} id="demo-simple-select-filled-label">
                                            Secondary Weapon
                                        </InputLabel>
                                        <Select
                                            fullWidth="true"
                                            labelId="demo-simple-select-filled-label"
                                            id="demo-simple-select-filled"
                                            value={weapon}
                                            onChange={handleChange}
                                            className={classes.select}
                                            displayEmpty={true}
                                            fullWidth={true}
                                        >
                                            <MenuItem value={1}>fists</MenuItem>
                                            <MenuItem value={10}>Primary</MenuItem>
                                            <MenuItem value={20}>Secondary</MenuItem>
                                            <MenuItem value={30}>Melee</MenuItem>
                                            <MenuItem value={30}>Armor</MenuItem>
                                        </Select>
                                    </FormControl>
                                </Box>
                                <Box width="25%" padding={1}>
                                    <Button variant="contained" color="primary" onClick={animate} className={classes.primaryHitButton}>
                                        Hit Him
                                    </Button>
                                </Box>
                            </Box>
                            <Box border={1} display="flex">
                                <Box width="75%">
                                    <FormControl variant="filled" className={classes.formControl}>
                                        <InputLabel className={classes.select} id="demo-simple-select-filled-label">
                                            Armor
                                        </InputLabel>
                                        <Select labelId="demo-simple-select-filled-label" id="demo-simple-select-filled" value={weapon} onChange={handleChange} className={classes.select} displayEmpty={true} fullWidth={true}>
                                            <MenuItem value={1}>
                                                <Box display="flex">
                                                    <Box width="50%" flexGrow={1}>
                                                        fists
                                                    </Box>
                                                    <Box width="50%">
                                                        <Avatar alt="Remy Sharp" src="/static/images/avatar/1.jpg" />
                                                    </Box>
                                                </Box>
                                            </MenuItem>
                                            <MenuItem value={1}>fists</MenuItem>
                                            <MenuItem value={1}>fists</MenuItem>
                                            <MenuItem value={1}>Primary Weapon</MenuItem>
                                        </Select>
                                    </FormControl>
                                </Box>
                                <Box width="25%" padding={1}>
                                    <Button variant="contained" color="primary" onClick={animate} className={classes.primaryHitButton}>
                                        Hit Him
                                    </Button>
                                </Box>
                            </Box>
                        </Box>
                        <Box border={1} width="50%" padding={3}>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={65}>
                                    <Typography variant="body2">Strength</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <IOSSlider aria-label="ios slider" defaultValue={60} marks={marks} valueLabelDisplay="on" />
                                </Box>
                            </Box>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={65}>
                                    <Typography variant="body2">Strength</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <IOSSlider aria-label="ios slider" defaultValue={60} marks={marks} valueLabelDisplay="on" />
                                </Box>
                            </Box>
                            <Box display="flex" alignItems="center">
                                <Box minWidth={65}>
                                    <Typography variant="body2">Strength</Typography>
                                </Box>
                                <Box width="100%" mr={1}>
                                    <IOSSlider aria-label="ios slider" defaultValue={60} marks={marks} valueLabelDisplay="on" />
                                </Box>
                            </Box>
                        </Box>
                        <Box border={1} width="20%">
                            sssssssssssssssssssssssssss
                        </Box>
                    </Box>
                </Grid>
            </Box>
        </>
    );
};

export default Attack;
