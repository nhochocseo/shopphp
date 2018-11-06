function number_format(number, decimals, dec_point, thousands_sep) {
    var n = number,
        c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "," : thousands_sep,
        s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;

    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function AddCart(that) {
    var domain = document.domain;
    var $this = $(that);
    var active = $this.attr('active');
    $this.children('.addtext').text(active);
    $this.children('.icon-cd').removeClass("glyphicon-shopping-cart").addClass("glyphicon-thumbs-up");
    var NumberCart = document.getElementById('Carts').innerHTML;
    var TotalPrice = document.getElementById('TotalPrice').innerHTML;
    var dkm = TotalPrice.replace(/[,]/g, '');
    TotalPrice = parseInt(dkm);
    NumberCart = parseInt(NumberCart);
    NumberCart = NumberCart + 1;
    //count + total price
    var price = $this.attr('price');
    price = parseInt(price);
    TotalPrice = TotalPrice + price;

    var productId = $this.attr('id-product');

    var request = $.ajax({
        type: 'POST',
        url: '?pages=cart&action=buy',
        data: {
            type: "PrId",
            PrId: productId
        },
        success: function(response) {
            if (response == 1) {}
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {}
    });
    document.getElementById('Carts').innerHTML = NumberCart;
    document.getElementById('Carts2').innerHTML = NumberCart;
    document.getElementById('TotalPrice').innerHTML = number_format(TotalPrice, 0, ",", ",", ",") + " VNĐ";

    var id_input = 'Number_Pr' + productId;

    num_sp = document.getElementById(id_input).value;
    num_sp = parseInt(num_sp);
    num_sp = num_sp + 1;
    document.getElementById(id_input).value = num_sp;


    var tangId = $this.attr('id-product');
    var Id_IntoMoney = 'IntoMoney_' + tangId;
    var IntoMoney = document.getElementById(Id_IntoMoney).innerHTML;
    var dkm2 = IntoMoney.replace(/[,]/g, '');
    IntoMoney = parseInt(dkm2);
    IntoMoney = IntoMoney + price;
    document.getElementById(Id_IntoMoney).innerHTML = number_format(IntoMoney, 0, ",", ",", ",");



}

function Add_Number_Product(that) {
    var domain = document.domain;
    var $this = $(that);
    var active = $this.attr('active');
    $this.children('.icon-cd').text(active);
    var NumberCart = document.getElementById('Carts').innerHTML;
    var TotalPrice = document.getElementById('TotalPrice').innerHTML;
    var total_price = document.getElementById('total_price').innerHTML;
    var dkm = TotalPrice.replace(/[,]/g, '');
    TotalPrice = parseInt(dkm);
    //tang price gio hang
    var price = $this.attr('price');
    price = parseInt(price);
    TotalPrice = TotalPrice + price;

    var productId = $this.attr('id-product');

    var request = $.ajax({
        type: 'POST',
        url: '?pages=cart&action=buy',
        data: {
            type: "PrId",
            PrId: productId
        },
        success: function(response) {
            if (response == 1) {}
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {}
    });
    document.getElementById('TotalPrice').innerHTML = number_format(TotalPrice, 0, ",", ",", ",") + " VNĐ";
    document.getElementById('total_price').innerHTML = document.getElementById('TotalPrice').innerHTML;
    document.getElementById('total_product').innerHTML = document.getElementById('TotalPrice').innerHTML;

    var id_input = 'Number_Pr' + productId;

    num_sp = document.getElementById(id_input).value;
    num_sp = parseInt(num_sp);
    num_sp = num_sp + 1;
    document.getElementById(id_input).value = num_sp;


    var tangId = $this.attr('id-product');
    var Id_IntoMoney = 'IntoMoney_' + tangId;
    var IntoMoney = document.getElementById(Id_IntoMoney).innerHTML;
    var dkm2 = IntoMoney.replace(/[,]/g, '');
    IntoMoney = parseInt(dkm2);
    IntoMoney = IntoMoney + price;
    document.getElementById(Id_IntoMoney).innerHTML = number_format(IntoMoney, 0, ",", ",", ",");



}
//xóa giỏ hàng
function Delete_Cart() {
    var domain = document.domain;

    var request = $.ajax({
        type: 'POST',
        url: '?pages=cart&Delete=true',
        data: {
            type: "PrId",
        },
        success: function(response) {
            if (response == 1) {}
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {}
    });
    document.getElementById('Carts').innerHTML = 0;
    document.getElementById('Carts2').innerHTML = 0;
    document.getElementById('TotalPrice').innerHTML = 0;
}
//xóa số lượng  sản phẩm trong giỏ hàng
function Delete_One(that) {
    var num_sp;
    var $this = $(that);
    var domain = document.domain;
    var TotalPrice = document.getElementById('TotalPrice').innerHTML;
    var dkm = TotalPrice.replace(/[,]/g, '');
    TotalPrice = parseInt(dkm);
    //tang price gio hang
    var price = $this.attr('price');
    price = parseInt(price);
    TotalPrice = TotalPrice - price;




    var xoaId = $this.attr('Delete');
    var request = $.ajax({
        type: 'POST',
        url: '?pages=cart&Delete1=' + xoaId,
        data: {
            type: "PrId",
        },
        success: function(response) {
            if (response == 1) {}
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {}
    });

    var id_input = 'Number_Pr' + xoaId;
    var Id_IntoMoney = 'IntoMoney_' + xoaId;
    var IntoMoney = document.getElementById(Id_IntoMoney).innerHTML;
    var dkm2 = IntoMoney.replace(/[,]/g, '');
    IntoMoney = parseInt(dkm2);
    IntoMoney = IntoMoney - price;
    num_sp = document.getElementById(id_input).value;
    var num_sp = num_sp - 1;

    if (num_sp > 0) {
        document.getElementById(id_input).value = num_sp;
        document.getElementById(Id_IntoMoney).innerHTML = number_format(IntoMoney, 0, ",", ",", ",");
        document.getElementById('TotalPrice').innerHTML = number_format(TotalPrice, 0, ",", ",", ",") + " VNĐ";
        document.getElementById('total_price').innerHTML = document.getElementById('TotalPrice').innerHTML;
        document.getElementById('total_product').innerHTML = document.getElementById('TotalPrice').innerHTML;
    }

}
