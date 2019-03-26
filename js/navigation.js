// Anonymous funciton wrapper to enable jQuery '$' syntax
(function($) {
    $(document).ready(function(){
        $("button[data-toggle='side-collapse']").click(function(){
            $($(this).attr("data-target")).toggleClass("show");
            $(this).toggleClass("collapsed");
        });
    });
})(jQuery);
