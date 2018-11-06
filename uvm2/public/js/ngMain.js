var app = angular.module('App', ['ngMaterial', 'ngSanitize']);

app.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}]);

app.controller('MesasSillasController', [
  "$scope",
  "$http",
  "$mdDialog",
  "$timeout",
  "$window",
  function ($scope, $http, $mdDialog, $timeout, $window) {

    $scope.idsMesas = "";
    $scope.idsSillas = "";
    //$scope.idReservacion = "";
    $scope.data = []; // mesa, silla
    $scope.usuario = "";
    $scope.arrTargets = []; //objeto en el dom, estado
    $scope.hiddendiv = true;
    $scope.hiddenButton = false;
    console.log($scope.hiddenButton);
    $scope.asientosDisponibles = 0;
    $scope.asientosDisponibles = angular.element("#asientosDisponibles").val();
    $scope.arrMesasSillasRegistradas = [];
    var idReservacionUsuario = angular.element("#idReservacionUsuario").val();

    if(idReservacionUsuario==null || idReservacionUsuario=="" || idReservacionUsuario==undefined
    || +$scope.asientosDisponibles>0 || +idReservacionUsuario<1){
      $scope.hiddenButton = true;
    }

    angular.element("#disponibles").html($scope.asientosDisponibles);

    //console.log("los asientos disponibles son: " + $scope.asientosDisponibles);

    //FUNCION PARA OBTENER LOS DATOS A REGISTRAR EN LA RESERVACION
    $scope.agregarMesaSilla = function (event, idS, idM, ocupada) {

      var arrAux = [];
      var target = event.target;
      var arrTargetsAux = [];
      var colorSillaSelec = "#F7819F";
      var encontrado = false;
      var nombres = angular.element("#nombres").val();
      var idReservacionUsuario = angular.element("#idReservacionUsuario").val();

      if (ocupada == "")
        ocupada = 0;

      //console.log(target);
      //console.log("esta ocupada: " + ocupada + "               idReservacionUsuario: " +
        //$scope.idReservacionUsuario +
        //"    nombres: " + nombres + "    idReservacionUsuario: " + idReservacionUsuario);

      if (!ocupada && nombres != null && nombres != undefined && nombres !== "") {
        //Seleccionar y deseleccionar lugar
        angular.forEach($scope.arrTargets, function (val, key) {

          if (target.id === val[0].id) {
            encontrado = true;
            if (val[1]) {
              val[1] = false;
              toggle = true;
              val[0].setAttribute("stroke", "transparent");
              val[0].setAttribute("stroke-width", "0");
              $scope.asientosDisponibles++;
              angular.element("#disponibles").html($scope.asientosDisponibles);
            } else {
              if ($scope.asientosDisponibles > 0) {
                val[1] = true;
                toggle = true;
                target.setAttribute("stroke", colorSillaSelec);
                target.setAttribute("stroke-width", "3");
                $scope.asientosDisponibles--;
                angular.element("#disponibles").html($scope.asientosDisponibles);
              }
            }
          }
        });

        if (!encontrado && $scope.asientosDisponibles > 0) {
          target.setAttribute("stroke", colorSillaSelec);
          target.setAttribute("stroke-width", "3");

          arrAux.push(target);
          arrAux.push(true);
          arrAux.push(idM);
          arrAux.push(idS);
          $scope.arrTargets.push(arrAux.slice());
          arrAux.length = 0;
          $scope.asientosDisponibles--;
          angular.element("#disponibles").html($scope.asientosDisponibles);
          //console.log(target);
          //console.log("el numero de asientos disponibles: " + $scope.asientosDisponibles);
        }
      }
      //console.log("el arreglo de datos : ............." + $scope.arrTargets);
    };

    //FUNCION PARA AGREGAR LUGARES A SER RESERVADOS
    $scope.registrarReservMS = function () {

      var html = "";
      var arrAux = [];
      var arrOrdenado = [];
      var arrMesasSillasFinal = [];
      var arrMesaSilla = [];
      var auxMesa = "";
      var AuxSilla = "";

      //console.log("+++++++++++++++++++++++++++++" + $scope.arrTargets);
      $scope.arrTargets.sort(function (a, b) {
        return a[2] - b[2]
      });
      //console.log("-----------------------------" + $scope.arrTargets);

      $scope.data = $scope.arrTargets.filter(function (target) {
        if (target[1])
          return target[1];
      });

      //console.log("******************************" + $scope.data);

      if ($scope.data.length > 0) {

        html += "<table class='table table-bordered'>" +
          "<thead class='thead-dark'>" +
          "<tr>" +
          "<th>Mesa</th>" +
          "<th>Silla</th>" +
          "</tr>" +
          "</thead>" +
          "<tbody>";

        var m = "";
        var mesaAnterior = $scope.data[0][2];
        var sillaAnterior = "";

        angular.forEach($scope.data, function (val, key) {

          if (mesaAnterior === val[2]) {
            arrAux.push(val[3]);
          } else {

            arrMesaSilla.push(mesaAnterior);
            arrMesaSilla.push(arrAux.slice());
            arrMesasSillasFinal.push(arrMesaSilla.slice());

            arrAux.length = 0;
            arrMesaSilla.length = 0;

            arrAux.push(val[3]);
            mesaAnterior = val[2];
          }

        });

        arrMesaSilla.push(mesaAnterior);
        arrMesaSilla.push(arrAux.slice());
        arrMesasSillasFinal.push(arrMesaSilla.slice());
        var i = 0;

        angular.forEach(arrMesasSillasFinal, function (val, key) {

          //console.log(val);
          //console.log(val[0]);
          html += "<tr>" +
            "<td><h5><span class='badge badge-pill badge-info'>" + (+val[0] + 1) + " </span></h5></td>" +
            "<td style='font-size: 24px;'>";
          angular.forEach(val[1], function (val1, key1) {
            //console.log(val1);
            html += " <span  class='badge  badge-info font-weight-bold'> " +
              (+val1 + 1) + " </span> ";
            if (i == 0) {
              $scope.idsMesas = val[0] + "";
              $scope.idsSillas = val1 + "";
              i = 1;
            } else {
              $scope.idsMesas += "," + val[0];
              $scope.idsSillas += "," + val1;
            }
          });
          html += "</td></tr>";
        });

        html += "</tbody>" +
          "</table>";

        //console.log("muestra el html: " + html);

        $scope.modal("Registro de Reservaciones", html, "Aceptar", "aceptarReservacion");
      } else {
        $scope.errorModal(
          "Error en la reservación",
          "<h3><span class='badge badge-warning'>Debe seleccionar un lugar para ser reservado.</span></h3>",
          "OK");
      }
    };

    //FUNCION PARA LIMPIAR CONTROLLES
    $scope.limpiarControles = function () {

      angular.forEach($scope.arrTargets, function (val, key) {
        val[0].setAttribute("stroke", "transparent");
        val[0].setAttribute("stroke-width", "0");
      });

      $scope.idsMesas = "";
      $scope.idsSillas = "";
      $scope.usuario = "";
      $scope.arrTargets.length = 0;
      $scope.data.length = 0;
      //$scope.idReservacion = "";
    };

    //MODAL PARA MOSTRA CUALQUIER MENSAJE EN PANTALLA
    $scope.modal = function (titulo, mensaje, btnVal, confirmFunc) {

      var confirm = $mdDialog.confirm()
        .title(titulo)
        .htmlContent(mensaje)
        .ariaLabel('Mensaje')
        .targetEvent(0)
        .ok(btnVal)
        .cancel('Cancelar');
      $mdDialog.show(confirm).then(function () {

        switch (confirmFunc) {
          case "imprimirLugares":
            $scope.imprimirLugares();
            break;
          case "aceptarReservacion":
            $scope.aceptarReservacion();
            break;
          default:
            break;
        }
      }, function () {
        $scope.limpiarControles();
        switch (confirmFunc) {
          case "imprimirLugares":
            break;
          case "aceptarReservacion":
            $scope.asientosDisponibles = angular.element("#asientosDisponibles").val();
            break;
          default:
            break;
        }

      });
    };

    //Se confirma la reservación y se procesa la solicitud
    $scope.aceptarReservacion = function () {
      //console.log($scope.idsMesas + " ................   " + $scope.idsSillas + " -----  " + $scope.idReservacionUsuario);
      $http({
          method: 'POST',
          url: '/registrarMesaSilla',
          params: {
            accion: 'registrarReservMS',
            idsMesas: $scope.idsMesas,
            idsSillas: $scope.idsSillas,
            idReservacion: $scope.idReservacionUsuario,
          }
        })
        .then(function successCallback(response) {

          var colorOcupado = "#BEF781";
          var colorReservado = "#A9D0F5";
          var status = angular.element("#status").val();
          var idReservacionUsuario = angular.element("#idReservacionUsuario").val();

          angular.forEach($scope.arrTargets, function (val, key) {
            if (val[1]) {
              if (status == 1) {
                val[0].setAttribute("fill", colorOcupado);
              } else {
                val[0].setAttribute("fill", colorReservado);
              }
            }
          });

          angular.element("#asientosDisponibles").val(0);
          $scope.limpiarControles();
          //console.log(response.data);

          var html = "";

          $scope.modal(
            "Lugares Reservados",
            "<h3><span class='badge badge-info'>Lugares reservados corectamente</span></h3>",
            "Acpetar",
            "aceptar",
          );

          $scope.hiddenButton = false;

          location.href = "mesas";

        }, function errorCallback(response) {
          $scope.limpiarControles();
          $scope.errorModal(
            "Error",
            "<h3><span class='badge badge-danger'>Ha ocurrido un error. Inténtelo de nuevo por favor.</span></h3>",
            "OK");
        });
    }

    //Se imprimen los lugares reservados
    $scope.imprimirLugares = function () {
      var myPrintContent = document.getElementById("hiden-div");
      var myPrintWindow = window.open("", "", 'left=300,top=100,width=900,height=900');
      myPrintWindow.document.write(myPrintContent.innerHTML);
      //myPrintWindow.document.getElementsByClassName("hiden-table").style.display = 'block';
      myPrintWindow.document.close();
      myPrintWindow.focus();
      myPrintWindow.print();
      myPrintWindow.close();
    };

    $scope.imprimir = function () {
      window.print();
    };

    //Muestra un mensaje de error
    $scope.errorModal = function (titulo, mensaje, btnVal) {
      var confirm = $mdDialog.confirm()
        .title(titulo)
        .htmlContent(mensaje)
        .ariaLabel('Mensaje')
        .targetEvent(0)
        .ok(btnVal)
        .cancel('Cancelar');
      $mdDialog.show(confirm).then(function () {

      }, function () {

      });
    };
  }
]);

