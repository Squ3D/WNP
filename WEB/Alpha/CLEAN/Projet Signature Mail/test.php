<select name="select" id="selecto">

    <option value="">--Please choose an option--</option>
    <option value="value1" id="1">SEE</option>
    <option value="value2" id="2">Guillebert</option>
    <option value="value3" id="3">Saelen</option>
    <option value="value4" id="4">SEE Produktion</option>
    <option value="value5" id="5">TS-Industrie</option>
    <option value="value6" id="6">Schliesing</option>
</select>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<label for="Name" ">Firstname</label>

<input type="text" id="field1" value="">


<label for="Name" "> Name</label>

<p></p><input type="text" onkeyup="this.value = this.value.toUpperCase();" id="field2" name="Sender[name]" value="">


<label for="Name" "> Email</label>

<input type="text" onkeyup="this.value = this.value.toLowerCase();" id="result" name="Sender[email]" value="">


<script>
    $("#field1, #field2").keyup(function () {
        update();
    });

    function update() {
        var a = "@groupesee.com";
        var b = "@guillebert.fr";
        var c = "@saelen.fr";
        var d = "@see-produktion.net;"
        var e = "@ts-industrie.de";
        var g = "@schliesing.net";
        var x;

        var elt = document.getElementById(selecto);
        if (document.getElementById('selecto').value == "value1") {
            x = a;

        }
        if (document.getElementById('selecto').value == "value2") {
            x = b;
        }
        if (document.getElementById('selecto').value == "value3") {
            x = c;
        }

        $("#result").val($('#field1').val().substr(0, 1).toLowerCase() + $('#field2').val().toLowerCase() + x);
    }
</script>
