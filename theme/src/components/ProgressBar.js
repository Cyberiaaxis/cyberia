import React from "react";
import { number } from "prop-types";
import "../styles/ProgressBar.scss";
import { Box } from "@material-ui/core";

const ProgressBar = ({ percentComplete }) => (
    <>
        <div>
            <Box className="bar">
                <Box
                    className="fill"
                    style={{
                        width: `${percentComplete}%`,
                        borderRadius: `${percentComplete === 100 ? "2px" : "2px 0 0 2px"}`,
                    }}
                />
            </Box>
        </div>
    </>
);

ProgressBar.propTypes = {
    percentComplete: number,
};

ProgressBar.defaultProps = {
    percentComplete: 20,
};

export default ProgressBar;
