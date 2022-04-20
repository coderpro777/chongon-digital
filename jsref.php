    <!-- Bootstrap core JavaScript-->
   <!--  <script src="vendor/jquery/jquery.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="vendor/datatables/jquery.dataTables.js"></script> -->
    <!--   <script src="vendor/datatables/dataTables.bootstrap4.js"></script> -->
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.js"></script>  
    
    <script>
        // detectar el valor de la seccion actual.
        var locationid = $("#locationid").val();
        //busca el href que coincida con el valor obtenido.
        var linkmark = $('a[href^="'+locationid+'"]');
        
        //asigna el texto bold a ese link.
        linkmark.css("font-weight", "bold");
        
        //encontrar el li mas cercano y añadir la clase show.
        var modulo = linkmark.closest('li.dropdown');
        modulo.addClass('show');
        //encontrar el div y añadir clase show.
        var modulo2 = linkmark.closest('div');
        modulo2.addClass('show');
 // document.onclick = function(){$(".WACStatusBarContainer").css("display", "none");};

// $('#iframePPT').contents().find('.WACStatusBarContainer, style').remove();


 // document.getElementById("WACStatusBarContainer").style.display = "none";


    </script>
<!-- <body onclick="$(".WACStatusBarContainer").css("display", "none");"> -->
    <!-- Demo scripts for this page-->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <!-- <script src="js/scripts.js"></script> -->