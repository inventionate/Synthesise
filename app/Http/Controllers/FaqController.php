<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;
use Synthesise\Http\Requests\FaqRequest;
use Synthesise\Repositories\Facades\Faq as FAQ;
use JavaScript;

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
        //   'store',
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
        $subjects = FAQ::getSubjects();

        $answersByLetter = FAQ::getByLetter($letter);

        JavaScript::put([
            'subjects' => $subjects
        ]);

        return view('faq.index')
                                ->with('answersByLetter', $answersByLetter)
                                ->with('letter', $letter)
                                ->with('letters', $letters)
                                ->with('answers', $answers);
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'subject' => 'required|unique:faqs|alpha',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        $subject = $request->subject;

        $question = $request->question;

        $answer = $request->answer;

        $area = strtoupper(substr($subject,0,1));

        FAQ::store($subject, $question, $answer);

        return redirect()->route('faq', ['letter' => $area]);
    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(FaqRequest $request)
    {

        $id = $request->id;

        $title = $request->title;

        $answer = $request->answer;

        FAQ::update($id, $title, $answer);

    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        FAQ::destroy($id);

        return back()->withInput();
    }
}
