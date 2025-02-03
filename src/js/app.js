const cita = {
    estado: '',
    ApellidoP: '',
    ApellidoM: '',
    Nombre: '',
    Edad:'',
    Consultorio: '',
    Fecha:'',
    Hora:'',
    Expediente:'',
    PrimerVisita:'',
    Subsecuente:'',
    Embarazo:'',
    Hipertension:'',
    Diabetes:'',
    Respiratorio:'',
    EDAS:'',
    CertificadoMedico:'',
    Otros:''
}

document.addEventListener('DOMContentLoaded',function(){
    iniciarApp();
});

function iniciarApp(){

obtenerTitulo();

obtenerTitulo().then((titulo) => {
    if (titulo === "Crear Cita Medica") {
        consultarAPI();
        nombrePaciente();
        seleccionarFecha();
        seleccionarHora();
        seleccionarFrecuencia();
        seleccionarRazones();
        otrosTxt();
        citaBoton();
    }else if(titulo === "Crear Consulta Medica"){
        consultarAPI();
        nombrePaciente();
        consultaFechaHora();
        seleccionarFrecuencia();
        seleccionarRazones();
        otrosTxt();
        consultaBoton();
    }else if(titulo === "Consulta para Certificado Medico"){
        consultarAPI();
        nombrePacienteCC();
        consultaFechaHora();
        otrosTxt();
        certificadoBoton();
    }else if(titulo === "Ver Citas"){
        consultarAPI();
    }
});


}


//ESTA FUNCION OBTIENE EL TITULO DE LA PAGINA
function obtenerTitulo() {
    return new Promise((resolve) => {
        // Esperar a que el DOM esté completamente cargado antes de ejecutar la función
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", function() {
                resolverTitulo(resolve);
            });
        } else {
            resolverTitulo(resolve);
        }
    });
}

function resolverTitulo(resolve) {
    const h2 = document.querySelector("h2");
    if (h2) {
        resolve(h2.textContent);
    } 
}




function nombrePaciente(){
    const Nombre = document.querySelector('#Nombre').value;
    cita.Nombre = Nombre;

    const ApellidoP = document.querySelector('#ApellidoP').value;
    cita.ApellidoP = ApellidoP;

    const ApellidoM = document.querySelector('#ApellidoM').value;
    cita.ApellidoM = ApellidoM;

    const Edad = document.querySelector('#Edad').value;
    cita.Edad = Edad;

    const Expediente = document.querySelector('#Expediente').value;
    cita.Expediente = Expediente;
    
}

function nombrePacienteCC(){
    const Nombre = document.querySelector('#Nombre');
    Nombre.addEventListener('change',(event) =>{
    cita.Nombre = event.target.value;
    });

    const ApellidoP = document.querySelector('#ApellidoP');
    ApellidoP.addEventListener('change',(event) =>{
    cita.ApellidoP = event.target.value;
    });

    const ApellidoM = document.querySelector('#ApellidoM');
    ApellidoM.addEventListener('change',(event) =>{
    cita.ApellidoM = event.target.value;
    });

    const Edad = document.querySelector('#Edad');
    Edad.addEventListener('change',(event) =>{
    cita.Edad = event.target.value;
    });

    cita.Expediente = 'CC';

    cita.CertificadoMedico = 'X';
    
}

function seleccionarFecha(){
    const inputFecha = document.querySelector('#fechaCita');
    inputFecha.addEventListener('input',function(){
        cita.Fecha = inputFecha.value;
    });
}

function seleccionarHora(){
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input',function(){
        cita.Hora = inputHora.value;
    });
}

function consultaFechaHora(){
    const fechaConsulta = document.querySelector('#fechaConsulta').value;
    cita.Fecha = fechaConsulta;

    const horaConsulta = document.querySelector('#horaConsulta').value;
    cita.Hora = horaConsulta;
}

function seleccionarFrecuencia() {
    const VisitaRadios = document.querySelectorAll('input[name="visita"]');

    // Añadir un evento para cada radio button
    VisitaRadios.forEach(radio => {
        radio.addEventListener('change', (event) => {
            // Verifica cuál radio button ha sido seleccionado
            
            if(event.target.value === 'PrimeraVez'){
                cita.PrimerVisita = 'X';
                cita.Subsecuente = '';
            }else{

                cita.PrimerVisita = '';
                cita.Subsecuente = 'X';
            }
        });
    });
}

