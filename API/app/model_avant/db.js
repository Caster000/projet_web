'user strict';
/*
var mysql = require('mysql');

//local mysql db connection
var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'projet_web'
});

connection.connect(function(err) {
    if (err) throw err;
});

module.exports = connection;*/
const Sequelize = require('sequelize');

// Option 1: Passing parameters separately
const db = new Sequelize('projet_web', 'root', '', {
  host: 'localhost',
  dialect: 'mysql'/* one of 'mysql' | 'mariadb' | 'postgres' | 'mssql' */

});

module.exports = db;