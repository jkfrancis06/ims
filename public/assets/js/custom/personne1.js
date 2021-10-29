
$(document).ready(function () {
    var $collectionHolder;

    // setup an "add a lignelivraison" link
    var $addTagButton = $('<a href="#" id="add_ligneliv" class="btn btn-success btn-sm">Ajouter</a>');
    var $newLinkLi = $('<div></div>').append($addTagButton);

    jQuery(document).ready(function() {
        // Get the tr that holds the collection of lignelivraison
        $collectionHolder = $('div.lignelivraison');

        // add a delete link to all of the existing <span style="float:none;color:#000000;font-size:12px;text-align:left;">lignelivraison </span>form div elements
        $collectionHolder.find('div').each(function() {
            addTagFormDeleteLink($(this));
        });

        // add the "add a lignelivraison" anchor and div to the lignelivraison div
        $collectionHolder.append($newLinkLi);

        // count the current form inputs we have (e.g. 2), use that as the new
        // index when inserting a new item (e.g. 2)
        $collectionHolder.data('index', $collectionHolder.find(':input').length);

        $addTagButton.on('click', function(e) {
            // add a new tag form (see next code block)
            addTagForm($collectionHolder, $newLinkLi);
        });
    });

    function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many items we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<div></div>').append(newForm);
        $newLinkLi.before($newFormLi);

        // add a delete link to the new form
        addTagFormDeleteLink($newFormLi);

    }

    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormButton = $('<a href="#" id="add_ligneliv" class="btn btn-default btn-sm"><img src="#" alt="Logo"></a>');
        $tagFormLi.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            // remove the li for the tag form
            $tagFormLi.remove();
        });
    }

})