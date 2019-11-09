


window.onload = function cargar(){
    document.getElementById("btnbuscar").style.display = "none";
    document.getElementById("Div_tipo").style.display = "none";
    document.getElementById("Div_estado").style.display = "none";
}

function _tipo(){
    document.getElementById("btnbuscar").style.display = "block";
    document.getElementById("Div_tipo").style.display = 'block';
    document.getElementById("Div_estado").style.display = 'none';
}

function _estado(){
    document.getElementById("btnbuscar").style.display = "block";
    document.getElementById("Div_tipo").style.display = 'none';
    document.getElementById("Div_estado").style.display = 'block';
}

function _tipoestado(){
    document.getElementById("btnbuscar").style.display = "block";
    document.getElementById("Div_tipo").style.display = 'block';
    document.getElementById("Div_estado").style.display = 'block';
}