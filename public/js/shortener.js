$( document ).ready(function() {
    $("#shortener-form").submit(function(e){
        e.preventDefault();
        let url = $(this).find('input[name="url"]').val();
       
        $.post("/api/urls", {url:url},function(data) {
            $("#success").show().append(data.short_url);
        })
        .fail(function() {
            $("#warning").hide();
        });

        /**
         * clear input
         */
        $(this).find('input[name="url"]').val("");
        return false;
    });
});