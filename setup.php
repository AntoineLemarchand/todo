<?php
/**
 * ---------------------------------------------------------------------
 * ITSM-NG
 * Copyright (C) 2022 ITSM-NG and contributors.
 *
 * https://www.itsm-ng.org
 *
 * based on GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2003-2014 by the INDEPNET Development Team.
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
 */

 define('PLUGIN_TODO_VERSION', '1.0');

function plugin_version_todo() {
    return array(
        'name'           => __("Todo", "todo"),
        'version'        => '1.0',
        'author'         => 'ITSM Dev Team, Djily SARR',
        'license'        => 'GPLv2+',
        'homepage'       => 'https://www.itsm-ng.org',
        'requirements'   => array(
            'glpi' => array(
                'min' => '9.5',
            ),
            'php' => array(
                'min' => '7.0'
            )
        )
    );
}

function plugin_todo_check_prerequisites() {
    if (version_compare(ITSM_VERSION, '1.0', 'lt')) {
        echo "This plugin requires ITSM-NG 1.0";
        return false;
    }
    return true;
};

function plugin_todo_check_config($verbose = false) {
    return true;
};

function plugin_init_todo() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['todo'] = true;
    $PLUGIN_HOOKS['menu_toadd']['todo']['tools'] = array('PluginTodoProfile','changeProfile');
}
?>