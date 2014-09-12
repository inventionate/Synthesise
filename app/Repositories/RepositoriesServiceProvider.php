<?php namespace Synthesise\Repositories;

use Synthesise\Faq;
use Synthesise\Repositories\Faq\FaqRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider {

  public function register()
  {

    $this->app->bind('faq', function()
    {

      return new FaqRepository(new Faq());

    });

  }

}
