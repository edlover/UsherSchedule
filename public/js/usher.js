var jq = $.noConflict();
jq(document).ready(function(){

    // this is to track the iamhere for the navigation
    var mainid = jq('main').attr('id');
    var navid = '#nav' + mainid;
    jq(navid).attr('id','iamhere');

    // event listener and code for filtering table by team
    jq('#teamlist').change(function(ev) {

        var input = document.getElementById("teamlist");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("servicesTable");
        var tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || filter == "ALL") {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });

    // event listener for logout click event
    jq('#logout').click(function(ev) {
        this.submit();
    });

    // event for team checkboxes for usher forms
    jq('#team_unassigned').on('click',function(){
        if(this.checked){
            jq('.checkboxchecker').each(function(){
                this.checked = false;
                jq(this).trigger('change');
            });
        }else{
             jq('.checkboxchecker').each(function(){
                this.checked = false;
                jq(this).trigger('change');  // added this per http://stackoverflow.com/questions/28922761/how-do-i-trigger-a-custom-javascript-event-when-a-checkbox-is-selected-via-a-jqu
            });
        }
    });

    jq('.checkboxchecker').on('click',function(){
        if(jq('.checkboxchecker:checked').length == jq('.checkboxchecker').length){
            jq('#team_unassigned').prop('checked',false);
        }else{
            ('#team_unassigned').prop('checked',false);
        }
    });
});
