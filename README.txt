The following steps should get you up and running with
this module template code.

* DO NOT PANIC!

* Unzip the archive and read this file

* Rename the ispeereval/ folder to the name of your module (eg "widget").
  The module folder MUST be lower case and can't contain underscores. You should check the CVS contrib
  area at http://cvs.moodle.org/contrib/plugins/mod/ to make sure that
  your name is not already used by an other module. Registering the plugin
  name @ http://moodle.org/plugins will secure it for you.
  
  ispeereval /フォルダの名前をあなたのモジュールの名前に変更します（例えば、 "widget"）。
  モジュールフォルダは小文字でなければならず、アンダースコアを含むことはできません。

* Edit all the files in this directory and its subdirectories and change
  all the instances of the string "ispeereval" to your module name
  (eg "widget"). If you are using Linux, you can use the following command
  $ find . -type f -exec sed -i 's/ispeereval/widget/g' {} \;
  $ find . -type f -exec sed -i 's/ISPEEREVAL/WIDGET/g' {} \;

  On a mac, use:
  $ find . -type f -exec sed -i '' 's/ispeereval/widget/g' {} \;
  $ find . -type f -exec sed -i '' 's/ISPEEREVAL/WIDGET/g' {} \;

  このディレクトリとそのサブディレクトリ内のすべてのファイルを編集して変更する
  あなたのモジュール名に文字列 "ispeereval"のすべてのインスタンス
  （例えば、「ウィジェット」）。 Linuxを使用している場合は、次のコマンドを使用できます
  $ find . -type f -exec sed -i 's/ispeereval/widget/g' {} \;
  $ find . -type f -exec sed -i 's/ISPEEREVAL/WIDGET/g' {} \;
  Macでは、以下を使用します。
  $ find . -type f -exec sed -i '' 's/ispeereval/widget/g' {} \;
  $ find . -type f -exec sed -i '' 's/ISPEEREVAL/WIDGET/g' {} \;

* Rename the file lang/en/ispeereval.php to lang/en/widget.php
  where "widget" is the name of your module

  ファイルlang / en / ispeereval.phpの名前をlang / en / widget.phpに変更します
  ここで "widget"はあなたのモジュールの名前です

* Rename all files in backup/moodle2/ folder by replacing "ispeereval" with
  the name of your module

  On Linux you can perform this and previous steps by calling:
  $ find . -depth -name '*ispeereval*' -execdir bash -c 'mv -i "$1" "${1//ispeereval/widget}"' bash {} \;

  backup / moodle2 /フォルダ内のすべてのファイルの名前を、 "ispeereval"を
  あなたのモジュールの名前
  Linuxでは、以下の関数を呼び出すことでこの手順と前の手順を実行できます。
  $ find . -depth -name '*ispeereval*' -execdir bash -c 'mv -i "$1" "${1//ispeereval/widget}"' bash {} \;

* Place the widget folder into the /mod folder of the moodle
  directory.

  ウィジェットフォルダをムードルの/ modフォルダに置きます

* Modify version.php and set the initial version of you module.

version.phpを修正して、あなたの初期バージョンを設定してください。

* Visit Settings > Site Administration > Notifications, you should find
  the module's tables successfully created

  [設定]> [サイト管理]> [通知]の順にアクセスします。
  モジュールのテーブルが正常に作成されました

* Go to Site Administration > Plugins > Activity modules > Manage activities
  and you should find that this ispeereval has been added to the list of
  installed modules.

* You may now proceed to run your own code in an attempt to develop
  your module. You will probably want to modify mod_form.php and view.php
  as a first step. Check db/access.php to add capabilities.
  Go to Settings > Site Administration > Development > XMLDB editor
  and modify the module's tables.

We encourage you to share your code and experience - visit http://moodle.org

Good luck!
