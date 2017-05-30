(function() {
    tinymce.create("tinymce.plugins.youtube_shortcode_plugin", {

        init : function(ed, url) {

            ed.addButton("youtube_button", {
                title : "Dodaj film z YouTube",
                cmd : "append_player",
                image : "https://image.flaticon.com/icons/png/512/0/108.png"
            });

            ed.addCommand("append_player", function() {
                var yt_id = prompt("Wprowadź ID filmu na YouTube :", "np. bG3mX-zqASY");
                if (yt_id != null) {
                    var return_text = '[youtube id="'+yt_id+'"]';
                    ed.execCommand("mceInsertContent", 0, return_text);
                }

            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "YouTube Shortcode Button",
                author : "Michal Wilk",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("youtube_shortcode_plugin", tinymce.plugins.youtube_shortcode_plugin);

})();
