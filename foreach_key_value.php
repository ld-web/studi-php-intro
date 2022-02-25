<?php
$users = [
  176 => [
    "name" => "Edwin",
    "age" => 47,
    "description" => "fighting gulf win pool arrangement safe thank yellow number die across keep attention where clear composed bush single car was most them station fewer"
  ],
  198 => [
    "name" => "Anthony",
    "age" => 92,
    "description" => "happen course discuss provide similar railroad government means surprise belt anywhere movement lovely jump lack flame lose row gas police pony bee struggle believed"
  ],
  227 => [
    "name" => "Devin",
    "age" => 34,
    "description" => "sink mainly rear quiet pick somebody real though lonely neighbor beautiful shade pot title thank character slide cast nearby combine breathing court between forest"
  ]
];

// Foreach avec key/value : je nomme à la fois la valeur, mais également la clé
foreach ($users as $userId => $userInfos) {
  var_dump($userId);
  var_dump($userInfos);
}
