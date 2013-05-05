class BaseModel extends Backbone.Model
	dump:->
		console.log JSON.stringify(@)
		
class BaseCollection extends Backbone.Collection
	dump:->
		console.log JSON.stringify(@)
		
class BaseView extends Backbone.View
	
class BaseRouter extends Backbone.Router
	
@app = window.app ? {}
@app.BaseModel = BaseModel
@app.BaseCollection = BaseCollection
@app.BaseView = BaseView
@app.BaseRouter = BaseRouter

tpl =
  
  # Hash of preloaded templates for the app
  templates: {}
  
  # Recursively pre-load all the templates for the app.
  # This implementation should be changed in a production environment. All the template files should be
  # concatenated in a single file.
  loadTemplates: (names, callback) ->
    that = this
    loadTemplate = (index) ->
      name = names[index]
      console.log "Loading template: " + name
      $.get "../templates/" + name + ".html", (data) ->
        that.templates[name] = data
        index++
        if index < names.length
          loadTemplate index
        else
          callback()


    loadTemplate 0

  
  # Get template by name from hash of preloaded templates
  get: (name) ->
    @templates[name]

@app.tpl = tpl