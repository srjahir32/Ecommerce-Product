$(document).ready(function () {
    $(window).resize(function () {
        if ($(window).width() >= 992) {
            $(".in_progressbar").attr("id", "progressbar");
            $(".out_progressbar").attr("id", "");
            $(".corner-nav").show();
            $(".top-corner-nav").hide();
        } else {
            $(".in_progressbar").attr("id", "");
            $(".out_progressbar").attr("id", "progressbar");
            $(".corner-nav").hide();
            $(".top-corner-nav").show();
        }
    }).resize();
});

// cart button
$(".cart_button_right").click(function () {
    $(".cart_button_right, .product_title").hide();
    $(".cart_button_right2, .overview_area").show();
});
$(".cart_button_right2").click(function () {
    $(".cart_button_right2, .overview_area").hide();
    $(".cart_button_right, .product_title").show();
});

//variation option
$("#variation_1").text($("#variations_option1").val());
$("#variations_option1").change(function () {
    $("#variation_1").text($(this).val());
});

$("#variation_2").text($("#variations_option2").val());
$("#variations_option2").change(function () {
    $("#variation_2").text($(this).val());
});

//product info switch
$(".product-info-switch").click(function () {
    $(".product-info-switch, .image_area").hide();
    $(".product-info-switch2, .product-description").show();
});
$(".product-info-switch2").click(function () {
    $(".product-info-switch2, .product-description").hide();
    $(".product-info-switch, .image_area").show();
});

// empty cart button
$(".close_btn").click(function () {
    $(".overview_cart").hide();
    $(".empty_cart").show();
    $(".add_to_cart").show();
    $(".cart_item").text("0");
    $(".next1").addClass("next1-disable");
});

// add to cart button
$(".add_to_cart").click(function () {
    $(".overview_cart").show();
    $(".empty_cart").hide();
    $(".add_to_cart").hide();
    $(".cart_item").text($input.val());
    $(".next1").removeClass("next1-disable");
});

// product detail area
var $input = $("#p_quantity, #o_quantity");
var $price = $("#p_price").find("span");
var $price_value = $price.text();
var $max_qty = $("#p_quantity").attr("max");
$(".cart_item").text($input.val());
var $sub_total = $("#sub_total_price, #total_price").find("span");
$sub_total.text($price.text());
$(".quantity_btn").click(function () {
    $("#p-quantity-plus, #plus1").removeClass("quantity_btn_disable");
    $("#p-quantity-minus, #minus1").removeClass("quantity_btn_disable");
    if ($(this).attr("id") === "p-quantity-plus" || $(this).attr("id") === "plus1") {
        if ($input.val() < parseInt($max_qty)) {
            $input.val(parseInt($input.val()) + 1);
            $price.text((parseFloat($price_value) * $input.val()).toFixed(2));
            $(".cart_item").text($input.val());
            $sub_total.text($price.text());
        }
        if ($input.val() == $max_qty) {
            $("#p-quantity-plus, #plus1").addClass("quantity_btn_disable");
        }
    } else if ($input.val() > 1) {
        $input.val(parseInt($input.val()) - 1);
        $price.text((parseFloat($price_value) * $input.val()).toFixed(2));
        $(".cart_item").text($input.val());
        $sub_total.text($price.text());
        if ($input.val() == 1) {
            $("#p-quantity-minus, #minus1").addClass("quantity_btn_disable");
        }
    }
});

// checkout form 1 validation
function validform1() {
    var valid = true;
    $(".form-control").removeClass("form-control-error");
    if ($("#email").val() === "") {
        $("#email").addClass("form-control-error");
        valid = false;
    } else {
        var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if (!regex.test($("#email").val())) {
            $("#email").addClass("form-control-error");
            valid = false;
        }
    }
    if ($("#country").val() === "") {
        $("#country").addClass("form-control-error");
        valid = false;
    }
    return valid;
}

// checkout form 2 validation
function validform2() {
    var valid = true;
    $(".form-control").removeClass("form-control-error");
    if ($("#name").val() === "") {
        $("#name").addClass("form-control-error");
        valid = false;
    }
    if ($("#address").val() === "") {
        $("#address").addClass("form-control-error");
        valid = false;
    }
    if ($("#city").val() === "") {
        $("#city").addClass("form-control-error");
        valid = false;
    }
    if ($("#zip").val() === "") {
        $("#zip").addClass("form-control-error");
        valid = false;
    }
    if ($("#country").val() == "India") {
        if ($("#state").val() === "") {
            $("#state").addClass("form-control-error");
            valid = false;
        }
    }
    return valid;
}

//multistep form next button
var current_fs, next_fs, previous_fs; //fieldsets
$(".next1").click(function () {
    if (validform1()) {
        $(".next1").attr("value", "Please Wait...");
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //disable state dropudown
        if ($("#country").val() !== "India") {
            $(".stategroup").css("display", "none");
            $("#state").prepend($("<option value=' '></option>"));
            $("#state option[value=' ']").attr('selected', true);
        }
        // show the next fieldset
        next_fs.show();
        current_fs.hide();

        $(".corner-nav").hide();
        $(".top-corner-nav").hide();
        $(".product_title").hide();
        $(".overview_area").hide();
        $(".next_overview").attr('style', 'display: block !important');
    }
});

$(".next2").click(function () {
    if (validform2()) {
        $(".next2").attr("value", "Please Wait...");
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        // show the next fieldset
        next_fs.show();
        current_fs.hide();

        $.ajax({
            type: 'POST',
            url: 'test.php',
            data: $('#msform').serialize(),
            contentType: "application/x-www-form-urlencoded",
            success: function (response) {
                if (response != '') {
                    $("#msform")[0].reset();
                    $('#formdata').html(response)
                } else {
                    $('#formdata').text("Invalid Form Data..")
                }
            }
        });
    }
});

$(".submit").click(function () {
    $(".submit").attr("value", "Please Wait...");
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    // show the next fieldset
    next_fs.show();
    current_fs.hide();
    $("#progressbar").hide();
})