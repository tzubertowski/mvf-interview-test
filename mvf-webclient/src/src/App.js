import React from "react";

import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";

import "./App.css";

import FavouriteLanguages from "./components/favourite-languages";
import Navigation from "./components/navigation";
function App() {
  return (
    <div className="App">
      <Navigation></Navigation>
      <Container>
        <Row className="justify-content-center">
          <FavouriteLanguages></FavouriteLanguages>
        </Row>
      </Container>
    </div>
  );
}

export default App;
