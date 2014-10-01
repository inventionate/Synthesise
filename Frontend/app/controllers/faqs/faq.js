import Ember from 'ember';

export default Ember.ObjectController.extend({

  htmlAnswer: function() {
    return Ember.String.htmlSafe(this.get('answer'));
  }.property('answer')

});
