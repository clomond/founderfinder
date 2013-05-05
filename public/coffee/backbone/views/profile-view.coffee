class ProfileView extends app.BaseView
	el:'#main-area'

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-show-profile') )
		@render()

	render:->
		establishment_data = @model.attributes
		@$el.html @template( m: establishment_data )

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
		console.log "rendering"
		tbody = @$('tbody')
		console.log "tbody is ", tbody
		console.log "self is", @el
		@collection.each (item) ->
			console.log "inserting item:"
			console.log item
			displayView = new app.ProfileRowView model:item
			tbody.append displayView.render().el
			console.log "displayView el", displayView.render().el
		@

class ProfileRowView extends app.BaseView
	tagName: "tr"

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-profile-row') )
		@render()

	render:->
		console.log "rendering"
		console.log @model.attributes.attributes
		@$el.html @template(m: @model.attributes.attributes)
		@$el.attr 'id', @model.id
		@

@app = window.app ? {}
@app.ProfileView = ProfileView
@app.MatchesView = MatchesView
@app.ProfilesView = ProfilesView
@app.ProfileRowView = ProfileRowView