var myVar2 = setInterval(function() {
    total()
}, 500);
var myVar3 = setInterval(function() {
    reload_page()
}, 600000);

function reload_page() {
    location.reload();
}

function total() {
    $.get('/o2o/index.php', function(data) {

        document.getElementById("number1_0").innerHTML = data.data_1.exit1;
        document.getElementById("number1_3").innerHTML = data.data_1.exit2;
        document.getElementById("number1_5").innerHTML = data.data_1.exit3;
        document.getElementById("number1_8").innerHTML = data.data_1.exit4;

        document.getElementById("number2_0").innerHTML = data.data_2[0].number;
        document.getElementById("number2_1").innerHTML = data.data_2[1].number;
        document.getElementById("number2_2").innerHTML = data.data_2[2].number;
        document.getElementById("number2_3").innerHTML = data.data_2[3].number;
        document.getElementById("number2_4").innerHTML = data.data_2[4].number;
        document.getElementById("number2_5").innerHTML = data.data_2[5].number;
        document.getElementById("number2_6").innerHTML = data.data_2[6].number;
        document.getElementById("number2_7").innerHTML = data.data_2[7].number;
        document.getElementById("number2_8").innerHTML = data.data_2[8].number;
        document.getElementById("number2_9").innerHTML = data.data_2[9].number;


    }, "json");

}
