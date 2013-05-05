// Generated by CoffeeScript 1.4.0
(function() {
  var tpl;

  tpl = {
    templates: {},
    loadTemplates: function(names, callback) {
      var loadTemplate, that;
      that = this;
      loadTemplate = function(index) {
        var name;
        name = names[index];
        console.log("Loading template: " + name);
        return $.get("../templates/" + name + ".html", function(data) {
          that.templates[name] = data;
          index++;
          if (index < names.length) {
            return loadTemplate(index);
          } else {
            return callback();
          }
        });
      };
      return loadTemplate(0);
    },
    get: function(name) {
      return this.templates[name];
    }
  };

}).call(this);
