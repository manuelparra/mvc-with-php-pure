function windowLoaded() {
    var i;
    var boton = document.getElementById('enviar');
    boton.addEventListener('click', validarData);
    //validarData();
}

function ValidarEnviarFormulario(e) {
    e.preventDefault();
    if (validarData()) {
        document.informacion.submit();
    }
}

function validarData(e) {
    // Mensajes de error
    var _mensaje = {
        campo_obligatorio: 'Este campo es obligatorio',
        campo_numerico: 'Este campo es numérico',
        campo_correo: 'Este campo es un ccorreo',
        campo_longitud: 'Este campo debe tener una longitud de {0} caracteres',
        campo_min: 'Este campo debe tener como mínimo {0} caracteres',
        campo_max: 'Este campo debe tener como máximo {0} caracteres',
        campo_ip: 'Este campo no es una IP válida',
        campo_url: 'Este campo no es una URL válida',
        campo_social_twitter: 'Este campo no es una URL válida de Twitter',
        campo_social_facebook: 'Este campo no es una URL válida de Facebook',
        campo_social_youtube: 'Este campo no es una URL válida de youtube'
    };

    try {
        // Cuenta los posibles errores encontrados
        var errores = 0;

        var controls = document.getElementsByClassName('form-control');
        var obj;

        for (var i = 0; i < controls.length; i++) {

            obj = controls[i];

            if (!obj.disabled && !obj.readOnly) {
                if (obj.getAttribute('data-validacion-tipo') != undefined) {
                    console.log(obj);
                    obj.dataset.validacionTipo.split('|').forEach(function(v, index) {
                        //console.info(v, index, i);
                        obj.setCustomValidity('');

                        var form_group = obj.closest('.form-group');

                        form_group.classList.remove('has-error');

                        // Si el campo es requerido y esta en blanco
                        if (v == 'requerido' && obj.value.length == 0) {
                            errores++;

                            form_group.classList.add('has-error');
                            obj.setCustomValidity(_mensaje.campo_obligatorio);

                            return false;   // Rompe el bucle
                        }

                        // si el campo es de tipo numérico
                        if (v == 'numero' && (!obj.value.match(/^([0-9])*[.]?[0-9]*$/) && obj.value.length > 0)) {
                            errores++;

                            form_group.classList.add('has-error');
                            obj.setCustomValidity(_mensaje.campo_numerico);

                            return false;   // Rompe el bucle
                        }

                        if (v == 'email' && (!obj.value.match(/^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i) && obj.valuel.length > 0)) {
                            errores++;

                            form_group.classList.add('has-error');
                            obj.setCustomValidity(_mensaje.campo_correo);

                            return false;   // Rompe el bucle
                        }

                        // Longitud de caracteres a tener
                        if (v.indexOf('longitud') > -1 && obj.valuel.length > 0) {
                            // Validamos la longitud exacta que debe tener
                            var _longitud = v.split(':');
                            if (obj.value.length != _longitud[1]) {
                                errores++;

                                form_group.classList.add('has-error');
                                obj.setCustomValidity(_mensaje.campo_longitud.replace('{0}', _longitud[1]));

                                return false;   // Rompe el bucle
                            }
                        }

                        // Cantidad mínima de caracteres
                        if (v.indexOf('min') > -1 && obj.value.length > 0) {
                            // Necesitamos saber la longitud minima
                            var _min = v.split(':');
                            if (obj.value.length < _min[1]) {
                                errores++;

                                form_group.classList.add('has-error');
                                obj.setCustomValidity(_mensaje.campo_min.replace('{0}', _min[1]));

                                return false;   // Rompe el bucle
                            }
                        }

                        // Cantidad máxima de caracteres
                        if (v.indexOf('max') > -1 &&  obj.value.length > 0) {
                            // Ncesitamos saber la longitud máxima
                            var _max = v.split(':');
                            if (obj.value.length > _max[1]) {
                                errores++;

                                form_group.classList.add('has-error');
                                obj.setCustomValidity(_mensaje.campo_max.replace('{0}', _max[1]));

                                return false;   // Rompe el bucle
                            }
                        }

                        // Válidamos una IP
                        if (v == 'ip' && (!obj.value.match(/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/) && obj.value.length > 0)) {
                            errores++;

                            form_group.classList.add('has-error');
                            obj.setCustomValidity(_mensaje.campo_ip);

                            return false;   // Rompe el bucle
                        }

                        // Válidamos una URL
                        if (v == 'url' && (!obj.value.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/) && obj.value.length > 0)) {
                            errores++;

                            form_group.classList.add('has-error');
                            obj.setCustomValidity(_mensaje.campo_url);

                            return false;   // Rompe el bucle
                        }
                    });
                }
            }
        }

        // Verificamos si los campos han sido validados con exito
        return (errores == 0)
    } catch(e) {
        console.error(e);
        return false;
    }
}

window.addEventListener('load', windowLoaded);
