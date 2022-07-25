(function(){

    obtenerAvances();
    let avances = [];

    const nuevoAvance = document.querySelector('#crear');
    nuevoAvance.addEventListener('click', function(e){
        e.preventDefault();
        form();
    });

    async function obtenerAvances(){
        try {
            const id = obtenerProyecto();
            const url = `/api/avances?slug=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            avances = resultado.avances;
            mostrarAvances();

        } catch (error) {
            console.log(error)
        }
    }

    function mostrarAvances(){
        limpiarTareas();
        /* limpiarTareas();
        totalPendientes();
        totalCompletas(); */
        const arrayAvances = avances;

        if(arrayAvances.length === 0){
            const contenedorAvances = document.querySelector('#avances');

            const textoNoAvances = document.createElement('p');
            textoNoAvances.textContent = 'No Hay Avances Aún';
            textoNoAvances.classList.add('text-center');

            contenedorAvances.appendChild(textoNoAvances);
            return;
        }

        arrayAvances.forEach(avance =>{
            const contenedorAvance = document.createElement('div');
            contenedorAvance.dataset.tareaId = avance.id;
            contenedorAvance.classList.add('avance');

            const contenedorImagenAvance = document.createElement('div');
            contenedorImagenAvance.classList.add('imagen-avance');
            const imagenAvance = document.createElement('img');
            imagenAvance.src = '/build/img/altex.png';
            contenedorImagenAvance.appendChild(imagenAvance);

            const nombreAvance = document.createElement('p');
            nombreAvance.textContent = avance.nombre;
            /* nombreAvance.ondblclick = function(){
                mostrarFormulario(true, {...tarea});
            } */

            contenedorAvance.appendChild(contenedorImagenAvance);
            contenedorAvance.appendChild(nombreAvance);

            const contenedorAvances = document.querySelector('#avances');
            contenedorAvances.appendChild(contenedorAvance);
        })
    }

    function obtenerProyecto(){
        const proyectoparams = new URLSearchParams(window.location.search);
        const proyecto = Object.fromEntries(proyectoparams.entries())
        return proyecto.slug;
    }

    function form(editar = false, avance){

        /* let contenedorForm = document.getElementById('admin');
        contenedorForm.addEventListener('click', function(e){
            if(e.target.classList.contains('crear')){ */

                const nombreAvance = document.querySelector('#nombre').value.trim();
                console.log(nombreAvance);
        
                if(nombreAvance === ''){
                    // Mostrar alerta de error
                    /* mostrarAlerta('error', 'El Nombre de la Tarea es Obligatorio', document.querySelector('.formulario legend')); */

                    return;
                }
                if(editar){
                    /* tarea.nombre = nombreTarea;
                    actualizarTarea(tarea); */
                }else{
                    agregarTarea(nombreAvance);
                }
                
            /* } */
        /* }) */
    }

    async function agregarTarea(tarea){
        // Construir la petición
        const datos = new FormData();
        datos.append('nombre', tarea);
        datos.append('slug', obtenerProyecto());

        try {
            const nurl = '/api/crear-avance';
            const respuesta = await fetch(nurl, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();
            console.log(resultado);

            /* mostrarAlerta(resultado.tipo, resultado.mensaje, document.querySelector('.formulario legend'), false); */

            if(resultado.tipo === 'exito'){

                // Agregar el objeto de tareas al objeto de tareas
                const avanceObj = {
                    id: String(resultado.id),
                    nombre: tarea,
                    estado: "0",
                    proyectoId: resultado.proyectoId
                }
                avances = [...avances, avanceObj];
                mostrarTareas();
            }

        } catch (error) {
            console.log(error);
        }
    }

    function limpiarTareas(){
        const avances = document.querySelector('#avances');
        
        while(avances.firstChild){
            avances.removeChild(avances.firstChild);
        }
    }

})()