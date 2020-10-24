<?php
require_once __DIR__ . '/vendor/autoload.php';

# paramétrages
$sCompteGithub = "fabrice1618";
$sRepository = "github_commit";

# Faire la requete à l'API
$client = new \Github\Client();
try {
    $aCommits = $client->api('repo')->commits()->all($sCompteGithub, $sRepository, ['path' => ""]);

    // Affichage des resultats
    foreach ($aCommits as $key => $aCommit) {
      echo "Num commit:" . $key . PHP_EOL;
      echo "commit message:" . $aCommit['commit']['message'] . PHP_EOL;
      echo "commit author:" . $aCommit['commit']['author']['name'] . PHP_EOL;
      echo "commit date:" . $aCommit['commit']['author']['date'] . PHP_EOL;

    }

  } catch (\RuntimeException $e) {
    echo "Erreur acces API Github";
  }
