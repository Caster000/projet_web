'use strict';
//const Sequelize = require('sequelize');
const models = require('../models/personne');
const db = require('../models/db')
const bcrypt = require('bcrypt');
const jwtUtils = require('../utils/jwt.utils')

module.exports = {
list_all_personnes : (req, res) =>{												//methode pour avoir tous les utilisateurs
  db.models.personne.findAll(
)
  .then( (userfound) => res.json(userfound))
    
    .catch(function (err) {res.send(err);})
      },  

register: (req, res) =>{											//methode pour register utilisateurs
  var nom = req.body.nom;
  var prenom = req.body.prenom;
  var campus = req.body.campus;
  var email = req.body.email;
  var password = req.body.password;
  //var id_role = req.body.id_role;
  console.log(nom)
  if( nom == null || prenom == null || campus == null || email == null || password == null){
    return res.status(400).json({'error': 'missing parameters'});
  }
  db.models.personne.findOne({
    attributes:['email'],
    where: {email:email}
  })
  .then(function(userFound){
    if(!userFound){
      bcrypt.hash(password, 5, function( err, bcryptedPassword){
        var newUser = db.models.personne.create({
          nom: nom,
          prenom: prenom,
          id_campus: 1,
          email: email,
          password: bcryptedPassword,
          id_role: 1
        })
        .then( (newUser)=>{
          return res.status(201).json({
            'id_personne': newUser.id_personne              //potentiel bug car auto increment
          })
        })
        .catch( (err)=>{
          return res.status(500).json({
            'error': err
          })
        })
      })
    } else {
      return res.status(409).json({'error': 'user already exist'})
    }

  })
  .catch( (err)=>{
    return res.status(500).json({'error': 'unable to verify'})
  })
},

  
login: (req, res) =>{											//methode pour login les utilisateurs
    var email = req.body.email;
    //console.log(mail)
    var password = req.body.password;
    console.log(password)
    if( email == null || password == null){
    return res.status(400).json({'error': 'missing parameters'});
    }
    db.models.personne.findOne({
    where: {email:email}
  }) 
  .then( (userFound)=>{
    if(userFound){
      bcrypt.compare(password, userFound.password, (errBycrypt, resBycrypt)=>{
        if(resBycrypt){
          return res.status(200).json({
            'id_personne': userFound.id_personne,                  //potentiel bug car auto increment
            'token': jwtUtils.generateTokenForUser(userFound)
          })
        }else{
			
			//return res.json( {'error': password});
          return res.status(403).json({'error': 'invalid password'})
        }
      })
    }else{
      return res.status(404).json({'error': 'user not exist in DB'})
    }
  })
  .catch( (err) => {
    return res.status(500).json({'error': 'unable to verify'})
  })     
      }  
};

/*exports.create_a_personne = function(req, res) {
  var new_personne = new Personne(req.body);

  //handles null error 
   if(!new_personne.nom || !new_personne.prenom || !new_personne.campus || !new_personne.mail || !new_personne.password || !new_personne.id_role){

            res.status(400).send({ error:true, message: 'Please provide personne/status' });

        }
else{
  
  Personne.createPersonne(new_personne, function(err, personne) {
   // console.log('hi');
    if (err)
      res.send(err);
    res.json(personne);
  });
}
};*/


/*exports.read_a_personne = function(req, res) {
  Personne.getPersonneById(req.params.personneId, function(err, personne) {
    if (err)
      res.send(err);
    res.json(personne);
  });
};


exports.update_a_personne = function(req, res) {
  Personne.updateById(req.params.personneId, new Personne(req.body), function(err, personne) {
    if (err)
      res.send(err);
    res.json(personne);
  });
};


exports.delete_a_personne = function(req, res) {


  Personne.remove( req.params.personneId, function(err, personne) {
    if (err)
      res.send(err);
    res.json({ message: 'Personne successfully deleted' });
  });
};

exports.read_a_personne_role = function(req, res) {


  Personne.getPersonneRoleById( req.params.personneId, function(err, personne) {
    if (err)
      res.send(err);
    res.json(personne);
  });
};*/