function seleccionarRazones(){
        var hipertensionCheckbox = document.querySelector('input[name="hipertension"]');
        hipertensionCheckbox.addEventListener('change', actualizarValorHipertension);

        function actualizarValorHipertension() {
            if (hipertensionCheckbox.checked) {
                cita.Hipertension = 'X'
            } else {
                cita.Hipertension = "";
            }
        }

        var enfRespiratoriasCheckbox = document.querySelector('input[name="enfRespiratorias"]');
        enfRespiratoriasCheckbox.addEventListener('change', actualizarValorEnfRespiratorias);

        function actualizarValorEnfRespiratorias() {
            if (enfRespiratoriasCheckbox.checked) {
                cita.Respiratorio = 'X';
            } else {
                cita.Respiratorio = '';
            }
        }

        var embarazoCheckbox = document.querySelector('input[name="embarazo"]');
        embarazoCheckbox.addEventListener('change', actualizarValorEmbarazo);

        function actualizarValorEmbarazo() {
            if (embarazoCheckbox.checked) {
                cita.Embarazo = 'X';
            } else {
                cita.Embarazo = '';
            }
        }

        var diabetesCheckbox = document.querySelector('input[name="diabetes"]');
        diabetesCheckbox.addEventListener('change', actualizarValorDiabetes);

        function actualizarValorDiabetes() {
            if (diabetesCheckbox.checked) {
                cita.Diabetes = 'X';
            } else {
                cita.Diabetes = '';
            }
        }

        var EDASCheckbox = document.querySelector('input[name="EDAS"]');
        EDASCheckbox.addEventListener('change', actualizarValorEDAS);

        function actualizarValorEDAS() {
            if (EDASCheckbox.checked) {
                cita.EDAS = 'X';
            } else {
                cita.EDAS = '';
            }
        }
}

function otrosTxt(){
    // Seleccionar el input por su id
const inputOtros = document.getElementById('otros');

// Opcional: Escuchar el evento 'change' para detectar cambios cuando se pierde el foco
inputOtros.addEventListener('change', (event) => {
    cita.Otros = event.target.value;
});

}


async function consultarAPI(){
    try{
        const urlConsultorios = '/admin/api/medicos';

        const resultadoConsultorios = await fetch(urlConsultorios);

        const consultorios = await resultadoConsultorios.json();

        mostrarConsultorios(consultorios);
    }catch(error){
        console.log(error);
    }
}

function mostrarConsultorios(consultorios) {
    // Crea un único SELECT
    const consultorioSelect = document.createElement('SELECT');
    consultorioSelect.classList.add('consultorio');

    consultorioSelect.name = 'Consultorio';


    consultorios.forEach(consultorio => {
        const { Id, Nombre } = consultorio;

        // Crea una opción para cada consultorio
        const option = document.createElement('OPTION');
        option.value = Nombre;  // Valor asociado al consultorio
        option.textContent = Nombre;  // Texto visible en el SELECT
        

        // Agrega la opción al SELECT
        consultorioSelect.appendChild(option);
    });

    // Inserta el SELECT en el DOM
    document.querySelector('#consultorios').appendChild(consultorioSelect);

     // Inicializa el valor de cita.consultorio
     cita.Consultorio = consultorioSelect.value;

     // Actualiza el valor de cita.consultorio cuando cambia la selección
     consultorioSelect.addEventListener('change', function () {
         cita.Consultorio = consultorioSelect.value;
     });
}

function citaBoton(){
    //Seleccionamos el boton
    const botonReservar = document.querySelector('#btnRegistrarCita');
    //mandamos a llamar la funcion
    botonReservar.addEventListener('click',function () {
        cita.estado = 'cita';
        botonReservar.onclick = registrarCita;
    });
    
}

function consultaBoton(){
    //Seleccionamos el boton
    const botonReservar = document.querySelector('#btnRegistrarConsultaMedica');
    //mandamos a llamar la funcion
    botonReservar.addEventListener('click',function () {
        cita.estado = 'fila';
        botonReservar.onclick = registrarConsulta;
        
    });
}

function certificadoBoton(){
    //Seleccionamos el boton
    const botonReservar = document.querySelector('#btnRegistrarCertificado');
    //mandamos a llamar la funcion
    botonReservar.addEventListener('click',function () {
        cita.estado = 'fila';
        botonReservar.onclick = registrarCertificado;
        
    });
}

