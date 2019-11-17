const express = require('express');
  app = express();
  bodyParser = require('body-parser');
  port = process.env.PORT || 3000;


const Sequelize = require('sequelize');
var db = require('./app/models/db.js');
var models =require('./app/models/personne')
var a = db.models.personne.findAll()
console.log(a)

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.listen(port);

console.log('API server started on: ' + port);
app.use('/api/', require('./app/routes/router'))
