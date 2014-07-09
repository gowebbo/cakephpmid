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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
    </head>
    <body>
        <div class="container">
            <?php osc_current_web_theme_path('header.php') ; ?>
            <div class="content list">
                <div id="main">
                    <div class="ad_list">
                        <div id="list_head">
                            <div class="inner">
                                <h1>
                                    <?php _e('<strong>Search</strong> results', 'masjob') ; ?>
                                </h1>
                            </div>
                        </div>
                        <?php if(osc_count_items() == 0) { ?>
                            <p class="empty" ><?php printf(__('There are no results matching "%s"', 'masjob'), osc_search_pattern()) ; ?></p>
                        <?php } else { ?>
                            <?php osc_alert_form() ; ?>
                            <?php osc_current_web_theme_path('search_list.php') ; ?>
                            <?php osc_alert_form() ; ?>
                        <?php } ?>
                        <div class="paginate" >
                            <?php for($i = 0 ; $i < osc_search_total_pages() ; $i++) {
                                if($i == osc_search_page()) {
                                    printf('<a class="searchPaginationSelected" href="%s">%d</a>', osc_update_search_url(array('iPage' => $i)), ($i + 1)) ;
                                } else {
                                    printf('<a class="searchPaginationNonSelected" href="%s">%d</a>', osc_update_search_url(array('iPage' => $i)), ($i + 1)) ;
                                }
                            } ?>
                        </div>
                    </div>
                </div>
                <div id="sidebar">
                    <div class="filters">
                        <form action="<?php echo osc_base_url(true); ?>" method="get" onSubmit="return checkEmptyCategories()">
                            <input type="hidden" name="page" value="search" />
                            <h3 class="your_search"><strong><?php _e('Your search', 'masjob'); ?></strong></h3>
                            <fieldset class="box location">
                                <div class="row one_input">
                                    <h6><?php _e('Keyword', 'masjob'); ?></h6>
                                    <input type="text" name="sPattern"  id="query" value="<?php echo osc_search_pattern() ; ?>" />
                                </div>
                                <div class="row one_input">
                                    <h6><?php _e('City', 'masjob'); ?></h6>
                                    <input type="text" id="sCity" name="sCity" value="<?php echo osc_search_city() ; ?>" />
                                </div>
                                <?php  if ( osc_count_categories() ) { ?>
                                    <div class="row checkboxes">
                                        <h6><?php _e('Areas', 'masjob') ; ?></h6>
                                        <ul>
                                            <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                                            <?php osc_goto_first_category() ; ?>
                                            <?php while(osc_has_categories()) { ?>
                                                <li>
                                                    <input type="checkbox" name="sCategory[]" id="sCategory" value="<?php echo osc_category_id(); ?>" <?php echo ( (in_array(osc_category_id(), osc_search_category())  || in_array(osc_category_slug()."/", osc_search_category()) || count(osc_search_category())==0 )  ? 'checked' : '') ; ?> /> <label for="cat<?php echo osc_category_id(); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </fieldset>
                            <?php
                                if(osc_search_category() != '') {
                                    osc_run_hook('search_form', osc_search_category_id()) ;
                                } else {
                                    osc_run_hook('search_form') ;
                                }
                            ?>
                            <button type="submit"><?php _e('Search', 'masjob') ; ?></button>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    function checkEmptyCategories() {
                        var n = $("#sCategory:checked").length;
                        if(n>0) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                </script>
            </div>
            <?php osc_current_web_theme_path('footer.php') ; ?>
        </div>
        <?php osc_show_flash_message() ; ?>
    </body>
</html>