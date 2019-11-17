const express = require('express');
const router = express.Router();
const PersonneController = require('../controller/personneController');


//router.get('/', (req, res) => res.send('Personne'));

router.post('/user', (req, res) => {
	if(req.body.API_KEY === 'MoNaPiKeY'){
		PersonneController.list_all_personnes(req, res)									//route pour avoir tous les utilisateurs	
	}else{
	return res.status(400).json({'error': 'Your not allow to use this API'});
	}		
		});
router.post('/login', (req, res) => {
	if(req.body.API_KEY === 'MoNaPiKeY'){									//route pour login
		PersonneController.login(req,res)
	}else{
		return res.status(400).json({'error': 'Your not allow to use this API'});
	}		
})
router.post('/register', (req, res) => {									//route pour register
	if(req.body.API_KEY === 'MoNaPiKeY'){
		PersonneController.register(req,res)
	}else{
	return res.status(400).json({'error': 'Your not allow to use this API'});
	}		
})
module.exports = router;

