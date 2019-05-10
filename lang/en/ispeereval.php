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
・解説に答えを導く計算過程が書かれており、不正解した学習者が見てわかりやすい解説になっているか？<br>
・著作権を侵害していないか？（参考文献が記載されているか？）<br>
・誤字脱字がないか？<br>
・曖昧な表現やわかりにくい表現はないか？<br>
・問題内容・答え・解説は正しいか？<br>
・誤答選択肢には妥当な選択肢が設定されているか？<br>
　（明らかに誤答とわかる選択肢はないか？）
';

// 演習目標
$string['exercise_goal_help'] = '';

$string['rubric[1]']        = '作問の要件(出題範囲と正答率)を満たす問題を作成できる';
$string['rubric[1]_help']   = '';
$string['rubric[1]_suffix'] = '';
$string['rubric[1]_score0'] = '作問の要件(出題範囲と正答率)を<span class="highlight">満たした問題を作成できていなかった</span>';
$string['rubric[1]_score1'] = '作問の要件(出題範囲と正答率)の<span class="highlight">一部のみを満たした問題を作成していた</span>';
$string['rubric[1]_score2'] = '作問の要件(出題範囲と正答率)を<span class="highlight">概ね満たした問題を作成していた</span>';
$string['rubric[1]_score3'] = '作問の要件(出題範囲と正答率)を<span class="highlight">全て満たした問題を作成していた</span>';
$string['rubric[1]_ability'] = '思考力[推論,仮説]：結果の予測、<br />思考力[作問を通じた創造的思考力]：出題箇所の問題化、<br />判断力：作問に関する意思決定（出題形式の選択など）';

$string['rubric[2]']        = '相互評価用チェックリストに従った問題を作成できる';
$string['rubric[2]_help']   = '';
$string['rubric[2]_suffix'] = '';
$string['rubric[2]_score0'] = '作成された問題は相互評価用チェックリストの項目の<span class="highlight">半分も満たしていなかった</span>';
$string['rubric[2]_score1'] = '作成された問題は相互評価用チェックリストの項目の<span class="highlight">6割を満たしていた</span>';
$string['rubric[2]_score2'] = '作成された問題は相互評価用チェックリストの項目の<span class="highlight">8割を満たしていた</span>';
$string['rubric[2]_score3'] = '作成された問題は相互評価用チェックリストの項目の<span class="highlight">全てを満たしていた</span>';
$string['rubric[2]_ability'] = '表現力：作問時における文法的表現';

$string['rubric[3]']        = '問題の相互評価の際に、グループメンバーの問題の表現や難易度等の改善点について自分の意見や考えを伝えることができる';
$string['rubric[3]_help']   = '';
$string['rubric[3]_suffix'] = '';
$string['rubric[3]_score0'] = '問題の相互評価の際に、<span class="highlight">自分の意見や考えを伝えていなかった(コメントを投稿していなかった)</span>';
$string['rubric[3]_score1'] = '問題の相互評価の際に、グループメンバーの<span class="highlight">問題を解いた感想等を伝えていた</span>';
$string['rubric[3]_score2'] = '問題の相互評価の際に、グループメンバーの<span class="highlight">問題の表現や難易度等の改善点について自分の意見や考えを概ね伝えていた</span>';
$string['rubric[3]_score3'] = '問題の相互評価の際に、グループメンバーの<span class="highlight">問題の表現や難易度等の改善点について自分の意見や考えをうまく伝えていた</span>';
$string['rubric[3]_ability'] = '表現力：グループセッションにおける意思疎通、表現';

$string['rubric[4]']        = '自分で工夫した問題を作成することができる';
$string['rubric[4]_help']   = '';
$string['rubric[4]_suffix'] = '';
$string['rubric[4]_score0'] = '問題(選択肢、解説を含む)を<span class="highlight">作成していなかった</span>';
$string['rubric[4]_score1'] = '作成された問題は、既存の問題の<span class="highlight">一部のみ(数字だけを変える等)を修正した問題だった</span>';
$string['rubric[4]_score2'] = '作成された問題は、既存の問題に<span class="highlight">類似した問題(同じ解法で解答できる問題等)だった</span>';
$string['rubric[4]_score3'] = '作成された問題は、既存の問題を参考にし、<span class="highlight">大部分を自分自身で考えた問題だった</span>';
$string['rubric[4]_ability'] = '思考力[作問を通じた創造的思考力]：出題箇所の問題化、<br />表現力：作問時における文法的表現';

$string['rubric[5]']        = '相互評価用チェックリストに従ってグループメンバーの問題を正しく評価できる';
$string['rubric[5]_help']   = '';
$string['rubric[5]_suffix'] = '';
$string['rubric[5]_score0'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストを<span class="highlight">全く評価(確認)していなかった</span>';
$string['rubric[5]_score1'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストの<span class="highlight">一部の項目だけ評価(確認)していた</span>';
$string['rubric[5]_score2'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストの<span class="highlight">各項目を概ね評価(確認)していた</span>';
$string['rubric[5]_score3'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストの<span class="highlight">すべての項目を正しく評価(確認)していた</span>';
$string['rubric[5]_ability'] = '判断力：問題の評価・選択';

$string['rubric[6]']        = '作問の要件(出題範囲と正答率)を満たしている問題を選択できる';
$string['rubric[6]_help']   = '';
$string['rubric[6]_suffix'] = '';
$string['rubric[6]_score0'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">全く選択できていなかった</span>';
$string['rubric[6]_score1'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">一部選択していた</span>';
$string['rubric[6]_score2'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">概ね選択していた</span>';
$string['rubric[6]_score3'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">すべて正しく選択していた</span>';
$string['rubric[6]_ability'] = '判断力：問題の評価・選択';