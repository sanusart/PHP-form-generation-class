<?php
include_once "../src/form.php";
$form = new sanusart\form();

$form->field_open('MY COOL TEXT',0,0,0,0);
$form->label('name','First name: ');
$form->input('text',0,0,'name','some text','name',0,0);
$form->field_close();

$form->field_open('MY COOL LOGIN',0,0,0,0);
$form->label('user','User name: ');
$form->required();
$form->input('text',0,0,'user','some text','user',0,0);
$form->label('pass','Password: ');
$form->input('password',0,0,'pass','ppppppppp','pass',0,0);
$form->input('submit',0,0,0,'SEND',0,0,0);
$form->br(1);
$form->label('file','Upload: ');
$form->input('file',0,0,0,0,'file',0,0);
$form->br(1);
$form->label('check','Checkboxes: ');
$form->input('checkbox',0,0,'ch1',0,'check',0,0,0);
$form->field_close();

$form->field_open('MY COOL TEXT AREA','border:2px solid red;font:bold 22px arial;',0,'border:2px solid red;',0);
$form->textarea(40,5,0,0,'content',0,'This is some text in the text area value.');
$form->br(1);
$form->select(0,0,'names',0,"--|John|Nina|*Nora|Norman|Danny");
$form->label('man','man');
$form->input('radio',0,0,'rad',0,'man',0,0,0);
$form->label('woman','woman');
$form->input('radio',0,0,'rad',0,'woman',0,1,0);
$form->field_close();

$form->printout('some.php','post','utf-8',0,0,0);
?>
