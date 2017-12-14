<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    include_once "./server_list.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once $filename;
    }

    $plugins = array(
        // specify enabled plugins here
//        new AdminerDumpXml,
//        new AdminerTinymce,
//        new AdminerFileUpload("data/"),
//        new AdminerSlugify,
//        new AdminerTranslation,
//        new AdminerForeignSystem,
//          new AdminerLoginTable,
          new AdminerScripts(array("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js")),
          new AdminerTablesFilter(),
          new AdminerLoginServers($SERVER_LIST)
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./index.php";
?>