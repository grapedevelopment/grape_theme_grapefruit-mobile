$('#openBtn').on('click',function(){
    console.log("something");
    $( "#modal-body" ).load( "ajax/test.html" );
    /*$('#modal-body').load('content.html',function(){
        $('#myModal').modal({show:true});
    });*/
});