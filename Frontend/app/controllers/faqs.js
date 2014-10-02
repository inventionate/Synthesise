import Ember from 'ember';

export default Ember.ArrayController.extend({
  sortProperties: ['area'],

  sortAscending: true,

  areas: function(){
    return this.getEach('area');
  }.property("@each.area"),

  unique_areas: Ember.computed.uniq('areas')

});
