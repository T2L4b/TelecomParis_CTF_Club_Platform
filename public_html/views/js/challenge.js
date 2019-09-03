var chall;

function loadPage() {
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }

    chall = $_GET['chall'];

    var data = JSON.stringify({
        // TODO : Insert real token from cookie
        "jwt": "token"
    });

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                chall_data = JSON.parse(this.response)
                document.getElementById("title").innerHTML = chall_data['title'];
                document.getElementById("difficulty").innerHTML = chall_data['difficulty'];
                switch (chall_data['difficulty']) {
                case 'Accessible':
                    document.getElementById("difficulty_border").classList.add("border-left-success");
                    document.getElementById("difficulty_text").classList.add("text-success");
                    document.getElementById("difficulty_progress_bar").classList.add("bg-success");
                    document.getElementById("difficulty_progress_bar").style.width = "25%";
                    break;
                case 'Intermédiaire':
                    document.getElementById("difficulty_border").classList.add("border-left-warning");
                    document.getElementById("difficulty_text").classList.add("text-warning");
                    document.getElementById("difficulty_progress_bar").classList.add("bg-warning");
                    document.getElementById("difficulty_progress_bar").style.width = "50%";
                    break;
                case 'Difficile':
                    document.getElementById("difficulty_border").classList.add("border-left-danger");
                    document.getElementById("difficulty_text").classList.add("text-danger");
                    document.getElementById("difficulty_progress_bar").classList.add("bg-danger");
                    document.getElementById("difficulty_progress_bar").style.width = "75%";
                    break;
                default:
                    document.getElementById("difficulty_border").classList.add("border-left-gray-900");
                    document.getElementById("difficulty_text").classList.add("text-gray-900");
                    document.getElementById("difficulty_progress_bar").classList.add("bg-gray-900");
                    document.getElementById("difficulty_progress_bar").style.width = "100%";
                }
                var authors = "";
                
                chall_data['authors'].forEach(function(auth) {
                    if (authors != "") {
                        authors += ", ";
                    }
                    authors += auth;
                });
                document.getElementById("authors").innerHTML = authors;
                document.getElementById("points").innerHTML = chall_data['points'] + " points";         
                document.getElementById("statement").innerHTML = chall_data['statement']; 
                document.getElementById("chall_url").href = chall_data['url']; 
            } else if (this.status === 404) {
                window.location = '404.php';
            } else if (this.status === 400) {
                window.location = '400.php';
            }
        }
    });

    xhr.open("GET", "http://192.168.99.100:8082/api/challenge/read.php?idChall=" + chall);    
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("cache-control", "no-cache");

    xhr.send(data);
}

function validateChall() {
    var flag = document.getElementById("flag").value;
    // FIXME : Remove user param once auth is ok with jwt
    var data = JSON.stringify({
        "jwt": "key",
        "flag": flag,
        "chall": chall,
        "user": "C4LL_M3_R00T_B1TCH"
    });

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                var response = JSON.parse(this.responseText);                
                if (response["message"] === "Flag is valid") {
                    document.getElementById("msgFlag").classList.add('bg-gradient-success');
                    document.getElementById("msgFlag").innerHTML = "Bien joué l'escroc !";
                    document.getElementById("msgFlag").style.display = "block";
                } else {
                    document.getElementById("msgFlag").classList.add('bg-gradient-danger');
                    document.getElementById("msgFlag").innerHTML = "Désolé, ce n'est pas le bon flag";
                    document.getElementById("msgFlag").style.display = "block";
                }
            } else {
                document.getElementById("msgFlag").classList.add('bg-gradient-danger');
                document.getElementById("msgFlag").innerHTML = "Une erreur est survenue";
                document.getElementById("msgFlag").style.display = "block";
            }
        }
    });
    xhr.open("POST", "http://192.168.99.100:8082/api/challenge/validate.php");
    xhr.setRequestHeader("cache-control", "no-cache");

    xhr.send(data);
}

