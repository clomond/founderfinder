class UserProfileView extends app.BaseView
	el:'#main-area'
	model: app.User
	
	initialize:->
		_.bindAll(this,'render')
		@template = _.template(app.tpl.get('tpl-user-profile'))
		@model = new app.User(id: 1)
		self = @
		@model.fetch
			success: (model, response) ->
				self.render()

	render:->
		@$el.html @template(model: @model)
		$tbody = @$('tbody')
		$tbody.empty()
		@model.get("potential_users").forEach (friend, i) ->
			displayView = new app.UserProfileFriendView model:friend
			$tbody.append displayView.render().el
		@

class UserProfileFriendView extends app.BaseView
	tagName: 'tr'

	render:->
		@$el.html @template(m: @model)
		@$el.attr 'id', @model.id
		@
		
	initialize:->
		@template = _.template(app.tpl.get('tpl-friend-row'))


@app = window.app ? {}
@app.UserProfileView = UserProfileView
@app.UserProfileFriendView = UserProfileFriendView