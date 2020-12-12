import React from "react";
import { number } from "prop-types";
import "../styles/ProgressBar.scss";

const ProgressBar = ({ percentComplete }) => (
  <div className="bar">
    <div
      className="fill"
      style={{
        width: `${percentComplete}%`,
        borderRadius: `${percentComplete === 100 ? "2px" : "2px 0 0 2px"}`
      }}
    />
  </div>
);

ProgressBar.propTypes = {
  percentComplete: number
};

ProgressBar.defaultProps = {
  percentComplete: 20
};

export default ProgressBar;
