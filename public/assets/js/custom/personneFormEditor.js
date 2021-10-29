$(document).ready(function () {
    //parse data of editor in form


    $("#personne_submit").on("click",function(){
        $("#resume").val($("#personne_editor .ql-editor").html());
        console.log( $("#resume").val())

    })

    $("#vehicule_submit").on("click",function(){
        $("#resume").val($("#personne_editor .ql-editor").html());
        console.log( $("#resume").val())

    })


    $("#organisation_submit").on("click",function(){
        $("#resume").val($("#personne_editor .ql-editor").html());
        console.log( $("#resume").val())

    })


    // Quill

    var quill = new Quill('#personne_editor', {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Compose an epic...',
        theme: 'snow' // or 'bubble'
    });


    // Add a custom DropDown Menu to the Quill Editor's toolbar:

    const dropDownItems = {
        'Mike Smith': '<span>mike.smith@gmail.com</span>',
        'Jonathan Dyke': 'jonathan.dyke@yahoo.com',
        'Max Anderson': 'max.anderson@gmail.com'
    }

    const myDropDown = new QuillToolbarDropDown({
        label: "Email Addresses",
        rememberSelection: false
    })

    myDropDown.setItems(dropDownItems)

    myDropDown.onSelect = function(label, value, quill) {

        var range = quill.getSelection();
        if (range) {
            register()
            quill.insertEmbed(range.index, 'hashtag',value);
        }
        const { index, length } = quill.selection.savedRange
        quill.setSelection(index + value.length)
    }

    myDropDown.attach(quill)



    const myButton = new QuillToolbarButton({
        icon: `<svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path></svg>`
    })
    myButton.onClick = function(quill) {
        // Do whatever you want here. You could use this.getValue() or this.setValue() if you wanted.

        // For example, get the selected text and convert it to uppercase:
        const { index, length } = quill.selection.savedRange
        const selectedText = quill.getText(index, length)
        const newText = selectedText.toUpperCase()
        quill.deleteText(index, length)
        quill.insertText(index, newText)
        quill.setSelection(index, newText.length)
    }
    myButton.attach(quill)


    function register(){

        var Embed = Quill.import('blots/embed');
        class QuillHashtag extends Embed {
            static create(value) {
                let node = super.create(value);
                node.innerHTML = `<span contenteditable=false>#${value}</span>`;
                return node;
            }
        }
        QuillHashtag.blotName = 'hashtag';
        QuillHashtag.className = 'quill-hashtag';
        QuillHashtag.tagName = 'span';

        Quill.register({
            'formats/hashtag': QuillHashtag
        });
    }

})