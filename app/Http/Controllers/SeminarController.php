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

        // Get Disqus shortname.
        $disqus_shortname = Seminar::getDisqusShortname($name);

        // Push Disqus shortname to JavaScript.
        JavaScript::put([
            'disqus_shortname' => $disqus_shortname
        ]);

        // Get Disqus.

        $disqus = $disqus_shortname !== null;

		return view('seminar.index')
                                    ->with('seminar_name', $name)
                                    ->with('authorized_editors', $authorized_editors)
                                    ->with('messages', $messages)
                                    ->with('sections', $sections)
                                    ->with('lections', $lections)
                                    ->with('current_lection', $current_lection)
                                    ->with('current_lection_paper', $current_paper)
                                    ->with('disqus', $disqus);
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
            'contact' => 'required|email',
            'subject' => 'required|string',
            'module' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
            'authorized_users' => 'array',
            'disqus_shortname' => 'string'
        ]);

        $title = $request->title;
        $author = $request->author;
        $contact = $request->contact;
        $subject = $request->subject;
        $module = $request->module;
        $description = $request->description;
        $image = $request->file('image');
        $available_from = $request->available_from;
        $available_to = $request->available_to;
        $authorized_users = $request->authorized_users;
        $disqus_shortname = $request->disqus_shortname;

        Seminar::store($title, $author, $contact, $subject, $module, $description, $image, $available_from, $available_to, $authorized_users, $disqus_shortname);

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
            'contact' => 'required|email',
            'subject' => 'required|string',
            'module' => 'required|string',
            'description' => 'required|string',
            'image' => 'image',
            'available_from' => 'required|date',
            'available_to' => 'required|date',
            'disqus_shortname' => 'string'
        ]);

        $title = $name;
        $author = $request->author;
        $contact = $request->contact;
        $subject = $request->subject;
        $module = $request->module;
        $description = $request->description;
        $image = $request->file('image');
        $available_from = $request->available_from;
        $available_to = $request->available_to;
        $disqus_shortname = $request->disqus_shortname;

        Seminar::update($title, $author, $contact, $subject, $module, $description, $image, $available_from, $available_to, $disqus_shortname);

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
     *
     * @param string $name
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

        return view('seminar.faqs.index')
                                ->with('seminar_name', $seminar_name)
                                ->with('sections', $sections)
                                ->with('answersByLetter', $answersByLetter)
                                ->with('letter', $letter)
                                ->with('letters', $letters)
                                ->with('answers', $answers);
    }

    /**
	 * Show seminar contact forms.
	 *
     * @param string $name
     *
	 * @return View
	 */
	public function contact($name)
	{

        // Get seminar name
        $seminar_name = $name;

        // Get seminar author.
        $author = Seminar::getAuthor($name);

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        // Get feedback mail.
        $feedback_mail = Seminar::getFeedbackMail($name);

        // Get feedback mail.
        $lection_authors = Seminar::getAllLectionAuthors($name);

        // Get support mail.
        $support_mail = 'mundt@ph-kalrsruhe.de';

		return view('seminar.contact')
                            ->with('seminar_name', $seminar_name)
                            ->with('sections', $sections)
                            ->with('author', $author)
                            ->with('lection_authors', $lection_authors)
                            ->with('feedback_mail', $feedback_mail)
                            ->with('support_mail', $support_mail);
	}

}
