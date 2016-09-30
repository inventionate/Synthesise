$table->increments('id');
$table->string('name', 128);
$table->string('author', 128);
$table->string('contact', 32);
$table->text('authorized_editors');
$table->text('image_path');
$table->date('available_from');
$table->date('available_to');
$table->timestamps();



{{-- <div class="hide field">
    <label for="faq_seminar_name" class="hide">Seminarname</label>
    <input id="faq_seminar_name" type="text" name="seminar_name" value="{{ $seminar_name }}">
</div> --}}
