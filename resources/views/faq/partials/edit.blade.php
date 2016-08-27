<form role="form" method="POST" action="{{ url('faq') }}" id="faq-edit-modal" class="ui modal form faq-validator">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <div class="header">
        »Häufig gestellte Frage« bearbeiten
    </div>

    <div class="content">

        @include('faq.partials.formfields')

    </div>
    <div class="actions">
        <div class="ui black cancel button">
            Abbrechen
        </div>

        <div class="ui right green labeled icon submit button">
            Speichern
            <i class="checkmark icon"></i>
        </div>
    </div>

</form>
