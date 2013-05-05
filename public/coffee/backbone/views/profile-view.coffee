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

class ProfilesView extends app.BaseView
	el: "#main-area"

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-profiles') )
		@render()

	render:->
		tbody = @$('ul')
		@collection.each (item) ->
			displayView = new app.ProfileRowView model:item
			tbody.append displayView.render().el
		@

class ProfileRowView extends app.BaseView

	initialize:->
		_.bindAll(this,'render')
		@template = _.template( app.tpl.get('tpl-profile-row') )
		@render()

	render:->
		@$el.html @template(m: @model.toJSON())
		@$el.attr 'id', @model.id
		@

@app = window.app ? {}
@app.ProfileView = ProfileView
@app.ProfilesView = ProfilesView
@app.ProfileRowView = ProfileRowView