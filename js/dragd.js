var res = new Array();

  

$(document).ready(function() {

//declarara arreglo para guardar las respuestas.

var startPos = {x: 0, y: 0};
//declara clase que tendra la funcionalida de drag
interact('.respuesta').draggable({
    snap: {
      targets: [startPos],
      range: Infinity,
      relativePoints: [ { x: 0.5, y: 0.5 } ],
      endOnly: true     
    },
    onstart: function (event) {
          var rect = interact.getElementRect(event.target);

          // record center point when starting the very first a drag
          startPos = {
              x: rect.left + rect.width  / 2,
              y: rect.top  + rect.height / 2
          }
          event.interactable.draggable({
              snap: {
                  targets: [startPos]
              }
          });
      },
 
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    restrict: {
      restriction: "body",
      endOnly: true,
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    },
    // enable autoScroll
    autoScroll: true,
    // call this function on every dragmove event
    onmove: dragMoveListener,
  });



// enable draggables to be dropped into this
interact('.dropzone').dropzone({  

  
  // Require a 50% element overlap for a drop to be possible
  accept:'.respuesta',
  overlap: 'center',

  // listen for drop related events:
  ondropactivate: function (event) {
    // add active dropzone feedback
    event.target.classList.add('drop-active');
  },
  ondragenter: function (event) {
    var draggableElement = event.relatedTarget,
        dropzoneElement = event.target;
        dropRect         = interact.getElementRect(dropzoneElement),
        dropCenter = {
          x: dropRect.left + dropRect.width  / 2,
          y: dropRect.top  + dropRect.height / 2
        };
        event.draggable.draggable({
          snap: {
            targets: [dropCenter]
        }
      });
    // feedback the possibility of a drop
    dropzoneElement.classList.add('drop-target');
  },
  ondragleave: function (event) {
    event.draggable.draggable({
        snap: {
            targets: [startPos]
        }
    });
    // remove the drop feedback style
    event.target.classList.remove('drop-target');

  },
  ondrop: function (event) {

    if(res.length == 0){
      res.push([event.target.id,event.relatedTarget.id]);
    } else {
      var i = 0;
      var encontro = "no";
      while (i < res.length) {
        var pre = event.target.id; 
        if(parseInt(res[i][0]) == parseInt(pre)){
          //alert("elemento "+res[i][0]+" se le asignara res "+event.relatedTarget.id);
          res[i][1] = event.relatedTarget.id;
          encontro = "si";
          break;
        } else{
          i++;
        }
      } 

      if (encontro == "no" && res.length >= 1 ){
        res.push([event.target.id,event.relatedTarget.id]);
      }
    }
    //activar el boton de evaluar cuando el array tenga las 10 respuestas
    if (res.length == 4) {
      $('#evaluar-btn').attr("disabled", false);
    }
    console.log(res);
  },
  ondropdeactivate: function (event) {
    // remove active dropzone feedback  
    event.target.classList.remove('drop-active');
    event.target.classList.remove('drop-target');

  } 
});

function dragMoveListener (event) {
  var target = event.target,
  // keep the dragged position in the data-x/data-y attributes
  x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
  y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

  // translate the element
  target.style.webkitTransform = 
  target.style.transform = 
  'translate(' + x + 'px, ' + y + 'px)';
  // update the posiion attributes
  target.setAttribute('data-x', x);
  target.setAttribute('data-y', y);
}



//al hacer clicl en el boton de evaluar se hace un AJAX al servidor para evaluar.
$('#evaluar-btn').click(function(event) {
  event.preventDefault();
  //var datos = JSON.stringify(res);
  $('#evaluar-btn').attr("disabled", true);
  //aqui comienza ajax
  $.ajax({
    url: 'evaluar.php',
    type: 'POST',
    dataType:'JSON',
    data: {respuestas:res},
    success: function(response){
      //el puntaje retornado por el server se asigna al Modal y luego se muestra.
      $("#puntaje").text(response+" /4 Puntos");
      $("#puntaje_oculto").val(response);
      $("#modal_puntaje").modal('show');

    }
  })
});


$('#guardar_btn').click(function(event) {
  $("#modal_puntaje").modal('hide');
  $("#modal_guardar").modal('show');
});



$('#enviar').click(function(event) {
  event.preventDefault();
  //var datos = JSON.stringify(res);
  $('#guardar_btn').attr("disabled", true);
  $('#enviar').attr("disabled", true);
  var nombre = $('#nombre').val();
  var apellido = $('#apellido').val();
  var puntaje = $("#puntaje_oculto").val();
  var contrasena = $("#contrasena").val();
  //aqui comienza ajax
  $.ajax({
    url: 'guardar.php',
    type: 'POST',
    dataType:'JSON',
    data: {respuestas:res, nom : nombre, ape: apellido, pun : puntaje, con: contrasena},
    success: function(response){
      console.log(response);
      if (response == "guardado") {
        Command: toastr["success"]("Notas guardadas con éxito.", "Guardado");
      } else if (response == "invalidPass") {
        Command: toastr["error"]("Contraseña Invalida.", "Error");
      } else{
        Command: toastr["warning"]("No se pudo guardar.", "Algun problema");
      }
    }
  })
});

});