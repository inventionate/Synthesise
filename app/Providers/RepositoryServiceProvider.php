<?php

namespace Synthesise\Providers;

use Illuminate\Support\ServiceProvider;
use Synthesise\Faq;
use Synthesise\Repositories\Faq\FaqRepository;
use Synthesise\Lection;
use Synthesise\Repositories\Lection\LectionRepository;
use Synthesise\Message;
use Synthesise\Repositories\Message\MessageRepository;
use Synthesise\Note;
use Synthesise\Repositories\Note\NoteRepository;
use Synthesise\Section;
use Synthesise\Repositories\Video\SectionRepository;
use Synthesise\Seminar;
use Synthesise\Repositories\Video\SeminarRepository;
use Synthesise\Sequence;
use Synthesise\Repositories\Video\SequenceRepository;
use Synthesise\User;
use Synthesise\Repositories\User\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('faq', function () {
            return new FaqRepository(new Faq());
        });

        $this->app->bind('lection', function () {
            return new LectionRepository(new Lection());
        });

        $this->app->bind('message', function () {
            return new MessageRepository(new Message());
        });

        $this->app->bind('note', function () {
            return new NoteRepository(new Note());
        });

        $this->app->bind('section', function () {
            return new SectionRepository(new Section());
        });

        $this->app->bind('seminar', function () {
            return new SeminarRepository(new Seminar());
        });

        $this->app->bind('sequence', function () {
            return new SequenceRepository(new Sequence());
        });

        $this->app->bind('user', function () {
            return new UserRepository(new User());
        });

    }
}
