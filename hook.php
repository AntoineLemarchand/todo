<?php
/**
 * ---------------------------------------------------------------------
 * ITSM-NG
 * Copyright (C) 2023 ITSM-NG and contributors.
 *
 * https://www.itsm-ng.org
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of ITSM-NG.
 *
 * ITSM-NG is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * ITSM-NG is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ITSM-NG. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 **/

 /**
  * Install plugin and create table
  *
  * @global object $DB
  * @return boolean
  */
function plugin_todo_install(): bool {
    global $DB;

    $migration = new Migration(101);

    if (!$DB->tableExists("itsm_todo")) {
        $query = "CREATE TABLE `itsm_todo` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `content` varchar(255) NOT NULL,
            `date` datetime NOT NULL,
            `priority` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        $DB->query($query) or die("Error creating table itsm_todo: " . $DB->error());
    }
    return true;
}

/**
 * Uninstall plugin and drop table
 *
 * @global object $DB
 * @return boolean
 */
function plugin_todo_uninstall(): bool {
    global $DB;

    $tables = array('itsm_todo');

    foreach ($tables as $table) {
        if ($DB->tableExists($table)) {
            $query = "DROP TABLE `$table`";
            $DB->query($query) or die("Error dropping table $table: " . $DB->error());
        }
    }
    
    return true;
}
?>