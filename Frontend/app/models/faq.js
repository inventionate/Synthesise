import DS from 'ember-data';

var Faq = DS.Model.extend({
  area: DS.attr('string'),
  subject: DS.attr('string'),
  question: DS.attr('string'),
  answer: DS.attr('string'),

  hrefId: function() {
    return '#' + this.get('id');
  }.property('id')

});


Faq.reopenClass({
  FIXTURES: [
    {
      id: 0,
      area: 'A',
      subject: 'Aula',
      question: 'Was ist mit der Aula los?',
      answer: 'Die wird restauriert.'
    },
    {
      id: 1,
      area: 'Z',
      subject: 'Zula',
      question: 'Was muss ich da schreiben?',
      answer: 'Viel wirres Zeug!'
    },
    {
      id: 2,
      area: 'T',
      subject: 'Träume',
      question: 'Was sind Träume?',
      answer: 'Fragen wir besser S. Freud.'
    },
    {
      id: 3,
      area: 'Z',
      subject: 'Zebra',
      question: 'Was ist ein Zebra?',
      answer: 'Ein dichotomes Tier.'
    },
    {
      id: 4,
      area: 'A',
      subject: 'Amir',
      question: 'Wo liegt das?',
      answer: 'Im Kopf.'
    },
    {
      id: 5,
      area: 'B',
      subject: 'Brot',
      question: 'Ist das essbar?',
      answer: 'Definitiv.'
    }
  ]
});

export default Faq;
