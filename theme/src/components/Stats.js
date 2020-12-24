import React, { useState } from "react";
import { Box, makeStyles, withStyles, Table, TableBody, TableCell, TableContainer, TableHead, TableRow, Paper } from "@material-ui/core/";

const StyledTableCell = withStyles((theme) => ({

    head: {
        color: '#3B7903',
                    fontFamily: [
                  "Alegreya SC",
                  "serif"
    ].join(','),
    fontSize: 20,

    },
    body: {
                color: '#5F4821',
                    fontFamily: [
                  "Alegreya SC",
                  "serif"
    ].join(','),
    fontSize: 17,

    },
}))(TableCell);

const StyledTableRow = withStyles((theme) => ({
    root: {
        // "&:nth-of-type(odd)": {
        // },
    },
}))(TableRow);

function createData(name, calories, fat, carbs, protein) {
    return { name, calories, fat, carbs, protein };
}

const rows = [createData("Won", 159, 6.0, 24, 4.0), createData("Lost", 237, 9.0, 37, 4.3)];

const useStyles = makeStyles({
    table: {
                // background: "transparent",
    },
});

export default function Stats() {
    const classes = useStyles();

    return (
        <>
            <Box paddingTop={9}>
                <Box display="flex">
                    <TableContainer>
                        <Table className={classes.table} aria-label="customized table">
                            <TableHead>
                                <TableRow>
                                    <StyledTableCell>Battle Stats</StyledTableCell>
                                    <StyledTableCell align="right">Total</StyledTableCell>
                                </TableRow>
                            </TableHead>
                            <TableBody>
                                {rows.map((row) => (
                                    <StyledTableRow key={row.name}>
                                        <StyledTableCell component="th" scope="row">
                                            {row.name}
                                        </StyledTableCell>
                                        <StyledTableCell align="right">{row.calories}</StyledTableCell>
                                    </StyledTableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </TableContainer>

                    <TableContainer>
                        <Table className={classes.table} aria-label="customized table">
                            <TableHead>
                                <TableRow>
                                    <StyledTableCell>Working Stats</StyledTableCell>
                                    <StyledTableCell align="right">Total</StyledTableCell>
                                </TableRow>
                            </TableHead>
                            <TableBody>
                                {rows.map((row) => (
                                    <StyledTableRow key={row.name}>
                                        <StyledTableCell component="th" scope="row">
                                            {row.name}
                                        </StyledTableCell>
                                        <StyledTableCell align="right">{row.calories}</StyledTableCell>
                                    </StyledTableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </TableContainer>

                </Box>
                <Box display="flex">
                    <TableContainer>
                        <Table className={classes.table} aria-label="customized table">
                            <TableHead>
                                <TableRow>
                                    <StyledTableCell>Criminal Recode</StyledTableCell>
                                    <StyledTableCell align="right">Total</StyledTableCell>
                                </TableRow>
                            </TableHead>
                            <TableBody>
                                {rows.map((row) => (
                                    <StyledTableRow key={row.name}>
                                        <StyledTableCell component="th" scope="row">
                                            {row.name}
                                        </StyledTableCell>
                                        <StyledTableCell align="right">{row.calories}</StyledTableCell>
                                    </StyledTableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </TableContainer>

                    <TableContainer>
                        <Table className={classes.table} aria-label="customized table">
                            <TableHead>
                                <TableRow>
                                    <StyledTableCell>Fight Recode</StyledTableCell>
                                    <StyledTableCell align="right">Total</StyledTableCell>
                                </TableRow>
                            </TableHead>
                            <TableBody>
                                {rows.map((row) => (
                                    <StyledTableRow key={row.name}>
                                        <StyledTableCell component="th" scope="row">
                                            {row.name}
                                        </StyledTableCell>
                                        <StyledTableCell align="right">{row.calories}</StyledTableCell>
                                    </StyledTableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </TableContainer>

                </Box>

            </Box>

        </>
    );
}
