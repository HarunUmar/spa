import Auth from './auth';

export default {

	
	guest (to, from ,next){
		next(!Auth.checkAuth())
	},

	

	authPos(to,from,next){
		
		next(Auth.checkPos()? true:{
			path: '/signin',
			query:{
				redirect: to.name
			}
		})
	},

	authAdmin(to,from,next){
		
		next(Auth.checkAdmin()? true:{
			path: '/signin',
			query:{
				redirect: to.name
			}
		})
	},

	authSuper(to,from,next){
		
		next(Auth.checkSuper()? true:{
			path: '/signin',
			query:{
				redirect: to.name
			}
		})
	}

	
	
	

}