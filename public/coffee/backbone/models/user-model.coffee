class User extends app.BaseModel
	urlRoot: 'api/user'
	defaults:
		username:''
		email:''
		establishments:''
		friends:'[]'
		potential_users:'[]'

class currentUser extends User
	url: 'api/user/current'

		
@app = window.app ? {}
@app.User = User
@app.currentUser = currentUser
