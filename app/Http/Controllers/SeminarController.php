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

        $this->middleware('admin.teacher')->only(['store', 'update', 'destroy', 'destroyDocument']);
    }

    /**
	 * List Seminar.
	 *
	 * @return View
	 */
	public function show($name)
	{

        // Get Seminar.
        $seminar = Seminar::get($name);

        // Get authorized users.
		$authorized_editors = Seminar::getAuthorizedEditors($name);

        // Get all messages.
        $messages = Seminar::getAllMessages($name);

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        // Get all seminar lections.
        $lections = Seminar::getAllLections($name);

        // Get all existing lections.
        $all_lections = Lection::getAllNotAttached($name);

        // Get current lection.
        $current_lection = Seminar::getCurrentLection($name);

        // Get current paper.
        $current_paper = Seminar::getCurrentPaper($name);

        // Get Disqus shortname.
        $disqus_shortname = Seminar::getDisqusShortname($name);

        // Get all infoblocks
        $infoblocks = Seminar::getAllInfoblocks($name);

        // Get teachers by seminar.
		$teachers = Seminar::getAllUsers($name, 'Teacher');

        // Get teachers by seminar.
		$admins = User::getAllByRole('Admin')->pluck('username');

        // Get Disqus.
        $disqus = ( $disqus_shortname !== null );

        // Push Disqus shortname to JavaScript.
        JavaScript::put([
            'disqus_shortname' => $disqus_shortname,
            'admins' => $admins
        ]);

		return view('seminar.show')
                                    ->with('seminar_name', $name)
                                    ->with('seminar', $seminar)
                                    ->with('authorized_editors', $authorized_editors)
                                    ->with('messages', $messages)
                                    ->with('sections', $sections)
                                    ->with('lections', $lections)
                                    ->with('all_lections', $all_lections)
                                    ->with('current_lection', $current_lection)
                                    ->with('current_lection_paper', $current_paper)
                                    ->with('disqus', $disqus)
                                    ->with('infoblocks', $infoblocks)
                                    ->with('teachers', $teachers);
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
        $info_intro = NULL;
        $info_lections = NULL;
        $info_texts = NULL;
        $info_exam = NULL;
        $info = NULL;
        $available_from = $request->available_from;
        $available_to = $request->available_to;
        $authorized_users = $request->authorized_users;
        $disqus_shortname = $request->disqus_shortname;

        Seminar::store($title, $author, $contact, $subject, $module, $description, $image, $info_intro, $info_lections, $info_texts, $info_exam, $info, $available_from, $available_to, $authorized_users, $disqus_shortname);

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
            'info_intro' => 'string',
            'info_lections' => 'string',
            'info_texts' => 'string',
            'info_exam' => 'string',
            'info' => 'file',
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
        $info_intro = $request->info_intro;
        $info_lections = $request->info_lections;
        $info_texts = $request->info_texts;
        $info_exam = $request->info_exam;
        $info = $request->file('info');;
        $available_from = $request->available_from;
        $available_to = $request->available_to;
        $disqus_shortname = $request->disqus_shortname;

        Seminar::update($title, $author, $contact, $subject, $module, $description, $image, $info_intro, $info_lections, $info_texts, $info_exam, $info, $available_from, $available_to, $disqus_shortname);

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
     * Deletes seminars info document.
     *
     * @return Redirect
     */
    public function destroyDocument($name)
    {

        Seminar::deleteDocument($name);

        return back()->withInput();
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

        // Get all existing lections.
        $all_lections = Lection::getAllNotAttached($name);

        return view('seminar.users.index')
                                    ->with('seminar_name', $name)
                                    ->with('sections', $sections)
                                    ->with('admins', $admins)
                                    ->with('teachers', $teachers)
                                    ->with('mentors', $mentors)
                                    ->with('students', $students)
                                    ->with('all_lections', $all_lections);
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

        // Get teachers by seminar.
		$teachers = Seminar::getAllUsers($name, 'Teacher');

        // Get all existing lections.
        $all_lections = Lection::getAllNotAttached($name);

        return view('seminar.settings')
                                    ->with('seminar_name', $name)
                                    ->with('seminar', $seminar)
                                    ->with('sections', $sections)
                                    ->with('teachers', $teachers)
                                    ->with('all_lections', $all_lections);
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

        // Get teachers by seminar.
		$teachers = Seminar::getAllUsers($name, 'Teacher');

        // Get all existing lections.
        $all_lections = Lection::getAllNotAttached($name);

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
                                ->with('answers', $answers)
                                ->with('teachers', $teachers)
                                ->with('all_lections', $all_lections);
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

        // Get teachers by seminar.
		$teachers = Seminar::getAllUsers($name, 'Teacher');

        // Get all existing lections.
        $all_lections = Lection::getAllNotAttached($name);

		return view('seminar.contact')
                            ->with('seminar_name', $seminar_name)
                            ->with('sections', $sections)
                            ->with('author', $author)
                            ->with('lection_authors', $lection_authors)
                            ->with('feedback_mail', $feedback_mail)
                            ->with('support_mail', $support_mail)
                            ->with('teachers', $teachers)
                            ->with('all_lections', $all_lections);
	}

    /**
     * Show online-lection.
     *
     * @param string    $name
     * @param string    $lection_name
     * @param string    $videoname
     *
     * @return View
     */
    public function lection($name, $lection_name, $sequence)
    {
        // Gruppenzugehörigkeit des Videos abfragen
        $section = Lection::getSection($lection_name, $name);

        // Get all sections.
        $sections = Seminar::getAllSections($name);

        // Get all seminar lections.
        $lections = Seminar::getAllLections($name);

        // Angehängte Texte abfragen
        $paper = true;#Lection::getPaper($lection_name);

        // Verfügbarkeit des Videos abfragen
        $available_all_authorized = ( Lection::available($lection_name, $name) || Seminar::authorizedEditor($name) || Seminar::authorizedMentor($name) );

        $sequence_count = Lection::getSequenceCount($lection_name);

        $sequence_count_spelled = Lection::getSequenceCountSpelled($lection_name);

        $sequences = Lection::getSequences($lection_name);


        // Position der Cuepoints abfragen
        // $cuepoints = Sequence::getCuepoints($lection_name, $sequence);

        // Alle Videos abfragen
        // $videos = Video::getVideos();

        // Videopfad generieren
        // @todo Hier eine Abfrage, je nach Gerät (Qualität automatisch festlegen)
        // $videopath = '/video/'.Parser::normalizeName($videoname).'_'.$sequenceNumber;

        // Marker generieren
        // $markers = Video::getMarkers($videoname, $sequenceNumber);

        // Get teachers by seminar.
		$teachers = Seminar::getAllUsers($name, 'Teacher');

        // Get teachers by seminar.
		$admins = User::getAllByRole('Admin')->pluck('username');

        // Get all existing lections.
        $all_lections = Lection::getAllNotAttached($name);

        // Get Disqus shortname.
        $disqus_shortname = Seminar::getDisqusShortname($name);

        // Get Disqus.
        $disqus = ( $disqus_shortname !== null );

        // Push Disqus shortname to JavaScript.
        JavaScript::put([
            'disqus_shortname' => $disqus_shortname,
            'admins' => $admins
        ]);

        // Standardausgabe VIEW -----------------------------------------
        return view('seminar.lections.show')
                            ->with('lection_name', $lection_name)
                            ->with('available_all_authorized', $available_all_authorized)
                            // ->with('cuepoints', $cuepoints
                            ->with('section', $section)
                            ->with('sections', $sections)
                            ->with('lections', $lections)
                            ->with('lections', $disqus)
                            ->with('paper', $paper)
                            ->with('seminar_name', $name)
                            ->with('teachers', $teachers)
                            ->with('admins', $admins)
                            ->with('disqus', $disqus)
                            ->with('all_lections', $all_lections)
                            ->with('sequence_id', $sequence)
                            ->with('sequence_count', $sequence_count)
                            ->with('sequence_count_spelled', $sequence_count_spelled)
                            ->with('sequences', $sequences);
                            // ->with('videoname', $videoname)
                            // ->with('videopath', $videopath)
                            // ->with('markers', $markers)
                            // ->with('sequenceNumber', $sequenceNumber);
    }

}
