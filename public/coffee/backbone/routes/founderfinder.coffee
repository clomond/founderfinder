class FounderFinderRouter extends app.BaseRouter
	routes:
		'':'login'
		'login':'login'
		'edit_profile' : 'editProfile'
		'profile/:id':'showProfile'
		'profiles':'profileList'
	
	login:->
		loginView = new app.LoginView
	
	
	showProfile:(id)->
		profile = new app.Profile id: id
		profile.fetch
			success: (model,response)->
				@profileView = new app.ProfileView model: profile

	editProfile:->
		loginView = new app.LoginView

	profileList:->
		matchesView = new app.MatchesView

	initialize:->
		currentUser = new app.currentUser
		currentUser.fetch
			success: (model, response) ->
				app.currentUser = model
				@headerView = new app.HeaderView model: model


		
@app = window.app ? {}
@app.FounderFinderRouter = FounderFinderRouter

app.tpl.loadTemplates ["tpl-header", "tpl-profile-row", "tpl-login", "tpl-matches", "tpl-home","tpl-show-profile","tpl-profiles"], ->

	jQuery ->
		app.locausRouter = new app.FounderFinderRouter
		Backbone.history.start()
