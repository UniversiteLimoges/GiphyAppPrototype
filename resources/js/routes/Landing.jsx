import React from "react";
import styled from "styled-components";

const Landing = () => {
    return (
        <Wrapper>
            <h1>Hello from React !</h1>
        </Wrapper>
    );
};

const Wrapper = styled.div`
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
`;

export default Landing;
