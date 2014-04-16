<?php

require_once('class.GitHubHook.php');

// Initiate the GitHub Deployment Hook
$hook = new GitHubHook;

// Enable the debug log (sent to error_log)
$hook->enableDebug();

// The location where to store code fetched from GitHub.
$hook->setStorage('/srv/www/someapp/git/code');

// Required GitHub info: repository and OAuth token.
$hook->setGitHubInfo('your/repository', 'somevalidoauthtoken');

// Adding `stage` branch to deploy for `staging` to path `/var/www/testhook/stage`
// TODO: actually, let the user provide a hash of src/dest mappings AND
// a base path where it should apply (here, /path/to/wp-content).
$hook->addBranch('master', 'dev', '/path/to/your/wp/theme/folder');

// Adding `prod` branch to deploy for `production` to path `/var/www/testhook/prod` limiting to only `user@gmail.com`
//$hook->addBranch('prod', 'production', '/var/www/prod', array('user@gmail.com'));

// Let's "deploy" the updated code to our wordpress app.
$hook->deploy();

?>
