var delay = ( function() {
    var timer = 0;
    return function(callback, ms) {
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();
delay(function(){
    document.getElementById("card-support").style.display = "block";
}, 4000 )


