<div class="required field">
    <label for="subject" class="hide">Fragestichwort</label>
    <input type="text" name="subject" placeholder="Bitte geben Sie einen Titel ein." ref="subject">
</div>

<div class="required field">
    <label for="question" class="hide">Frage</label>
    <input name="question" placeholder="Bitte geben Sie eine Frage ein." ref="question"></input>
</div>

<div class="required field">
    <label for="answer" class="hide">Antwort</label>
    <textarea class="faq-wysiwyg" name="answer" placeholder="Bitte geben Sie ein Antwort ein." ref="answer"></textarea>
</div>

<div class="hide field">
    <label for="seminar_name" class="hide">Seminarname</label>
    <input type="text" name="seminar_name" ref="seminar_name" value="{{ $seminar_name }}">
</div>
