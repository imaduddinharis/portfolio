var express = require("express"),
  app = express(),
  port = process.env.PORT || 3000,
  host = 'http://localhost',
  bodyParser = require("body-parser"),
  controller = require("./controller");

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

var routes = require('./routes');
routes(app);

app.listen(port);
console.log('Node Express API Started on: '+host +':'+port);
