(function() {
	tinymce.PluginManager.add('sp_gc_mce_button', function( editor, url ) {
		editor.addButton('sp_gc_mce_button', {
			text: false,
            icon: false,
            image: url + '/gc.png',
            tooltip: 'Logo Showcase',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Insert Shortcode',
					width: 400,
					height: 100,
					body: [
						{
							type: 'listbox',
							name: 'listboxName',
                            label: 'Add Shortcode',
							'values': editor.settings.spPCShortcodeList
						}
					],
					onsubmit: function( e ) {
						editor.insertContent( '[logo_showcase  id="' + e.data.listboxName + '"]');
					}
				});
			}
		});
	});
})();