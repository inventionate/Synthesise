<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;
use Synthesise\Http\Requests\FaqRequest;
use Synthesise\Repositories\Facades\Faq as FAQ;

class FaqController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin', ['only' => [
          'store',
          'update',
          'destroy'
      ]]);

    }

    /**
     * List all FAQs.
     * @info:   Use parameters for filter and search the list in strict REST!
     *
     * @param string $letter
     *
     * @return View
     */
    public function index($letter = null)
    {
        $answers = FAQ::getAll();
        $letters = FAQ::getLetters();

        $answersByLetter = FAQ::getByLetter($letter);

        return view('faq.index')
                                ->with('answersByLetter', $answersByLetter)
                                ->with('letter', $letter)
                                ->with('letters', $letters)
                                ->with('answers', $answers);
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @return Response
     */
    public function store(FaqRequest $request)
    {
        $title = $request->title;

        $content = $request->content;

        FAQ::store($title, $content);
    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, FaqRequest $request)
    {
        $title = $request->title;

        $content = $request->content;

        $colour = $request->colour;

        FAQ::update($id, $title, $content, $colour);

        // Hier ein spezielles View öffnen, das ein entsprechendes Formular beinhalted.
        // Dieser View hat dann eine post funktion.
        //

    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        //Message::delete($id);
        dd("cool!");
    }
}
