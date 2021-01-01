import React, { useState } from "react";
import clsx from "clsx";
import { Box, Grid, makeStyles } from "@material-ui/core";
import ProgressBar from "./ProgressBar";

const useStyles = makeStyles({
    root: {
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
});

const Attack = () => {
    const classes = useStyles();
    const [shake, setShake] = useState(false);

    const animate = () => {
        // Button begins to shake
        setShake(true);

        // Buttons tops to shake after 2 seconds
        setTimeout(() => setShake(false), 5000);
    };

    return (
        <>
            <Box className={clsx(classes.root, shake && classes.fire)}>
                <Grid>
                    <Box display="flex">
                        <Box>
                            <Box >HP</Box>
                            <Box ><ProgressBar percentComplete={75} /></Box>
                        </Box>
                                            <Box>
                            <Box >HP</Box>
                            <Box ><ProgressBar percentComplete={75} /></Box>
                        </Box>
                    </Box>
                </Grid>
                <Grid>
                    <button onClick={animate}>Click me</button>
                </Grid>

            </Box>
        </>
    );
};

export default Attack;
