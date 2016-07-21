$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var timer;


function up() {
    timer = setTimeout(function () {
        var keywords = $('#search-input').val();

        if (keywords.length > 0) {

            $.post('http://sripathy.sima.io/admin/courselist/executeSearch', {keywords: keywords}, function (markup) {
                $('#search-results').html(markup);
            });
        }
    }, 500);
}

function down() {

    clearTimeout(timer);

}

function tryjava(){
     var keywords = $_POST['tagvalue'].val();
    alert ("texas");
}
