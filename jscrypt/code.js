$(document).ready(function () {
    /*
    */
    $('#content').load('content/index.php');

    // handle menu clicks
    $('menu#nav li a').click(function () {
        var page = $(this).attr('href');
        $('#content').load('content/' + page + '.php');
        return false;
    });

});
