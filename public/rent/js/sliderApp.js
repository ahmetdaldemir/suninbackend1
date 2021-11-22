$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

villa = {
    general: function () {
    },
};
$(document).ready(function () {
    villa.general();
});
