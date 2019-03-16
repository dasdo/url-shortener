$( document ).ready(function() {
    $("#shortener-form").submit(function(e){
        /**
         * prevent to form submit the information
         */
        e.preventDefault();

        /**
         * Get input fields url
         */
        let url = $(this).find('input[name="url"]');
       
        /**
         * try to create the link
         */
        $.post("/api/urls", {url:url.val()},function(data) {
            /**
             * show success
             */
            $("#warning").hide();
            $("#success").show().append(data.short_url);
        })
        .fail(function(e) {
            /**
             * show warning
             */
            $("#success").hide();
            $("#warning").show().append(data.exception);
        });

        /**
         * clear input
         */
        url.val("");
        return false;
    });
});