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
 * English strings for ispeereval
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_ispeereval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename'] = 'ispeereval';
$string['modulenameplural'] = 'ispeerevals';
$string['modulename_help'] = 'Use the ispeereval module for... | The ispeereval module allows...';
$string['ispeereval:addinstance'] = 'Add a new ispeereval';
$string['ispeereval:submit'] = 'Submit ispeereval';
$string['ispeereval:view'] = 'View ispeereval';
$string['ispeerevalfieldset'] = 'Custom example fieldset';
$string['ispeerevalname'] = 'ispeereval name';
$string['ispeerevalname_help'] = 'This is the content of the help tooltip associated with the ispeerevalname field. Markdown syntax is supported.';
$string['ispeereval'] = 'ispeereval';
$string['pluginadministration'] = 'ispeereval administration';
$string['pluginname'] = 'ispeereval';

// 相互評価用チェックリスト
$string['good_quiz_help'] = '
・問題文や答え，解説が正しい<br>
・誤答選択肢には妥当な選択肢が設定されている（明らかに誤答と分かる選択肢がない）<br>
・解説に答えを導く計算過程が書かれており，不正解した学生が見て分かりやすい解説になっている<br>
・話し言葉でなく書き言葉を用いており，文体を統一している<br>
・誤字脱字がない<br>
・曖昧な表現や分かりにくい表現がない（主語述語のねじれや同じ言葉の繰り返しがない）<br>
・専門用語を正しく用いている<br>
・指定された形式で問題を作成している<br>
・参照した文献の文献番号やウェブサイトのURL，アクセス日を記載している<br>
';

// 演習目標
$string['exercise_goal_help'] = '';

//<span class="highlight"></span>

$string['rubric[1]']        = '自分で工夫した問題を作成することができる';
$string['rubric[1]_help']   = '';
$string['rubric[1]_suffix'] = '';
$string['rubric[1]_score0'] = '・問題(選択肢、解説を含む)を<span class="highlight">作成しなかった<br>・既存の問題とほぼ同じ問題だった</span>';
$string['rubric[1]_score1'] = '既存の問題を列挙し、<span class="highlight">既存の問題の一部を修正（選択肢や数字を変える等）した問題</span>だった';
$string['rubric[1]_score2'] = '既存の問題を比較・分析し、<span class="highlight">既存の問題と類似した問題（同じ解法で解答できる問題等）</span>だった';
$string['rubric[1]_score3'] = '既存の問題を比較・分析し、<span class="highlight">既存の問題の解法を新しい場面や状況に応用した問題</span>だった';
$string['rubric[1]_ability'] = '思考力[作問を通じた創造的思考力]：出題箇所の問題化<br>表現力：作問時における文法的表現';

$string['rubric[2]']        = '相互評価用チェックリストに従った問題を作成できる';
$string['rubric[2]_help']   = '';
$string['rubric[2]_suffix'] = '';
$string['rubric[2]_score0'] = '相互評価用チェックリストの項目を<span class="highlight">意識した問題ではなかった</span>';
$string['rubric[2]_score1'] = '相互評価用チェックリストの項目を<span class="highlight">意識した問題</span>だった';
$string['rubric[2]_score2'] = '相互評価用チェックリストの項目を<span class="highlight">概ね満たしていた問題</span>だった';
$string['rubric[2]_score3'] = '相互評価用チェックリストの項目を<span class="highlight">全て満たしている問題</span>だった';
$string['rubric[2]_ability'] = '表現力：作問時における文法的表現';

$string['rubric[3]']        = '問題の相互評価の際に、グループメンバーの問題の表現や難易度等の改善点について自分の意見や考えを伝えることができる';
$string['rubric[3]_help']   = '';
$string['rubric[3]_suffix'] = '';
$string['rubric[3]_score0'] = '問題の相互評価の際に、<span class="highlight">自分の意見や考えを伝えていなかった(コメントを投稿していなかった)</span>';
$string['rubric[3]_score1'] = 'グループメンバーの<span class="highlight">問題を解いた感想等</span>を伝えていた';
$string['rubric[3]_score2'] = 'グループメンバーの<span class="highlight">問題の表現や難易度等についての感想</span>を伝えていた';
$string['rubric[3]_score3'] = 'グループメンバーの<span class="highlight">問題の表現や難易度等の改善点についての意見や考えを具体的に</span>伝えていた';
$string['rubric[3]_ability'] = '表現力：グループセッションにおける意思疎通、表現';