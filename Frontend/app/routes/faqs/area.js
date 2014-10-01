import Ember from 'ember';

export default Ember.Route.extend({
  model: function(params) {
    return this.modelFor('faqs').filterBy('area',params.area);
  }
});
