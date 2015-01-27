/**
 * Insert in textarea
 *
 * @package CentidoMS
 *
 */

// JavaScript Document
tinymce.PluginManager.add('readmore', function(editor, url) {
						  // Add a button that opens a window
						  editor.addButton('readmore', {
										   text: 'Weiterlesen',
										   icon: false,
										   onclick: function() {
										   // Insert content when the window form is submitted
										   editor.insertContent('[READMORE]');
										   }
										   });
						  });