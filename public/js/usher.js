$(document).ready(function(){
    // event listener for logout click event
    $('#logout').click(function(ev) {
        this.submit();
    });

    // event for team checkboxes for usher forms
    $('#team_unassigned').on('click',function(){
        if(this.checked){
            $('.checkboxchecker').each(function(){
                this.checked = false;
                $(this).trigger('change');
            });
        }else{
             $('.checkboxchecker').each(function(){
                this.checked = false;
                $(this).trigger('change');  // added this per http://stackoverflow.com/questions/28922761/how-do-i-trigger-a-custom-javascript-event-when-a-checkbox-is-selected-via-a-jqu
            });
        }
    });

    $('.checkboxchecker').on('click',function(){
        if($('.checkboxchecker:checked').length == $('.checkboxchecker').length){
            $('#team_unassigned').prop('checked',false);
        }else{
            $('#team_unassigned').prop('checked',false);
        }
    });
});
