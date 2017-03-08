$(document).ready(function () {

    categoriresIDs = $('#categories');/* input */
    categoriesadded = $('#catigory_added');
    $('#button').click(addCategoryToPost);

    for (i = 0; i < $('.catigory_added').children(); i++) {
        $('catigory_added option')[i].addEventListener('click', alert);//removeCategoryFromPost
        $('catigory_added option')[i].css('border', 'solid red 2px');
    }

    function addCategoryToPost() {
        category_id = $('#cetegories_select option:selected').val();
        console.log(category_id);
        category_name = $('#cetegories_select option:selected').html();
        console.log(category_name);

        if (categoriresIDs.val().split(',').indexOf(category_id) !== -1) {
            return;
        }
        if (categoriresIDs.split(',').val().length > 0) {
            categoriresIDs.attr('value', categoriresIDs.val() + "," + category_id);
        } else {
            categoriresIDs.val(category_id);
        }
        console.log(categoriresIDs.val());
        console.log(category_name);
//        li=document.createElement('li').addEventListener('click',console.log('event clicked'));
//        li.html(category_name);
//        categories_select.append(li);
    }
});