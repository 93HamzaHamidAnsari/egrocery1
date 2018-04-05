     <script>
            function ajx(str,urll,id) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", ""+urll+"?q=" + str, true);
        xmlhttp.send();
    }
}

      
    </script>