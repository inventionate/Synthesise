<div class="required field">
    <label for="faq_subject" class="hide">Fragestichwort</label>
    <input id="faq_subject" type="text" name="subject" placeholder="Bitte geben Sie einen Titel ein.">
</div>

<div class="required field">
    <label for="faq_question" class="hide">Frage</label>
    <input id="faq_question" name="question" placeholder="Bitte geben Sie eine Frage ein."></input>
</div>

<div class="required field">
    <label for="faq_answer" class="hide">Antwort</label>
    <textarea id="faq_answer" class="faq-wysiwyg" name="answer" placeholder="Bitte geben Sie ein Antwort ein."></textarea>
</div>

<div class="hide field">
    <label for="faq_seminar_name" class="hide">Seminarname</label>
    <input id="faq_seminar_name" type="text" name="seminar_name" value="{{ $seminar_name }}">
</div>
