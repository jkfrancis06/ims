
$(document).ready(function () {

    //parse data of editor in form


    $("#identifier").on("submit",function(){
        $("#hiddenArea").val($("#quillArea .ql-editor").html());
    })


    // Quill

    var quill = new Quill('#editor', {
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


    /*$("#input-44").fileinput({
        //uploadUrl: '/file-upload-batch/2',
        theme: "fas",
        language: "fr",
        maxFilePreviewSize: 10240,
        showUpload: false,
    }); */


    $("#mainPicture").fileinput({
        //uploadUrl: '/file-upload-batch/2',
        theme: "fas",
        language: "fr",
        maxFilePreviewSize: 10240,
        showUpload: false,
        allowedFileTypes: ['image'],
    });

    /* $("#personne_mainPicture").fileinput({
         theme: 'fas',
         showUpload: false,
         showCaption: false,
         browseClass: "btn btn-primary btn-lg",
         fileType: "any",
     }); */


    function addTagFormDeleteLink(tagFormLi){
        console.log("e")
        const removeFormButton = document.createElement('button')
        removeFormButton.classList
        removeFormButton.innerText = 'Supprimer ce numero de telephone'

        tagFormLi.append(removeFormButton);

        removeFormButton.addEventListener('click', (e) => {
            e.preventDefault()
            tagFormLi.remove();
        });
    }


    const addFormToCollection = (e) => {


        const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

        console.log(collectionHolder.dataset)


        const item = document.createElement('li');


        item.innerHTML = collectionHolder
            .dataset
            .prototype
            .replace(
                /__name__/g,
                collectionHolder.dataset.index
            );

        collectionHolder.appendChild(item);

        collectionHolder.dataset.index++;

        addTagFormDeleteLink(item);
    };






    document
        .querySelectorAll('.add_item_link')
        .forEach(btn => btn.addEventListener("click", addFormToCollection));





})