"use strict";

var response = require("./res");
var connection = require("./conn");

exports.index = function (req, res) {
  response.ok("Node Express API by Duds HN", res);
};

exports.users = function (req, res) {
  connection.query("select * from person", function (error, rows, fields) {
    if (error) {
      console.log(error);
    } else {
      response.ok(rows, res);
    }
  });
};

exports.findUsers = function (req, res) {
  var userId = req.params.user_id;
  connection.query("select * from person where id = ?", [userId], function (
    error,
    rows,
    fields
  ) {
    if (error) {
      console.log(error);
    } else {
      response.ok(rows, res);
    }
  });
};

exports.createUsers = function (req, res) {
  var firstName = req.body.first_name;
  var lastName = req.body.last_name;

  connection.query(
    "insert into person (first_name, last_name) values( ?, ?)",
    [firstName, lastName],
    function (error, rows, fields) {
      if (error) {
        console.log(error);
      } else {
        response.ok("Success", res);
      }
    }
  );
};

exports.updateUsers = function (req, res) {
  var userId = req.body.user_id;
  var firstName = req.body.first_name;
  var lastName = req.body.last_name;

  connection.query(
    "update person set first_name = ?, last_name = ? where id = ?",
    [firstName, lastName, userId],
    function (error, rows, fields) {
      if (error) {
        console.log(error);
      } else {
        response.ok("Success", res);
      }
    }
  );
};

exports.deleteUsers = function(req, res){
    var userId = req.body.user_id;

    connection.query('delete from person where id = ?',
    [userId],
    function(error,rows,fields){
        if(error){
            console.log(error)
        }else{
            response.ok("Success", res)
        }
    });
}
