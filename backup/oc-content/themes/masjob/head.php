<?php
    /*
     *      OSCLass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2013 Osclass
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

osc_register_script('jquery-extends', osc_current_web_theme_js_url('jquery-extends.js'), array('jquery'));
osc_register_script('theme-global', osc_current_web_theme_js_url('global.js'), array('jquery'));
osc_enqueue_script('jquery-extends');
osc_enqueue_script('jquery-validate');
osc_enqueue_script('theme-global');

osc_enqueue_style('style', osc_current_web_theme_styles_url('style.css'));

?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo osc_page_title() ; ?></title>

<?php osc_run_hook('header') ; ?>