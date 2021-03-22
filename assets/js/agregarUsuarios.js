

function Docentes(){
    var radio = document.getElementById("Docentes");
    var textFac = document.getElementById("facultad");
    var textCar = document.getElementById("carrera");
    if (radio.checked == true){
        textFac.style.display = "block";
        textCar.style.display = "block";
    } else {
        textFac.style.display = "none";
        textCar.style.display = "block";
    }
}