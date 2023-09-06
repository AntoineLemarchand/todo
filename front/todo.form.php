<?php
include_once ('../../../inc/includes.php');

Html::header(__("Todo list", "todolist"), $_SERVER['PHP_SELF'], 'tools', PluginTodoConfig::class);
PluginTodoProfiles::todoTable();
Html::footer();
?>