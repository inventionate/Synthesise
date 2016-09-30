$table->increments('id');
$table->string('name', 128);
$table->text('further_reading_path');
$table->string('seminar_name', 256);
$table->timestamps()
