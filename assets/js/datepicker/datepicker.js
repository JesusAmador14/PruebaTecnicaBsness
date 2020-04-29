$.fn.datepicker.dates['es'] = {

    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    today: "Hoy",
    clear: "Clear",
    format: "yyyy/mm/dd",
    titleFormat: "MM yyyy",
    weekStart: 0,
    // format: 'yyyy-mm-dd'
};

var startDate = new Date();
var day = startDate.getFullYear() + '/' + addZero(startDate.getMonth() + 1) + '/' + addZero(startDate.getDate());

$('.input-daterange').datepicker({
    language: 'es',
    autoclose: true,
    toggleActive: true,
    weekStart: 1,
    endDate: day
});


function addZero(num) {
    if (num < 10) {
        num = '0' + num;
    }
    return num;
}