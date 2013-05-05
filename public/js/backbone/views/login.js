// Generated by CoffeeScript 1.4.0
(function() {
  var LoginView, _ref,
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  LoginView = (function(_super) {

    __extends(LoginView, _super);

    function LoginView() {
      return LoginView.__super__.constructor.apply(this, arguments);
    }

    LoginView.prototype.el = '#main-area';

    LoginView.prototype.events = {
      "click #loginButton": "login",
      "click #createButton": "create"
    };

    LoginView.prototype.initialize = function() {
      _.bindAll(this, 'render', 'login', 'create');
      this.template = _.template(app.tpl.get('tpl-login'));
      return this.render();
    };

    LoginView.prototype.render = function() {
      console.log("trying to load the login view");
      this.$el.html(this.template());
      return this;
    };

    LoginView.prototype.login = function(e) {
      var formValues, url;
      event.preventDefault();
      $(".alert-error").hide();
      url = "api/user/login";
      formValues = {
        username: $("#inputUsername").val(),
        password: $("#inputPassword").val()
      };
      $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: formValues,
        success: function(data) {
          if (data.error) {
            return $(".alert-error").text(data.error.text).show();
          } else {
            app.currentUser.attributes = data;
            app.currentUser.trigger("login");
            return window.location.replace("#");
          }
        }
      });
      return this.trigger("login");
    };

    LoginView.prototype.create = function(e) {
      var formValues, url;
      event.preventDefault();
      $(".alert-error").hide();
      url = "api/user/create";
      formValues = {
        username: $("#inputCreateUsername").val(),
        email: $("#inputCreateEmail").val(),
        password: $("#inputCreatePassword").val(),
        password_confirmation: $("#inputCreatePasswordConfirmation").val()
      };
      $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: formValues,
        success: function(data) {
          if (data.error) {
            return $(".alert-error").text(data.error.text).show();
          } else {
            app.currentUser.attributes = data.attributes;
            app.currentUser.trigger("login");
            return window.location.replace("#");
          }
        }
      });
      return this.trigger("login");
    };

    return LoginView;

  })(app.BaseView);

  this.app = (_ref = window.app) != null ? _ref : {};

  this.app.LoginView = LoginView;

}).call(this);
