<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;
use FAQ;

class FaqController extends Controller
{

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware(['auth', 'admin.teacher']);
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'seminar_name' => 'required|string',
            'subject' => 'required|unique:faqs|string',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        $seminar_name = $request->seminar_name;

        $subject = $request->subject;

        $question = $request->question;

        $answer = $request->answer;

        $faq = FAQ::store($seminar_name, $subject, $question, $answer);

        $area = strtoupper(substr($subject,0,1));

        return redirect()->route('seminar-faqs', ['name' => $seminar_name,'letter' => $area]);

    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function update($id, Request $request)
    {

        // Validation
        $this->validate($request, [
            'seminar_name' => 'required|string',
            'subject' => 'required|string',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        $seminar_name = $request->seminar_name;

        $subject = $request->subject;

        $question = $request->question;

        $answer = $request->answer;

        FAQ::update($id, $subject, $question, $answer);

        $area = strtoupper(substr($subject,0,1));

        return redirect()->route('seminar-faqs', ['name' => $seminar_name, 'letter' => $area]);

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
        FAQ::delete($id);

        return back()->withInput();
    }
}
