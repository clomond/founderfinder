// Generated by CoffeeScript 1.4.0
(function() {
  var FounderFinderRouter, _ref,
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  FounderFinderRouter = (function(_super) {

    __extends(FounderFinderRouter, _super);

    function FounderFinderRouter() {
      return FounderFinderRouter.__super__.constructor.apply(this, arguments);
    }

    FounderFinderRouter.prototype.routes = {
      '': 'login',
      'login': 'login',
      'edit_profile': 'editProfile',
      'profile/:id': 'showProfile',
      'profiles': 'profileList'
    };

    FounderFinderRouter.prototype.login = function() {
      var loginView;
      return loginView = new app.LoginView;
    };

    FounderFinderRouter.prototype.showProfile = function(id) {
      var profile;
      console.log("about to get profile");
      profile = new app.Profile({
        id: id
      });
      console.log("show this profile" + id);
      return profile.fetch({
        success: function(model, response) {
          return this.profileView = new app.ProfileView({
            model: profile
          });
        }
      });
    };

    FounderFinderRouter.prototype.editProfile = function() {
      var loginView;
      return loginView = new app.LoginView;
    };

    FounderFinderRouter.prototype.profileList = function() {
      this.profileCollection = new app.ProfileCollection;
      return this.profileCollection.fetch({
        success: function(model, response) {
          return this.profilesView = new app.ProfilesView({
            collection: model
          });
        }
      });
    };

    FounderFinderRouter.prototype.initialize = function() {
      var currentUser;
      currentUser = new app.currentUser;
      return currentUser.fetch({
        success: function(model, response) {
          app.currentUser = model;
          return this.headerView = new app.HeaderView({
            model: model
          });
        }
      });
    };

    return FounderFinderRouter;

  })(app.BaseRouter);

  this.app = (_ref = window.app) != null ? _ref : {};

  this.app.FounderFinderRouter = FounderFinderRouter;

  app.tpl.loadTemplates(["tpl-header", "tpl-profile-row", "tpl-login", "tpl-home", "tpl-show-profile", "tpl-profiles"], function() {
    return jQuery(function() {
      app.locausRouter = new app.FounderFinderRouter;
      return Backbone.history.start();
    });
  });

}).call(this);