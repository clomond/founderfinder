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
		@profileCollection = new app.ProfileCollection
		console.log "here"
		@profileCollection.fetch
			success: (model, response) ->
				@profilesView = new app.ProfilesView collection:model

	initialize:->
		currentUser = new app.currentUser
		currentUser.fetch
			success: (model, response) ->
				app.currentUser = model
				@headerView = new app.HeaderView model: model


		
@app = window.app ? {}
@app.FounderFinderRouter = FounderFinderRouter

app.tpl.loadTemplates ["tpl-header", "tpl-profile-row", "tpl-login", "tpl-home","tpl-show-profile","tpl-profiles"], ->

	jQuery ->
		app.locausRouter = new app.FounderFinderRouter
		Backbone.history.start()
