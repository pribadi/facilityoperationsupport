$(document).ready(function(){
    $('#field-DCName').change(function() {
        $.get("http://10.47.150.143/facilityoperationsupport_tso/main/getListFloor/" + $('#field-DCName').val(), function(data, status) {
            if (status === 'success') {

                var dataFloor = JSON.parse(data);

                var $el = $("#floor");
                $el.empty(); // remove old options
                dataFloor.map(function(value) {
                    $el.append($("<option></option>")
                     .attr("value", value.floor).text(value.floor));
                });
            }
        });
    });
});
