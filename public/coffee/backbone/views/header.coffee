class HeaderView extends app.BaseView
	el:'#header-area'
	events:
		'login':'render'

	initialize:->
		_.bindAll(this, 'render')
		app.currentUser.bind('login',@render)
		@template = _.template( app.tpl.get('tpl-header') )
		@render()

	render:->
		@$el.html @template(currentUser: app.currentUser.toJSON())
		@



@app = window.app ? {}
@app.HeaderView = HeaderView
		
