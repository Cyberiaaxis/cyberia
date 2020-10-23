import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import App from './components/App';
import Login from './components/Login';
import './styles/style.css';
import './styles/index.scss';
import './styles/responsive.scss';


import * as serviceWorker from './serviceWorker';

ReactDOM.render(
  <Router>
    <Switch>
      <Route exact path="/">
        <App />
      </Route>
      <Route path="/home">
        <App />
      </Route>
      <Route path="/about">
        <App />
      </Route>
      <Route path="/login">
        <Login />
      </Route>
    </Switch>
  </Router>,
  document.getElementById('root')
);

serviceWorker.unregister();