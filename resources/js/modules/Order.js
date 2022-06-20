function init() {
    add();
}

function add() {
    $('#addProduct').on('click', function(event) {
        event.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            //$("#exampleModal").html(data);
            $("#exampleModal").modal("show");
        });
    });
}

export { init }