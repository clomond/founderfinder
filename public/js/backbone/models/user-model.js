// Generated by CoffeeScript 1.4.0
(function() {
  var User, currentUser, _ref,
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  User = (function(_super) {

    __extends(User, _super);

    function User() {
      return User.__super__.constructor.apply(this, arguments);
    }

    User.prototype.urlRoot = 'api/user';

    User.prototype.defaults = {
      username: '',
      email: '',
      establishments: '',
      friends: '[]',
      potential_users: '[]'
    };

    return User;

  })(app.BaseModel);

  currentUser = (function(_super) {

    __extends(currentUser, _super);

    function currentUser() {
      return currentUser.__super__.constructor.apply(this, arguments);
    }

    currentUser.prototype.url = 'api/user/current';

    return currentUser;

  })(User);

  this.app = (_ref = window.app) != null ? _ref : {};

  this.app.User = User;

  this.app.currentUser = currentUser;

}).call(this);