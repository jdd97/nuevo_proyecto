<script>
    var base_url = "<?php echo base_url(); ?>";
 $(".btn-view-producto").on("click",function(){
    var base_url = "<?php echo base_url(); ?>";    
    var id = $(this).val();
      //  alert(id);
        $.ajax({
            url: base_url + "Productos/view/"+ id,
            type: "POST",
            success: function(resp){
                $("#modal-info .modal-body").html(resp);
               // alert(resp);
            }
        });
    });

          $(".btn-remove").on("click",function(e){
            
        //se cancela la accion del href
        e.preventDefault();
        
//ruta contiene la info de href de enlace
       var ruta = $(this).attr("href");
//metodo ajax pasa la ruta como parametro
       $.ajax({
           url: ruta,
//se hace por el metodo post
           type:"POST",
           success:function(resp){
               window.location.href = base_url + resp;
           } 
       });
    });

</script>