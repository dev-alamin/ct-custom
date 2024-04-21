jQuery(document).ready(function(){
        var previousClickedElement = null;

        $('.main-menu li').on("click", function(event) {
            // Check if the clicked element is not within ".main-menu li a"
            if (!$(event.target).closest(".main-menu li").length) {
                // Remove the "active" class from the previously clicked element
                if (previousClickedElement !== null) {
                    previousClickedElement.removeClass("active");
                }
            }
        });

        $(".main-menu li").click(function(){
            // Remove the "active" class from the previously clicked element
            if (previousClickedElement !== null && !$(this).is(previousClickedElement)) {
                previousClickedElement.removeClass("active");
            }

            // Toggle the "active" class for the clicked element
            $(this).toggleClass("active");

            // Update the previously clicked element
            previousClickedElement = $(this);
        });

        // slicknav activation class
        $('.main-menu').slicknav();
});