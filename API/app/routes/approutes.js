'use strict';
module.exports = function(app) {
  var listPersonne = require('../controller/personneController');
const jwt = require('jsonwebtoken');
  // todoList Routes
  app.route('/user',verifyToken)
    .get(listPersonne.list_all_personnes)
    .post(listPersonne.create_a_personne);
   
   app.route('/user/:personneId')
    .get(listPersonne.read_a_personne)
    .put(listPersonne.update_a_personne)
    .delete(listPersonne.delete_a_personne);
    
	app.route('/user/:personneId/role')
    .get(listPersonne.read_a_personne_role);
	
	app.post('/login', (req,res) => {
		const user = {
			id:1,
			username:'laravel',
			mail:'laravel@gmail.com'
		}
		jwt.sign({user:user}, 'secretkay',(err,token)=>
			{ res.json({token});
			});
	});
	// FORMAT OF TOKEN
	// Authorization: Bearer <access_token>

	// Verify Token
	function verifyToken(req, res, next) {
	// Get auth header value
	console.log('hi');
	const bearerHeader = req.headers['authorization'];
	// Check if bearer is undefined
	if(typeof bearerHeader !== 'undefined') {
		
		}else{ res.sendStatus(403);}
	}
		
	};
	