<form role="form" method="POST" action="{{ url('faq') }}" id="faq-edit-modal" class="ui modal form faq-edit-validator">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        »Häufig gestellte Frage« bearbeiten
    </div>

    <div class="content">

        @include('seminar.faqs.formfields')

    </div>
    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled icon submit button">
            Aktualisieren
            <i class="checkmark icon"></i>
        </div>
    </div>

</form>
