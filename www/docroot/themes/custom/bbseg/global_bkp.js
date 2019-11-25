function readLocalCss(){
    var script = $('link').filter(function () {
        return $(this).attr('href').indexOf('/themes/custom/bbseg/css/main.css') >= 0;
    });

    script.attr('href', '/themes/custom/bbseg/css/main.css?v=' + parseInt(Math.random() * 100000));
}

$(function () {

})