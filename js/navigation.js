// Anonymous funciton wrapper enables jQuery '$' syntax
(function($) {
    /**
     * Sidebar toggle changes sidebar, site overlay, aria data
     */
    $(document).ready(function(){
        $("button[data-toggle='side-collapse']").click(function(){
            $($(this).attr("data-target")).toggleClass("show");
            $(this).toggleClass("collapsed");
            $(this).attr('aria-expanded',function(index, attr) {
                return attr === 'false' ? 'true' : 'false';
            });
            $(".site-overlay").toggleClass("show");
        });
    });
})(jQuery);
