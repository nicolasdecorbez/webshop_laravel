
var agreed = "agreed";

function setCookie() {
    var value = getCookie();
    if (value == 0) {
        document.cookie = "agreed=0";

        var Foot = document.getElementsByTagName('footer');
        Foot[0].setAttribute("class", "footer_custom h80");
        var Cookie = document.createElement('div');
        Cookie.setAttribute("id", "cookie");
        Cookie.setAttribute("class", "foot_cookie");
        Cookie.innerHTML = "Vos données seront sauvegardées. Acceptez vous?";
        var Accept = document.createElement('button');
        var acceptText = document.createElement('i');
        acceptText.setAttribute("class", "fas fa-check");
        Accept.setAttribute("id", "conf");
        Accept.setAttribute("onclick", "updateCookie()");
        Accept.setAttribute("class", "cookie_accept");
        Accept.appendChild(acceptText);
        Cookie.appendChild(Accept);
        Foot[0].appendChild(Cookie);
    }
    setInterval(function() {
        var element = 0;
        var size = localStorage.length;
        for (var i = 0; i < size; i++) {
          if (localStorage.key(i) != null) {
            element = element + 1;
          }
        }
        document.getElementById("element_head").innerHTML = "Panier : " + element;
      }, 100);
}



function updateCookie() {
    document.cookie = "agreed=1";
    var Foot = document.getElementsByTagName('footer');
    Foot[0].setAttribute("class", "footer_custom h50");
    var Cookie = document.getElementById("cookie");
    Cookie.setAttribute("hidden", "yes");
}

function getCookie() {
    var c_name = agreed + "=";
    var c_usable = decodeURIComponent(document.cookie);
    var parser = c_usable.split(';');
    for (var i = 0; i < parser.length; i++) {
        var check = parser[i];
        while (check.charAt(0) == ' ') {
            check = check.substring(1);
        }
        if (check.indexOf(c_name) == 0) {
            return check.substring(c_name.length, check.length);
        }
    }
    return "0";
}

