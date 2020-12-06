import React, { useState } from "react";
import { Menu, MenuItem, makeStyles, withStyles, Box, Button, Grid, Paper, Badge, Avatar } from "@material-ui/core";

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
                    <Button aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Start
                    </Button>
                    <Menu className="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Crimes</MenuItem>
                        <MenuItem onClick={handleClose}>Fight</MenuItem>
                    </Menu>
                </Box>
                <Box p={1}>
                    <Button aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        Location
                    </Button>
                    <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                        <MenuItem onClick={handleClose}>Travel</MenuItem>
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
                <Box paddingBottom={1}>
                    <Button aria-controls="simple-menu" variant="outlined" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                        <StyledBadge
                            overlap="circle"
                            anchorOrigin={{
                                vertical: "bottom",
                                horizontal: "right",
                            }}
                            variant="dot"
                        >
                            <Avatar alt="Remy Sharp" src="/static/images/avatar/1.jpg" />
                        </StyledBadge>
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
            <Box marginBottom={5} paddingLeft={10}>
                <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                    Open Menu
                </Button>
                <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                    <MenuItem onClick={handleClose}>Profile</MenuItem>
                    <MenuItem onClick={handleClose}>My account</MenuItem>
                    <MenuItem onClick={handleClose}>Logout</MenuItem>
                </Menu>
            </Box>
            <Box marginBottom={5} paddingLeft={10}>
                <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                    Open Menu
                </Button>
                <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                    <MenuItem onClick={handleClose}>Profile</MenuItem>
                    <MenuItem onClick={handleClose}>My account</MenuItem>
                    <MenuItem onClick={handleClose}>Logout</MenuItem>
                </Menu>
            </Box>
            <Box marginBottom={5} paddingLeft={10}>
                <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                    Open Menu
                </Button>
                <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                    <MenuItem onClick={handleClose}>Profile</MenuItem>
                    <MenuItem onClick={handleClose}>My account</MenuItem>
                    <MenuItem onClick={handleClose}>Logout</MenuItem>
                </Menu>
            </Box>
            <Box marginBottom={5} paddingLeft={10}>
                <Button variant="outlined" aria-controls="simple-menu" color="secondary" aria-haspopup="true" onClick={handleClick} onMouseOver={handleClick}>
                    Open Menu
                </Button>
                <Menu id="simple-menu" anchorEl={anchorEl} MenuListProps={{ onMouseLeave: handleClose }} open={Boolean(anchorEl)} onClose={handleClose}>
                    <MenuItem onClick={handleClose}>Profile</MenuItem>
                    <MenuItem onClick={handleClose}>My account</MenuItem>
                    <MenuItem onClick={handleClose}>Logout</MenuItem>
                </Menu>
            </Box>
            <Box marginBottom={5} paddingLeft={10}>
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

const Main = ({ section }) => {
    let page;

    switch (section) {
        case "home":
            page = "Home";
            break;
        case "explore":
            page = "Explore";
            break;
        case "city":
            page = "city";
            break;
        case "market":
            page = "Market";
            break;
        default:
            page = "Home";
            break;
    }

    return (
        <main>
            <h1>{page}</h1>
        </main>
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
        const [section, setSection] = useState("home");

    return (
        <div className={classes.root}>
            <Grid container>
                {/* Header */}
                <Grid item xs={12}>
                    <Header />
                </Grid>
                {/* AsideLeft */}
                {/* <Grid item xs={2} sm={2}>
                    <AsideLeft />
                </Grid> */}
                {/* Main */}
                {/* <Grid item xs={8} sm={8}>
                    <Paper margin={0} padding={0} className={classes.paper}>
                        <Main section={section}/>
                    </Paper>
                </Grid> */}
                {/* AsideRight */}
                {/* <Grid item xs={2} sm={2}>
                    <AsideRight />
                </Grid> */}
                {/* Footer */}
                {/* <Grid item xs={12}>
                    <Footer />
                </Grid> */}
            </Grid>
        </div>
    );
}
