document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);

    inter_es = {
        cancel: 'Cancelar',
        clear: 'Limpiar',
        done:    'Ok',
        previousMonth:    '‹',
        nextMonth:    '›',
        months:    [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ],
        monthsShort:    [
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun',
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic'
        ],

        weekdays:    [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado'
        ],

        weekdaysShort:    [
            'Dom',
            'Lun',
            'Mar',
            'Mié',
            'Jue',
            'Vie',
            'Sáb'
        ],

        weekdaysAbbrev:    ['D', 'L', 'M', 'M', 'J', 'V', 'S']

    };

    var options = {
        i18n: inter_es,
        format: 'yyyy-mm-dd',
        autoClose: true
    };

    var optionsHoras = {
        i18n: inter_es,
        twelveHour: false,
        autoClose: true
    };

    var elemsPickers = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elemsPickers, options);

    var elemsTimers = document.querySelectorAll('.timepicker');
    var instances = M.Timepicker.init(elemsTimers, optionsHoras);
});

// Or with jQuery

$(document).ready(function(){
$('select').formSelect();
});