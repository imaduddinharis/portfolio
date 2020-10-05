var express = require("express"),
  app = express(),
  port = process.env.PORT || 3000,
  host = 'http://localhost',
  bodyParser = require("body-parser"),
  controller = require("./controller");
  var cors = require('cors');

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(cors());

var routes = require('./routes');
routes(app);

app.listen(port);
console.log('Node Express API Started on: '+host +':'+port);
