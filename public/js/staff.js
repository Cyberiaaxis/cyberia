let showRole = function(response){

};

$(function(){

    var staffPanel = function(operation) {

        $.post('/staff', {role})
         .done(response => 
            {   
                console.log(response);
                role = response;
                showRole(response);
            })

         .fail(response => {console.log(response)}); 
    }

    $('.submitRole').on('click', function(event){
        if(confirm("Are You Sure?")){
            showRole('submit');     
        }
    });


});
