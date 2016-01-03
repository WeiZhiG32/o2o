var member_work1 = setInterval(function() {
    member1()
}, 5000);
var member_work2 = setInterval(function() {
    member2()
}, 5000);
var member_work3 = setInterval(function() {
    member3()
}, 5000);
var member_work4 = setInterval(function() {
    member4()
}, 5000);
var member_work5 = setInterval(function() {
    member5()
}, 5000);
var member_work6 = setInterval(function() {
    member6()
}, 5000);
var page_reload = setInterval(function() {
    reload()
}, 600000);

function reload() {
    location.reload();
}

function member1() {
    $.get("http://120.114.104.60/o2o/d_record.php?name=A&place=統二鞋店");
}
function member2() {
    $.get("http://120.114.104.60/o2o/d_record.php?name=B&place=奇樂咖啡");
}
function member3() {
    $.get("http://120.114.104.60/o2o/d_record.php?name=C&place=統二鞋店");
}
function member4() {
    $.get("http://120.114.104.60/o2o/d_record.php?name=D&place=城市3C");
}
function member5() {
    $.get("http://120.114.104.60/o2o/d_record.php?name=E&place=城市3C");
    }
function member6() {
    $.get("http://120.114.104.60/o2o/d_record.php?name=F&place=統二鞋店");
}