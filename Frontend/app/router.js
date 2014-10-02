import Ember from 'ember';
import config from './config/environment';

var Router = Ember.Router.extend({
  location: config.locationType
});


Router.map(function() {
  this.resource('lections', function() {
    this.route('videoname', {path: '/:videoname'});
  });
  this.resource('faqs', function() {
    this.route('area', {path: '/:area'});
  });
  this.resource('contact');
  this.route('imprint');
});

export default Router;
