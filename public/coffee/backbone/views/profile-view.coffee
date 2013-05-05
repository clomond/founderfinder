class ProfileView extends app.BaseView
	el:'#main-area'

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-show-profile') )
		@render()

	render:->
		data = @model.attributes
		@$el.html @template( m: data )

		@

class EditProfileView extends app.BaseView
	el:'#main-area'


	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-edit-profile') )
		$("#business-slider").slider
		  step: 1
		  min: 0
		  max: 12
		  value: 4
		  slide: (event, ui) ->
		    	$("#business-value").val ui.value
		$("#technology-slider").slider
		  step: 1
		  min: 0
		  max: 12
		  value: 4
		  slide: (event, ui) ->
		    $("#technology-value").val ui.value
		$("#design-slider").slider
		  step: 1
		  min: 0
		  max: 12
		  value: 4
		  slide: (event, ui) ->
		    $("#design-value").val ui.value

	  	$("#technology-slider").slider "value", $("#technology-value").val()
		@render()



	render:->
		data = app.currentUser
		@$el.html @template( m: data )

		@



class MatchesView extends app.BaseView
	el: "#main-area"

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-matches') )
		@render()

	render:->
		@$el.html @template
		@profileCollection = new app.ProfileCollection
		@profileCollection.fetch
			success: (model, response) ->
				@profilesView = new app.ProfilesView collection:model

		#tbody = @$('tbody')
		#@collection.each (item) ->
		#	console.log "inserting item"
		#	displayView = new app.ProfileRowView model:item
		#	tbody.append displayView.render().el
		@	

class ProfilesView extends app.BaseView
	el: "#profiles"

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-profiles') )
		@render()

	render:->
		#@$el.html @template
		#console.log "rendering"
		tbody = @$('tbody')
		#console.log "tbody is ", tbody
		#console.log "self is", @el
		@collection.each (item) ->
			#console.log "inserting item:"
			#console.log item
			displayView = new app.ProfileRowView model:item
			tbody.append displayView.render().el
			#console.log "displayView el", displayView.render().el
		@

class ProfileRowView extends app.BaseView
	tagName: "tr"

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-profile-row') )
		@render()

	render:->
		#console.log "rendering"
		#console.log @model.attributes.attributes
		@$el.html @template(m: @model.attributes)
		@$el.attr 'id', @model.id
		@

@app = window.app ? {}
@app.ProfileView = ProfileView
@app.EditProfileView = EditProfileView
@app.MatchesView = MatchesView
@app.ProfilesView = ProfilesView
@app.ProfileRowView = ProfileRowView