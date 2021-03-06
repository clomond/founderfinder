// Generated by CoffeeScript 1.4.0
(function() {
  var HeaderView, _ref,
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  HeaderView = (function(_super) {

    __extends(HeaderView, _super);

    function HeaderView() {
      return HeaderView.__super__.constructor.apply(this, arguments);
    }

    HeaderView.prototype.el = '#header-area';

    HeaderView.prototype.events = {
      'login': 'render'
    };

    HeaderView.prototype.initialize = function() {
      _.bindAll(this, 'render');
      app.currentUser.bind('login', this.render);
      this.template = _.template(app.tpl.get('tpl-header'));
      return this.render();
    };

    HeaderView.prototype.render = function() {
      this.$el.html(this.template({
        currentUser: app.currentUser.toJSON()
      }));
      return this;
    };

    return HeaderView;

  })(app.BaseView);

  this.app = (_ref = window.app) != null ? _ref : {};

  this.app.HeaderView = HeaderView;

}).call(this);
