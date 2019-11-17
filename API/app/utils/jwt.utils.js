var jwt = require('jsonwebtoken')

const JWT_SIGN_SECRET = 'secret'

module.exports ={
	generateTokenForUser: (userData)=>{
		return jwt.sign({
			id_personne: userData.id_personne,	//a check
			id_role:userData.id_role
		},
		JWT_SIGN_SECRET,
		{
			expiresIn:'1h'
		}
		)
	}
}