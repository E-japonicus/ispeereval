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

$string['modulename'] = '他者評価モジュール';
$string['modulenameplural'] = '他者評価モジュール';
$string['modulename_help'] = '学習者がルーブリックを元に他者の評価を行うモジュールです。';
$string['ispeereval:addinstance'] = 'Add a new ispeereval';
$string['ispeereval:submit'] = 'Submit ispeereval';
$string['ispeereval:view'] = 'View ispeereval';
$string['ispeerevalfieldset'] = 'Custom example fieldset';
$string['ispeerevalname'] = '他者評価タイトル';
$string['ispeerevalname_help'] = '入力したテキストはコースへ追加した際に表示されます。<br />例) 第x回他者評価';
$string['ispeereval'] = 'ispeereval';
$string['pluginadministration'] = 'ispeereval administration';
$string['pluginname'] = 'ispeereval';

// 良問の基準
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
$string['exercise_goal_help'] = '
・行列の分野の問題を作成する<br>
・正答率70％の難易度の問題を作成する';

$string['rubric[1]']        = '誤字脱字や分かりづらい表現のない問題を作成することができる';
$string['rubric[1]_help']   = '';
$string['rubric[1]_suffix'] = '作成された問題に';
$string['rubric[1]_score0'] = '<span class="highlight">誤字脱字があり、適切でない単語表現や曖昧で分かりにくい表現</span>が含まれていた';
$string['rubric[1]_score1'] = '誤字脱字はなかったが、<span class="highlight">文章が簡潔にまとめられていない箇所や分かりにくい表現</span>があった';
$string['rubric[1]_score2'] = '誤字脱字がなく、<span class="highlight">誰にでも分かりやすい表現</span>で問題を作成することができた';
$string['rubric[1]_score3'] = '';
$string['rubric[1]_ability'] = '表現力：作問時における文法的表現';

$string['rubric[2]']        = 'メンバーの一員としてグループセッションに参加することができ，自分の考えについて意見を述べることができる';
$string['rubric[2]_help']   = '';
$string['rubric[2]_suffix'] = 'グループメンバーの問題にコメントを';
$string['rubric[2]_score0'] = '<span class="highlight">投稿しなかった</span>';
$string['rubric[2]_score1'] = '投稿したが、<span class="highlight">自分の意見や考えをうまく伝えることができなかった</span>';
$string['rubric[2]_score2'] = '投稿した際に、<span class="highlight">自分の意見や考えを誤解なくグループメンバーに伝えることができた</span>';
$string['rubric[2]_score3'] = '';
$string['rubric[2]_ability'] = '表現力：グループセッションにおける意思疎通、表現';

// 演習目標
$string['rubric[3]']        = '演習目標に則した問題の選択・決定ができる';
$string['rubric[3]_help']   = '';
$string['rubric[3]_suffix'] = '演習目標の出題分野と目標とする正答率の';
$string['rubric[3]_score0'] = '<span class="highlight">どちらも満たしておらず</span>、問題の選択・決定を見直す必要がある';
$string['rubric[3]_score1'] = '<span class="highlight">どちらか一方しか</span>満たしていない';
$string['rubric[3]_score2'] = '<span class="highlight">どちらも満たした</span>問題を作成している';
$string['rubric[3]_score3'] = '';
$string['rubric[3]_ability'] = '判断力：最も演習目標に近いと思われる問題の選択・決定';
