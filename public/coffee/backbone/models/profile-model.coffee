class Profile extends app.BaseModel
	urlRoot: 'api/profile'
	defaults:
		establishment_id:''
		user_id:''
		text:''
		is_good:''

	#initialize:(options)->
	#	if options? && options.id?
	#		url +=

class ProfileCollection extends app.BaseCollection
	url:'api/profile'
	model: Profile


		
@app = window.app ? {}
@app.Profile = Profile
@app.ProfileCollection = ProfileCollection
