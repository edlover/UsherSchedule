$(document).ready(function(){
    // this is to track the iamhere for the navigation
    var mainid = $('main').attr('id');
    var navid = '#nav' + mainid;
    $(navid).attr('id','iamhere');
});
