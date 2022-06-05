function deleteOpzionamento(id){
    if(confirm("sicuro di voler eliminare?")){
        $.ajax({
            url:'deleteOpzionamento?id='+ id,
            type:'GET',
            dataType: "json",
            error: function(response){
                alert("errore");
            },
            success:function(response){
               $("#oid"+id).remove();
                },
            contentType: false,
            processData: false
        })
    }
}