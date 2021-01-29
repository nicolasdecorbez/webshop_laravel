function createBasket() {
    var total = 0;
    var size = localStorage.length;
    var table = document.getElementsByTagName("table");
    var price = document.getElementById("price");
    for (var i = 0; i < size; i++) {
        var test = localStorage.key(i);
        var Url = "/basket/basket/" + test;
        var button = 0;

        if (localStorage.getItem(test) != null) {
            $.ajax({
                url: Url,
                type: 'GET',
                success: function (data) {
                    for (var line of $(data)) {
                        var Products = Number(localStorage.getItem(line.id));
                        var product = document.createElement("tr");
                        product.setAttribute("id", line.id);
                        var p1 = document.createElement("td");
                        p1.setAttribute("class", "basket_colort b_cen b_p10");
                        var v1 = document.createElement("button");
                        v1.setAttribute("onclick", "deleteProduct(" + line.id + ")");
                        v1.setAttribute("class", "b_del");
                        var v2 = document.createElement("i");
                        v2.setAttribute("class", "fas fa-times");
                        v1.appendChild(v2);
                        p1.appendChild(v1);

                        var p2 = document.createElement("td");
                        p2.setAttribute("class", "basket_colort b_p10");
                        p2.innerHTML = "" + line.title;

                        var p3 = document.createElement("td");
                        p3.setAttribute("class", "basket_colort b_cen");

                        var f1 = document.createElement("form");
                        f1.setAttribute("id", "update" + line.id);
                        f1.setAttribute("name", "update" + line.id);
                        f1.setAttribute("onsubmit", "updateProduct(" + line.id + ")");
                        f1.setAttribute("class", "basket_form");
                        var f2 = document.createElement("div");
                        f2.setAttribute("class", "b_form_c");

                        var f2_i = document.createElement("input");
                        f2_i.setAttribute("type", "number");
                        f2_i.setAttribute("id", "number" + line.id);
                        f2_i.setAttribute("name", "number");
                        f2_i.setAttribute("value", Products);
                        f2_i.setAttribute("class", "b_chmp");

                        var f3 = document.createElement("div");
                        f3.setAttribute("class", "b_form_c");

                        var f3_s = document.createElement("button");
                        f3_s.setAttribute("type", "submit");
                        f3_s.setAttribute("class", "b_butt");

                        var f3_s1 = document.createElement("i");
                        f3_s1.setAttribute("class", "fas fa-undo-alt");

                        var p4 = document.createElement("td");
                        p4.setAttribute("class", "basket_colort b_cen");
                        p4.innerHTML = "" + line.price + "€";

                        f2.appendChild(f2_i);
                        f3_s.appendChild(f3_s1);
                        f3.appendChild(f3_s);
                        f1.appendChild(f2);
                        f1.appendChild(f3);
                        p3.appendChild(f1);
                        product.appendChild(p1);
                        product.appendChild(p2);
                        product.appendChild(p3);
                        product.appendChild(p4);

                        total += Products * line.price;

                    }

                    table[0].appendChild(product);
                    var p5 = document.getElementById("total");
                    p5.innerHTML = total + "€";
                    if(button != 1){
                    var p7 = document.createElement("button");
                    var f4 = document.createElement("i");
                    f4.setAttribute("class", "fab fa-paypal");
                    p7.setAttribute("id", "pay");
                    p7.setAttribute("class", "b_ppal buy_butt");
                    p7.appendChild(f4);
                    price.appendChild(p7);
                    button =1;
                    }
                    var p7 = document.getElementById("pay");
                    p7.setAttribute("onclick", "Pay(" + total + ")");
                }

            });
        }
    }
    
}

createBasket();

function fillBasket(id) {
    if (localStorage.getItem(id) == undefined) {
        localStorage.setItem(id, 1);
    } else {
        var val = Number(localStorage.getItem(id));
        new_val = val++;
        localStorage.setItem(id, new_val);
    }
}

function updateProduct(id) {

    var val = Number(document.getElementById("number" + id).value);
    var update = localStorage.setItem(id, val);
    return update;
}

function deleteProduct(id) {

    localStorage.removeItem(id);
    var product = document.getElementById(id);
    var table = document.getElementsByTagName("table");
    product.setAttribute("hidden", "yes");
    table.appendChild(product);





}
function buyProduct(id) {
    if (localStorage.getItem(id) == undefined) {
        localStorage.setItem(id, 1);
    } else {
        var val = Number(localStorage.getItem(id));
        new_val = val + 1;
        localStorage.setItem(id, new_val);
    }
}

function Pay(total) {
    var size = localStorage.length;

    for (var i = 0; i < size + 1; i++) {
        var test = localStorage.key(i);
        var val = localStorage.getItem(test);
        var Url = "/basket/pay/pay/" + total + "/" + test + "/" + val;

        if (val != null) {

            $.ajax({
                url: Url,
                type: 'GET',
            });
        }
    }

}