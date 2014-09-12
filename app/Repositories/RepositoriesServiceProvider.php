<?php namespace Synthesise\Repositories;

use Illuminate\Support\ServiceProvider;

use Synthesise\Faq;
use Synthesise\Repositories\Faq\FaqRepository;

use Synthesise\Note;
use Synthesise\Repositories\Note\NoteRepository;

use Synthesise\Video;
use Synthesise\Repositories\Video\VideoRepository;

use Synthesise\User;
use Synthesise\Repositories\User\UserRepository;

class RepositoriesServiceProvider extends ServiceProvider {

  public function register()
  {

    $this->app->bind('faq', function()
    {
      return new FaqRepository(new Faq());
    });

    $this->app->bind('note', function()
    {
      return new NoteRepository(new Note());
    });

    $this->app->bind('video', function()
    {
      return new VideoRepository(new Video());
    });

    $this->app->bind('user', function()
    {
      return new UserRepository(new User());
    });

  }

}
