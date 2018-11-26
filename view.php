<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Prints a particular instance of ispeereval
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_ispeereval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Replace ispeereval with the name of your module and remove this line.

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... ispeereval instance ID - it should be named as the first character of the module.

if ($id) {
    $cm         = get_coursemodule_from_id('ispeereval', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $ispeereval  = $DB->get_record('ispeereval', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $ispeereval  = $DB->get_record('ispeereval', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $ispeereval->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('ispeereval', $ispeereval->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_ispeereval\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $ispeereval);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/ispeereval/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($ispeereval->name));
$PAGE->set_heading(format_string($course->fullname));

/*
 * Other things you may want to set - remove if not needed.
 * $PAGE->set_cacheable(false);
 * $PAGE->set_focuscontrol('some-html-id');
 * $PAGE->add_body_class('ispeereval-'.$somevar);
 */

// Output starts here.
echo $OUTPUT->header();

// Conditions to show the intro can change to look for own settings or whatever.
if ($ispeereval->intro) {
    echo $OUTPUT->box(format_module_intro('ispeereval', $ispeereval, $cm->id), 'generalbox mod_introbox', 'ispeerevalintro');
}

//追記部分
// 各種変数の設定
$composite_key = array('user_id' => $USER->id, 'ispeereval_id' => $ispeereval->id);
$context = context_course::instance($course->id);
$roles   = get_user_roles($context, $USER->id);
$teacher = array_filter($roles, function ($role) {
    return preg_match('/teacher/i', $role->shortname);
});
// DB登録の読み込み
include_once './locallib.php';

// require_once("{$CFG->dirroot}/mod/ispeereval/peereval_form.php"); 

if (count($teacher) > 0) :
    // if teacher => teacher_view
    require_once("{$CFG->dirroot}/mod/ispeereval/teachers_view.php");    

else:
    // not teacher

    if (isset($_POST['rubrics_submit'])) :
        // rubricの登録ボタンが押された時

        // POSTされたデータの処理
        $records = new stdClass();
        $records->user_id = $USER->id;
        $records->ispeereval_id = $ispeereval->id;
        foreach ($_POST as $name => $value):
            $records->$name = $value;
        endforeach;

        if ($records->peer_id == "default") :
            // もう一度formを読み込む
            header("Location: ".$_SERVER[‘PHP_SELF’]);
            //require_once("{$CFG->dirroot}/mod/ispeereval/peereval_form.php");
            // エラー表示
            echo "<script>window.onload = function() { alert('評価相手を選択してください。'); };</script>";
        else:
            // rubricsのDB登録
            if (ispeereval_rubrics_upsert($records)):
                // success upsert
            else:
                // failed
            endif;
        endif;
    endif;

    // formの表示
    require_once("{$CFG->dirroot}/mod/ispeereval/peereval_form.php");

    // 登録した他者評価がある場合表示
    if ($DB->get_record('ispeereval_rubrics', $composite_key)) :
        require_once("{$CFG->dirroot}/mod/ispeereval/peereval_entry_result.php");
    endif;

    
endif;



// Finish the page.
echo $OUTPUT->footer();
