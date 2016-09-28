<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

use Seminar;
use Lection;
use User;
use FAQ;
use JavaScript;

class SeminarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
	 * List Seminar.
	 *
	 * @return View
	 */
	public function index($name)
	{

        // Get authorized users.
		$authorized_editors = Seminar::getAuthorizedEditors($name);

        // Get all messages.
        $messages = Seminar::getAllMessages($name);

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        // Get all lections.
        $lections = Seminar::getAllLections($name);

        // Get current lection.
        $current_lection = Seminar::getCurrentLection($name);

        // Get current paper.
        $current_paper = Seminar::getCurrentPaper($name);

		return view('seminar.index')
                                    ->with('seminar_name', $name)
                                    ->with('authorized_editors', $authorized_editors)
                                    ->with('messages', $messages)
                                    ->with('sections', $sections)
                                    ->with('lections', $lections)
                                    ->with('current_lection', $current_lection)
                                    ->with('current_lection_paper', $current_paper);
	}

    /**
     * Store a newly created Seminar.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {

        // Validation
        $this->validate($request, [
            'title' => 'required|string',
            'author' => 'required|string',
            'subject' => 'required|string',
            'module' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
            'authorized_users' => 'array'
        ]);

        $title = $request->title;
        $author = $request->author;
        $subject = $request->subject;
        $module = $request->module;
        $description = $request->description;
        $image = $request->file('image');
        $available_from = $request->available_from;
        $available_to = $request->available_to;
        $authorized_users = $request->authorized_users;

        Seminar::store($title, $author, $subject, $module, $description, $image, $available_from, $available_to, $authorized_users);

        return back()->withInput();

    }

    /**
     * Update a Seminar.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function update(Request $request, $name)
    {

        // Validation
        $this->validate($request, [
            'author' => 'required|string',
            'subject' => 'required|string',
            'module' => 'required|string',
            'description' => 'required|string',
            'image' => 'image',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
        ]);

        $title = $name;
        $author = $request->author;
        $subject = $request->subject;
        $module = $request->module;
        $description = $request->description;
        $image = $request->file('image');
        $available_from = $request->available_from;
        $available_to = $request->available_to;

        Seminar::update($title, $author, $subject, $module, $description, $image, $available_from, $available_to);

        return back()->withInput();

    }

    /**
     * Deletes seminar.
     *
     * @return Redirect
     */
    public function destroy($name)
    {

        Seminar::delete($name);

        return redirect('/')->withInput();
    }

    /**
     * Users view.
     *
     * @return View
     */
    public function users($name)
    {

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        $admins = Seminar::getAllUsersByRole($name, 'Admin');

        $teachers = Seminar::getAllUsersByRole($name, 'Teacher');

        $mentors = Seminar::getAllUsersByRole($name, 'Mentor');

        $students = Seminar::getAllUsersByRole($name, 'Student');

        return view('seminar.users.index')
                                    ->with('seminar_name', $name)
                                    ->with('sections', $sections)
                                    ->with('admins', $admins)
                                    ->with('teachers', $teachers)
                                    ->with('mentors', $mentors)
                                    ->with('students', $students);
    }

    /**
     * List seminar settings.
     *
     * @param int $id
     *
     * @return View
     */
    public function settings($name)
    {

        // Get Seminar.
        $seminar = Seminar::get($name);

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        return view('seminar.settings')
                                    ->with('seminar_name', $name)
                                    ->with('seminar', $seminar)
                                    ->with('sections', $sections);
    }

    /**
     * List all FAQs.
     * @info:   Use parameters for filter and search the list in strict REST!
     *
     * @param string $letter
     *
     * @return View
     */
    public function faqs($name, $letter = null)
    {

        // Get Seminar name
        $seminar_name = $name;

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        // Get all FAQs.
        $answers = FAQ::getAll();

        // Get all FAQ letters.
        $letters = FAQ::getLetters();

        // Get all FAQ subjects.
        $subjects = FAQ::getSubjects();

        // Get all Subjects by letter.
        $answersByLetter = FAQ::getByLetter($letter);

        // Push subjetcs to JavaScript.
        JavaScript::put([
            'subjects' => $subjects
        ]);

        return view('seminar.faq.index')
                                ->with('seminar_name', $seminar_name)
                                ->with('sections', $sections)
                                ->with('answersByLetter', $answersByLetter)
                                ->with('letter', $letter)
                                ->with('letters', $letters)
                                ->with('answers', $answers);
    }

}
