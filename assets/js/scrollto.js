$('.scroll').on("click", function () {
	var e = $(this).attr("href");
	return $("html,body").animate({ scrollTop: $(e).offset().top }, 600), !1;
});