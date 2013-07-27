function checkCookie(key) {
    return $.cookie(key) ? !0 : !1;
}

function setCookie(key, val) {
    return $.cookie(key, val, {
        path: "/",
        domain: "psullivan6.com",
        expires: 1
    }) ? !0 : !1;
}

function getCookie(key) {
    return $.cookie(key);
}

function nameCookie(type) {
    return $obj = $("#" + type + " object"), $obj.length ? $obj.attr("id") : "default";
}

function asControl() {
    $obj = $("#billboard object")[0], $obj && $obj.asClosed !== void 0 && $obj.asClosed();
}

function billboardControl(height_closed, height_open) {
    var $billboard = $("#billboard"), speed = 1e3;
    height_closed = null !== height_closed ? height_closed : "30", height_open = null !== height_open ? height_open : "420", 
    height_open > $billboard.height() ? $billboard.animate({
        height: height_open
    }, speed) : $billboard.animate({
        height: height_closed
    }, speed, function() {
        asControl();
    });
}

function breaker(content, content_single) {
    console.log(content, content_single);
    var dpr = 1;
    void 0 !== window.devicePixelRatio && (dpr = window.devicePixelRatio), $(".item-content img").each(function() {
        $this = $(this), $(".post").hasClass("content-single") ? dpr > 1 ? $this.attr("src", $this.attr("data-src-" + content_single + "-retina")) : $this.attr("src", $this.attr("data-src-" + content_single)) : dpr > 1 ? $this.attr("src", $this.attr("data-src-" + content + "-retina")) : $this.attr("src", $this.attr("data-src-" + content));
    });
}

$(window).load(function() {
    var $billboard = $("#billboard");
    $billboard.length > 0 && $billboard.find("div").show();
}), console.log("ultra-img called");

var queries = [ {
    context: "s2",
    callback: function() {
        breaker("three", "three");
    }
}, {
    context: "s3",
    callback: function() {
        breaker("three", "three");
    }
}, {
    context: "s4",
    callback: function() {
        breaker("three", "four");
    }
}, {
    context: "m",
    callback: function() {
        breaker("three", "six");
    }
}, {
    context: "l",
    callback: function() {
        breaker("three", "seven");
    }
}, {
    context: "xl",
    callback: function() {
        breaker("four", "eight");
    }
} ];

MQ.init(queries), $(".scroll").on("click", function() {
    var e = $(this).attr("href");
    return $("html,body").animate({
        scrollTop: $(e).offset().top
    }, 600), !1;
});