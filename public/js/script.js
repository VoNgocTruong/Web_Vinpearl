$(document).ready(function () {
    $(".list-link").click(function (e) {
        e.preventDefault();
        var dropdown = $(this).next(".list-dropdown");
        $(".list-dropdown").not(dropdown).slideUp();
        $(".arrow").not($(this).find(".arrow")).removeClass("rotate-180");
        dropdown.slideToggle();
        $(this).find(".arrow").toggleClass("rotate-180");
    });

    $("#dropdown").on("click", function (e) {
        e.stopPropagation();
        $("#dropdown-content").toggleClass("hidden");
    });
    $(document).on("click", function (e) {
        if (!$(e.target).closest("#dropdown").length) {
            $("#dropdown-content").addClass("hidden");
        }
    });
});
