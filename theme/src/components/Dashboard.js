import React, { useState } from "react";
import { Menu, MenuItem, makeStyles, Box, Button, Grid, Paper } from "@material-ui/core";

const useStyles = makeStyles((theme) => ({
    root: {
        flexGrow: 1,
        backgroundImage: 'url("https://www.gstatic.com/webp/gallery/1.jpg")',
        backgroundSize: "cover",
        height: "100vh",
        width: "100%",
    },
    paper: {
        // padding: theme.spacing(1),
        // textAlign: "center",
        background: "transparent",
        height: "82vh",
        overflow: "auto",
        width: "100%",
    },
}));

    const Header = () => {
        const [anchorEl, setAnchorEl] = useState(null);

        const handleClick = (event) => {
            if (anchorEl !== event.currentTarget) {
                setAnchorEl(event.currentTarget);
            }
        };

        const handleClose = () => {
            setAnchorEl(null);
        };

        return (
            <>
                <Box display="flex">
                    <Box p={1} flexGrow={1}>
                        <Button mx="auto" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box p={1}>
                        <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile2</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box p={1}>
                        <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box p={1}>
                        <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                </Box>
            </>
        );
    };

    const AsideLeft = () => {

                const [anchorEl, setAnchorEl] = useState(null);

        const handleClick = (event) => {
            if (anchorEl !== event.currentTarget) {
                setAnchorEl(event.currentTarget);
            }
        };

        const handleClose = () => {
            setAnchorEl(null);
        };
        return (
            <>
                <Box marginBottom={5} marginTop={5}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
            </>
        );
    };

    const AsideRight = () => {
                const [anchorEl, setAnchorEl] = useState(null);

        const handleClick = (event) => {
            if (anchorEl !== event.currentTarget) {
                setAnchorEl(event.currentTarget);
            }
        };

        const handleClose = () => {
            setAnchorEl(null);
        };
        return (
            <>
                <Box marginBottom={5} marginTop={5} paddingLeft={10}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5} marginTop={5} paddingLeft={10}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5} marginTop={5} paddingLeft={10}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5} marginTop={5} paddingLeft={10}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
                <Box marginBottom={5} marginTop={5} paddingLeft={10}>
                    <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Open Menu
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Profile</MenuItem>
                        <MenuItem onClick={handleClose}>My account</MenuItem>
                        <MenuItem onClick={handleClose}>Logout</MenuItem>
                    </Menu>
                </Box>
            </>
        );
    };

    const Main = (props) => {
        return (
            <>
                <Paper className={props.classes.paper}>
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                    content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here content goes here
                </Paper>
            </>
        );
    };

    const Footer = () => {
                const [anchorEl, setAnchorEl] = useState(null);

        const handleClick = (event) => {
            if (anchorEl !== event.currentTarget) {
                setAnchorEl(event.currentTarget);
            }
        };

        const handleClose = () => {
            setAnchorEl(null);
        };
        return (
            <>
                <Box display="flex">
                    <Box flexGrow={1}>
                        <Button mx="auto" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box p={2}>
                        <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box p={2}>
                        <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box p={2}>
                        <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                </Box>
            </>
        );
    };

export default function Dashboard() {
            const classes = useStyles();



    return (
        <div className={classes.root}>
            <Grid container>
                {/* Header */}
                <Grid item xs={12}>
                    <Header/>
                </Grid>
                {/* AsideLeft */}
                <Grid item xs={12} sm={2}>
                    <AsideLeft/>
                </Grid>
                {/* Main */}
                <Grid item xs={12} sm={8}>
                    <Main classes={classes}/>
                </Grid>
                {/* AsideRight */}
                <Grid item xs={12} sm={2}>
                    <AsideRight/>
                </Grid>
                {/* Footer */}
                <Grid item xs={12}>
                    <Footer/>
                </Grid>
            </Grid>
        </div>
    );
}
