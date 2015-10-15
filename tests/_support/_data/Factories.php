<?php

namespace _data;

trait Factories
{
    /**
     * Test Dummy "Nutzer" definieren.
     *
     * @var array
     */
    public static $userAttributes =
        [
            'id' => 1,
            'username' => 'vturner',
            'password' => 'Betwixt',
            'firstname' => 'Victor',
            'lastname' => 'Turner',
            'email' => 'bourdieu@edu.fr',
            'role' => 'Student',
            'remember_token' => null,
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];

    /**
     * Test Dummy "Note" definieren.
     *
     * @var array
     */
    public static $noteAttributes =
        [
            'id' => 1,
            'note' => 'Lorem ipsum…',
            'user_id' => 1,
            'cuepoint_id' => 1,
            'video_videoname' => 'Sozialgeschichte 1',
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];

    /**
     * Test Dummy "Cuepoint" definieren.
     *
     * @var array
     */
    public static $cuepointAttributes =
        [
            'id' => 1,
            'cuepoint' => 1,
            'video_videoname' => 'Sozialgeschichte 1',
            'video_sequence_id' => 1,
            'content' => 'Lorem ipsum…',
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];

    /**
     * Test Dummy "FAQ" definieren.
     *
     * @var array
     */
    public static $faqAttributes =
        [
            'id' => 1,
            'area' => 'A',
            'subject' => 'Allgemeine Fragen',
            'question' => 'Wo geht die Sonne auf?',
            'answer' => 'Im Morgenland.',
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];

    /**
     * Test Dummy "Video" definieren.
     *
     * @var array
     */
    public static $videoAttributes =
        [
            'id' => 1,
            'videoname' => '9 Leben!',
            'section' => 'Dokumentarfilm',
            'author' => 'Paul Hewson',
            'online' => true,
            'sequence_id' => 1,
            'sequence_name' => null,
            'available_from' => '2014-09-17',
            'available_to' => '2014-09-17',
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];

    /**
     * Test Dummy "Paper" definieren.
     *
     * @var array
     */
    public static $paperAttributes =
        [
            'id' => 1,
            'papername' => 'Zeit-Raum Studium',
            'author' => 'Fabian Mundt',
            'video_videoname' => 'Studentische Leben',
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];

    /**
     * Test Dummy "Message" definieren.
     *
     * @var array
     */
    public static $messageAttributes =
        [
            'id' => 1,
            'title' => 'Das ist ein IT',
            'content' => 'Sie führen einen Integration Test durch!',
            'colour' => 'green',
            'created_at' => '2014-09-17 17:00:00',
            'updated_at' => '2014-09-17 17:00:00',
        ];
}
