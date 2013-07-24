<?php
/**
 * 
 * folder properties template page, used by the site to display the default panel for the properties page
 *
 * @author Patrick Lockley
 * @version 1.0
 * @copyright Copyright (c) 2008,2009 University of Nottingham
 * @package
 */

require_once("../../../config.php");

_load_language_file("/website_code/php/folderproperties/folderproperties_template.inc");

include "../url_library.php";

//connect to the database

if(is_numeric($_POST['folder_id'])){

    $database_connect_id = database_connect("Folder name database connect success", "Folder name database connect failed");

    $query_for_folder_name = "select folder_name from " . $xerte_toolkits_site->database_table_prefix . "folderdetails where folder_id=\"" . mysql_real_escape_string($_POST['folder_id']) . "\"";

    $query_name_response = mysql_query($query_for_folder_name);

    $row_template_name = mysql_fetch_array($query_name_response);

    echo "<p class=\"header\"><span>" . FOLDER_PROPERTIES_PROPERTIES . "</span></p>";			

    echo "<p>" . FOLDER_PROPERTIES_CALLED . " " . str_replace("_", " ", $row_template_name['folder_name']) . "</p>";

    echo "<p>" . FOLDER_PROPERTIES_CHANGE . "</p>";

    echo "<p><form id=\"rename_form\" action=\"javascript:rename_folder('" . $_POST['folder_id'] ."', 'rename_form')\"><input style=\"padding-bottom:5px\" type=\"text\" value=\"" . str_replace("_", " ", $row_template_name['folder_name']) . "\" name=\"newfoldername\" /><button type=\"submit\" class=\"xerte_button\"  align=\"top\" style=\"padding-left:5px\">" . FOLDER_PROPERTIES_BUTTON_SAVE . "</button></form>";

}


?>
