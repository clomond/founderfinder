class LoginView extends app.BaseView
	el:'#main-area'

	events:
		"click #loginButton": "login"
		"click #createButton": "create"

	initialize:->
		_.bindAll(this, 'render','login','create')
		@template = _.template( app.tpl.get('tpl-login') )
		@render()

	render:->
		console.log "trying to load the login view"
		@$el.html @template()
		@

	login: (e) ->
		event.preventDefault() # Don't let this button submit the form
		$(".alert-error").hide() # Hide any errors on a new submit
		url = "api/user/login"
		formValues =
		  username: $("#inputUsername").val()
		  password: $("#inputPassword").val()
		$.ajax
		  url: url
		  type: "POST"
		  dataType: "json"
		  data: formValues
		  success: (data) ->
		    if data.error # If there is an error, show the error messages
		    	$(".alert-error").text(data.error.text).show()
		    else # If not, send them back to the home page
		    	app.currentUser.attributes = data
		    	app.currentUser.trigger("login")
		    	window.location.replace "#"
		@trigger("login")

	create: (e) ->
		event.preventDefault() # Don't let this button submit the form
		$(".alert-error").hide() # Hide any errors on a new submit
		url = "api/user/create"
		formValues =
		  username: $("#inputCreateUsername").val()
		  email: $("#inputCreateEmail").val()
		  password: $("#inputCreatePassword").val()
		  password_confirmation: $("#inputCreatePasswordConfirmation").val()
		
		$.ajax
		  url: url
		  type: "POST"
		  dataType: "json"
		  data: formValues
		  success: (data) ->
		    if data.error # If there is an error, show the error messages
		    	$(".alert-error").text(data.error.text).show()
		    else # If not, send them back to the home page
		    	app.currentUser.attributes = data.attributes
		    	app.currentUser.trigger("login") 
		    	window.location.replace "#"
		@trigger("login")


@app = window.app ? {}
@app.LoginView = LoginView
		
