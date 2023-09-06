<?php
define('GLPI_ROOT', '../../..');
include (GLPI_ROOT . "/inc/includes.php");

Html::header(__('Todo', 'todo'), $_SERVER['PHP_SELF'], "plugins", "pluginstodo", "todo");
PluginTodoProfiles::title();
Html::footer();
?>