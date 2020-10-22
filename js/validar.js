function codeTel(){
        prefijo = $("#pais option:selected").val();
        $("#telefono").val("+"+prefijo+" - ");
    }

function validar(){
    $("#form").addClass("was-validated");
    var inputs = document.getElementsByClassName("form-control");
    for(i=0;i<inputs.length;i++){
      if(inputs[i].checkValidity()===false){
        return false;
      }
    }
    return true;
}