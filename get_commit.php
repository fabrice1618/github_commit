<?php
require_once __DIR__ . '/vendor/autoload.php';

# paramétrages
$sCompteGithub = "fabrice1618";
$sRepository = "github_commit";
$nNombreCommit = 10;

# Faire la requete à l'API
$client = new \Github\Client();
try {
    $aCommits = $client->api('repo')->commits()->all($sCompteGithub, $sRepository, ['path' => ""]);

    // Affichage des resultats
    $nCnt = 0;
    while ( ($nCnt < $nNombreCommit) && isset($aCommits[$nCnt]) ) {

      viewCommit( $aCommits[$nCnt] );

      $nCnt++;
    }


    foreach ($aCommits as $key => $aCommit) {

    }

  } catch (\RuntimeException $e) {
    echo "Erreur acces API Github";
  }

function viewCommit( $aCommit )
{
  echo str_repeat('-', 50) . PHP_EOL;
  echo "Message : " . $aCommit['commit']['message'] . PHP_EOL;
  echo "Author  : " . $aCommit['commit']['author']['name'] . PHP_EOL;
  echo "Date    : " . $aCommit['commit']['author']['date'] . PHP_EOL;
  echo PHP_EOL;
}