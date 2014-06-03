(function() {
    tinymce.PluginManager.add('bm_tc_button', function( editor, url ) {
        editor.addButton( 'bm_tc_button', {
            title: 'Dodaj tag pre',
            icon: 'icon dashicons-wordpress',
            onclick: function() {
    			editor.windowManager.open( {
         		title: 'Wpisz język',
         		body: [{
            		type: 'textbox',
            		name: 'title',
            		label: 'Twój język'
         		}],
         		onsubmit: function( e ) {
             	editor.insertContent( '[crayon lang="' + e.data.title + '"] tutaj wpisz swój kod [/crayon]');
         	}
    	 });	
		}
        });
    });
})();