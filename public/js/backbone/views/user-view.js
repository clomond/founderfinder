// Generated by CoffeeScript 1.4.0
(function() {
  var UserProfileFriendView, UserProfileView, _ref,
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  UserProfileView = (function(_super) {

    __extends(UserProfileView, _super);

    function UserProfileView() {
      return UserProfileView.__super__.constructor.apply(this, arguments);
    }

    UserProfileView.prototype.el = '#main-area';

    UserProfileView.prototype.model = app.User;

    UserProfileView.prototype.initialize = function() {
      var self;
      _.bindAll(this, 'render');
      this.template = _.template(app.tpl.get('tpl-user-profile'));
      this.model = new app.User({
        id: 1
      });
      self = this;
      return this.model.fetch({
        success: function(model, response) {
          return self.render();
        }
      });
    };

    UserProfileView.prototype.render = function() {
      var $tbody;
      this.$el.html(this.template({
        model: this.model
      }));
      $tbody = this.$('tbody');
      $tbody.empty();
      this.model.get("potential_users").forEach(function(friend, i) {
        var displayView;
        displayView = new app.UserProfileFriendView({
          model: friend
        });
        return $tbody.append(displayView.render().el);
      });
      return this;
    };

    return UserProfileView;

  })(app.BaseView);

  UserProfileFriendView = (function(_super) {

    __extends(UserProfileFriendView, _super);

    function UserProfileFriendView() {
      return UserProfileFriendView.__super__.constructor.apply(this, arguments);
    }

    UserProfileFriendView.prototype.tagName = 'tr';

    UserProfileFriendView.prototype.render = function() {
      this.$el.html(this.template({
        m: this.model
      }));
      this.$el.attr('id', this.model.id);
      return this;
    };

    UserProfileFriendView.prototype.initialize = function() {
      return this.template = _.template(app.tpl.get('tpl-friend-row'));
    };

    return UserProfileFriendView;

  })(app.BaseView);

  this.app = (_ref = window.app) != null ? _ref : {};

  this.app.UserProfileView = UserProfileView;

  this.app.UserProfileFriendView = UserProfileFriendView;

}).call(this);