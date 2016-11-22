/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // config.toolbarGroups = [
    //     { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    //     { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
    //     { name: 'forms', groups: [ 'forms' ] },
    //     { name: 'links', groups: [ 'links' ] },
    //     { name: 'insert', groups: [ 'insert' ] },
    //     '/',
    //     { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    //     { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
    //     { name: 'colors', groups: [ 'colors' ] },
    //     '/',
    //     { name: 'styles', groups: [ 'styles' ] },
    //     { name: 'others', groups: [ 'others' ] },
    //     { name: 'about', groups: [ 'about' ] },
    //     { name: 'document', groups: [ 'document', 'doctools', 'mode' ] },
    //     { name: 'tools', groups: [ 'tools' ] }
    // ];

    // config.removeButtons = 'Save,NewPage,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Find,Replace,SelectAll,RemoveFormat,CopyFormatting,Language,CreateDiv,HorizontalRule,PageBreak,Iframe,About,Scayt';

    // config.extraPlugins = 'lineutils,widget,codesnippet,ckeditor_wiris';
    // config.codeSnippet_theme = 'monokai';
    // config.allowedContent = true;
};

CKEDITOR.on('dialogDefinition', function (event)
{
    var editor = event.editor;
    var dialogDefinition = event.data.definition;
    var dialogName = event.data.name;

    var cleanUpFuncRef = CKEDITOR.tools.addFunction(function ()
    {
        // Do the clean-up of filemanager here (called when an image was selected or cancel was clicked)
        $('#fm-iframe').remove();
        $("body").css("overflow-y", "scroll");
    });

    var tabCount = dialogDefinition.contents.length;
    for (var i = 0; i < tabCount; i++) {
        var browseButton = dialogDefinition.contents[i].get('browse');

        if (browseButton !== null) {
            browseButton.hidden = false;
            browseButton.onClick = function (dialog, i)
            {
                editor._.filebrowserSe = this;
                var iframe = $("<iframe id='fm-iframe' class='fm-modal'/>").attr({
                    src: base_url + 'assets/RichFilemanager/index.html' + // Change it to wherever  Filemanager is stored.
                        '?CKEditorFuncNum=' + CKEDITOR.instances[event.editor.name]._.filebrowserFn +
                        '&CKEditorCleanUpFuncNum=' + cleanUpFuncRef +
                        '&langCode=en' +
                        '&CKEditor=' + event.editor.name
                });

                $("body").append(iframe);
                $("body").css("overflow-y", "hidden");  // Get rid of possible scrollbars in containing document
            }
        }
    }
}); // dialogDefinition
