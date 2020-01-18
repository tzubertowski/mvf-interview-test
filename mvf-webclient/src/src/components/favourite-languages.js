import React, { Component } from "react";

import Container from "react-bootstrap/Container";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import Alert from "react-bootstrap/Alert";
import Table from "react-bootstrap/Table";

import axios from "axios";

class FavouriteLanguages extends Component {
  state = {
    username: "",
    languagesList: [],
    showErrorAlert: false
  };
  handleLanguagesCheck = e => {
    e.preventDefault();
    axios
      .get("http://localhost:8000/programming-languages", {
        params: {
          type: "favourite",
          userName: this.state.username
        }
      })
      .then(response => {
        var languagesList = [];
        for (var language in response.data) {
          languagesList.push([language, response.data[language]]);
        }

        languagesList.sort(function(a, b) {
          return b[1] - a[1];
        });
        this.setState({ languagesList: languagesList });
      })
      .catch(error => {
        this.setState({ showErrorAlert: true });
      });
  };
  render() {
    return (
      <Container>
        <Alert
          variant="danger"
          onClose={() => this.setState({ showErrorAlert: false })}
          dismissible
          show={this.state.showErrorAlert}
        >
          <Alert.Heading>Oops, we couldn't fetch that..</Alert.Heading>
          <p>
            It seems like we could not fetch given github user favourite
            languages. Try another github username.
          </p>
        </Alert>
        <h3>Favourite languages</h3>
        <p>
          Find out what are given Github user's favourite programming languages
        </p>
        <Form onSubmit={this.handleLanguagesCheck}>
          <Form.Group controlId="formUserName">
            <Form.Control
              required
              placeholder="Enter github username"
              onChange={e => {
                this.setState({ username: e.target.value });
              }}
            />
          </Form.Group>
          <Button variant="primary" type="submit">
            Submit
          </Button>
        </Form>

        <h3>Programming languages</h3>
        <Table striped bordered hover>
          <thead>
            <tr>
              <th>Language name</th>
              <th>
                Likeness of being a favourite <h6>higher - better </h6>
              </th>
            </tr>
          </thead>
          <tbody>
            {this.state.languagesList.map(language => (
              <tr>
                <td>{language[0]}</td>
                <td>{language[1]}</td>
              </tr>
            ))}
          </tbody>
        </Table>
      </Container>
    );
  }
}

export default FavouriteLanguages;
