import React from "react";
import { createGlobalStyle } from "styled-components";
import { Router, Route } from "react-router-dom";
import { render } from "react-dom";

import { Landing } from "./routes";

import history from "./history";

const App = () => {
    return (
        <Router history={history}>
            <Route path="/" component={Landing} exact />
            <GlobalStyle />
        </Router>
    );
};

const GlobalStyle = createGlobalStyle`
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    html,
    body {
        width: 100%;
    }
`;

const targetElement = document.querySelector("#app");
export default render(<App />, targetElement);