async function registrarCita(){

    const { estado, ApellidoP, ApellidoM, Nombre, Edad, Consultorio, Fecha, Hora, Expediente, PrimerVisita, Subsecuente, Embarazo, Hipertension, Diabetes, Respiratorio, EDAS, CertificadoMedico,Otros} = cita;


    
    const datos = new FormData();
    datos.append('estado', estado);
    datos.append('ApellidoP', ApellidoP);
    datos.append('ApellidoM', ApellidoM);
    datos.append('Nombre', Nombre);
    datos.append('Edad', Edad);
    datos.append('Consultorio', Consultorio);
    datos.append('Fecha', Fecha);
    datos.append('Hora', Hora);
    datos.append('Expediente', Expediente);
    datos.append('PrimerVisita', PrimerVisita);
    datos.append('Subsecuente', Subsecuente);
    datos.append('Embarazo', Embarazo);
    datos.append('Hipertension', Hipertension);
    datos.append('Diabetes', Diabetes);
    datos.append('Respiratorio', Respiratorio);
    datos.append('EDAS', EDAS);
    datos.append('CertificadoMedico', CertificadoMedico);
    datos.append('Otros', Otros);

    try{
        //Peticio a la API
        const url = '/admin/citas';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();
        if(resultado.resultado){
            Swal.fire({
                icon: "success",
                title: "Cita Creada",
                text: "Tu cita fue creada correctamente",
                button: 'OK'
            }).then( () => {
                setTimeout(() => {
                    window.location.href = "/admin/buscar-expediente";
                }, 1000);
                
            })
        }
    }catch(error){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Revisa que todos los campos esten llenos o no se pudo conectar con el servidor"
          });
    }

}

async function registrarConsulta(){

    const { estado, ApellidoP, ApellidoM, Nombre, Edad, Consultorio, Fecha, Hora, Expediente, PrimerVisita, Subsecuente, Embarazo, Hipertension, Diabetes, Respiratorio, EDAS, CertificadoMedico,Otros} = cita;


    
    const datos = new FormData();
    datos.append('estado', estado);
    datos.append('ApellidoP', ApellidoP);
    datos.append('ApellidoM', ApellidoM);
    datos.append('Nombre', Nombre);
    datos.append('Edad', Edad);
    datos.append('Consultorio', Consultorio);
    datos.append('Fecha', Fecha);
    datos.append('Hora', Hora);
    datos.append('Expediente', Expediente);
    datos.append('PrimerVisita', PrimerVisita);
    datos.append('Subsecuente', Subsecuente);
    datos.append('Embarazo', Embarazo);
    datos.append('Hipertension', Hipertension);
    datos.append('Diabetes', Diabetes);
    datos.append('Respiratorio', Respiratorio);
    datos.append('EDAS', EDAS);
    datos.append('CertificadoMedico', CertificadoMedico);
    datos.append('Otros', Otros);

    try{
        //Peticio a la API
        const url = '/admin/consultas';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();
        if(resultado.resultado){
            Swal.fire({
                icon: "success",
                title: "Cita Creada",
                text: "Tu consulta Médica fue creada correctamente",
                button: 'OK'
            }).then( () => {
                setTimeout(() => {
                    window.location.href = "/admin/buscar-expediente";
                }, 1000);
                
            })
        }
    }catch(error){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Revisa que todos los campos esten llenos o no se pudo conectar con el servidor"
          });
    }

}

async function registrarCertificado(){

    const { estado, ApellidoP, ApellidoM, Nombre, Edad, Consultorio, Fecha, Hora, Expediente, PrimerVisita, Subsecuente, Embarazo, Hipertension, Diabetes, Respiratorio, EDAS, CertificadoMedico,Otros} = cita;


    
    const datos = new FormData();
    datos.append('estado', estado);
    datos.append('ApellidoP', ApellidoP);
    datos.append('ApellidoM', ApellidoM);
    datos.append('Nombre', Nombre);
    datos.append('Edad', Edad);
    datos.append('Consultorio', Consultorio);
    datos.append('Fecha', Fecha);
    datos.append('Hora', Hora);
    datos.append('Expediente', Expediente);
    datos.append('PrimerVisita', PrimerVisita);
    datos.append('Subsecuente', Subsecuente);
    datos.append('Embarazo', Embarazo);
    datos.append('Hipertension', Hipertension);
    datos.append('Diabetes', Diabetes);
    datos.append('Respiratorio', Respiratorio);
    datos.append('EDAS', EDAS);
    datos.append('CertificadoMedico', CertificadoMedico);
    datos.append('Otros', Otros);

    try{
        //Peticio a la API
        const url = '/admin/consultas';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();
        if(resultado.resultado){
            Swal.fire({
                icon: "success",
                title: "Cita Creada",
                text: "Tu consulta Médica fue creada correctamente",
                button: 'OK'
            }).then( () => {
                setTimeout(() => {
                    window.location.href = "/admin/buscar-expediente";
                }, 1000);
                
            })
        }
    }catch(error){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Revisa que todos los campos esten llenos o no se pudo conectar con el servidor"
          });
    }

}

