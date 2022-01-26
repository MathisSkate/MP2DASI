$(document).ready(function () {


    /** Fonction changement de langue **/

    var langVal;

    $(".language-select").msDropDown();

    $('.delete-container').remove();

    $(".language-select").change(function () {
        langVal = $(this).val();
        $.ajax({
            url: "index_pack/functions/change_language.php",
            method: "POST",
            data: {langVal: langVal},
            success: function (data) {
                console.log(data);
                location.reload();
            }
        });
    });
});