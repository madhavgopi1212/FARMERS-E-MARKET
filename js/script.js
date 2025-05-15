$function() {
    $(".br").click(function() {
        $(".nav-menu").children().eq(0).text("home");
        $(".nav-menu").children().eq(1).text("about");
        $(".nav-menu").children().eq(2).text("feedback");
        $(".nav-menu").children().eq(3).text("contact");
        $(".language-selected").text("pt-BR");
        $(".language-selected").addClass(".change-br");
        $("title").text("webpages are simple to change");


    });
}
$function() {
    $(".en").click(function() {
        $(".nav-menu").children().eq(0).text("రైతులకు ఈ");
        $(".nav-menu").children().eq(1).text("రైతులకు ");
        $(".nav-menu").children().eq(2).text("review");
        $(".nav-menu").children().eq(3).text("contact");
        $(".language-selected").text("pt-te");
        $(".language-selected").addClass(".change-te");
        $("title").text("webpages are simple to change");


    });
};
