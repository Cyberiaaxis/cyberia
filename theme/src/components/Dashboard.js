import React, { useState } from "react";
import { Menu, MenuItem, makeStyles, Box, Button, Grid,  Paper } from "@material-ui/core";

const useStyles = makeStyles((theme) => ({
    root: {
        flexGrow: 1,
        backgroundImage: 'url("https://deadline.com/wp-content/uploads/2018/03/pb4_master_keyart_aw_land_v2-_-35-e1584361674557.jpg")',
        backgroundSize: "cover",
        height: "100vh",
        width: '100%',
    },
    paper: {
        padding: theme.spacing(1),
        // textAlign: "center",
        background: "transparent",
        height: "82vh",
        overflow: "auto",
        width: '100%',
    },
    leftSideBar: {
        textAlign: "right",
    },
}));

export default function FullWidthGrid() {
    const classes = useStyles();
    const [anchorEl, setAnchorEl] = useState(null);

    const handleClick = (event) => {
        if (anchorEl !== event.currentTarget) {
            setAnchorEl(event.currentTarget);
        }
        console.log(event.nativeEvent);
    };

    const handleClose = () => {
        setAnchorEl(null);
    };

    return (
        <div className={classes.root}>
            <Grid container>
                <Grid item xs={12}>
                    <Box display="flex">
                        <Box p={1} flexGrow={1}>
                            <Button mx="auto" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                        <Box p={1}>
                            <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                        <Box p={1}>
                            <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                        <Box p={1}>
                            <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                    </Box>
                </Grid>
                <Grid  item xs={12} sm={2}>
                    <Box marginBottom={5} marginTop={5}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                </Grid>
                <Grid  item xs={12} sm={8}>
                    <Paper className={classes.paper}>
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
                </Grid>
                <Grid  item xs={12} sm={2} className={classes.leftSideBar}>
                    <Box marginBottom={5} marginTop={5} paddingRight={1}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5} marginTop={5} paddingRight={1}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5} marginTop={5} paddingRight={1}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5} marginTop={5} paddingRight={1}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                    <Box marginBottom={5} marginTop={5} paddingRight={1}>
                        <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                            Open Menu
                        </Button>
                        <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                            <MenuItem onClick={handleClose}>Profile</MenuItem>
                            <MenuItem onClick={handleClose}>My account</MenuItem>
                            <MenuItem onClick={handleClose}>Logout</MenuItem>
                        </Menu>
                    </Box>
                </Grid>
                <Grid item xs={12}>
                    <Box display="flex">
                        <Box p={1} flexGrow={1}>
                            <Button mx="auto" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                        <Box p={1}>
                            <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                        <Box p={1}>
                            <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                        <Box p={1}>
                            <Button mx="auto" aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                                Open Menu
                            </Button>
                            <Menu id="simple-menu" anchorEl={anchorEl} keepMounted open={Boolean(anchorEl)} onClose={handleClose}>
                                <MenuItem onClick={handleClose}>Profile</MenuItem>
                                <MenuItem onClick={handleClose}>My account</MenuItem>
                                <MenuItem onClick={handleClose}>Logout</MenuItem>
                            </Menu>
                        </Box>
                    </Box>
                </Grid>
            </Grid>
        </div>
    );
}
