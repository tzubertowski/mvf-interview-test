import React, { Component } from "react";

import Navbar from "react-bootstrap/Navbar";

class Navigation extends Component {
  state = {};
  render() {
    return (
      <Navbar bg="dark" variant="dark">
        <Navbar.Text href="#home">MVF; Favourite languages</Navbar.Text>
      </Navbar>
    );
  }
}

export default Navigation;
