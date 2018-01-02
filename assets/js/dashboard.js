$(document).ready(function(){
    $('#selectDc').change(function() {
        $.get("http://10.47.150.143/facilityoperationsupport_tso/main/getListFloor/" + $('#selectDc').val(), function(data, status) {
            if (status === 'success') {
                var dataFloor = JSON.parse(data);

                var $el = $("#selectFloor");
                $el.empty(); // remove old options
                dataFloor.map(function(value) {
                    $el.append($("<option></option>")
                     .attr("value", value.floor).text(value.floor));
                });

                if(dataFloor.length === 0) {
                    $('#summaryGraph, #lineGraph').hide();
                }
                else {
                    $('#summaryGraph, #lineGraph').show();
                }

                var dcName = $("#selectDc").val(), floor = $("#selectFloor").val();
                $.get("http://10.47.150.143/facilityoperationsupport_tso/main/getCapacitySpare/" + dcName + "/" + floor,
                function(data, status) {
                    if (status === 'success') {
                        var dataCapSpare = JSON.parse(data);
                        $('#powerCap').html(dataCapSpare.power.capacity);
                        $('#coolingCap').html(dataCapSpare.cooling.capacity);
                        $('#spaceCap').html(dataCapSpare.space.capacity);
                        $('#powerSpare').html(dataCapSpare.power.spare);
                        $('#coolingSpare').html(dataCapSpare.cooling.spare);
                        $('#spaceSpare').html(dataCapSpare.space.spare);

                        initializeCharts();
                    }
                });
            }
        });
    });
    $("#selectFloor").change(function () {

        var dcName = $("#selectDc").val(), floor = $("#selectFloor").val();

        $.get("http://10.47.150.143/facilityoperationsupport_tso/main/getCapacitySpare/" + dcName + "/" + floor, function(data, status) {
            if (status === 'success') {
                var dataCapSpare = JSON.parse(data);
                $('#powerCap').html(dataCapSpare.power.capacity);
                $('#coolingCap').html(dataCapSpare.cooling.capacity);
                $('#spaceCap').html(dataCapSpare.space.capacity);
                $('#powerSpare').html(dataCapSpare.power.spare);
                $('#coolingSpare').html(dataCapSpare.cooling.spare);
                $('#spaceSpare').html(dataCapSpare.space.spare);

                initializeCharts();
            }
        });
    });
});

function initializeCharts() {

    $(".rad-chart").empty();
    $(".d3-*").empty();

    var dcName = $("#selectDc").val(), floor = $("#selectFloor").val();

    $.get("http://10.47.150.143/facilityoperationsupport_tso/main/getListData/" + dcName + "/" + floor, function(data, status) {
        if (status === 'success') {
            var dataUtilisasi = JSON.parse(data);
            var dataPower = [], dataCooling = [], dataSpace = [];

            dataUtilisasi.map(function(val) {
                dataPower.push({
                    x: val.date,
                    a: val.power,
                    b: $('#powerCap').html()
                });
                dataCooling.push({
                    x: val.date,
                    a: val.cooling,
                    b: $('#coolingCap').html()
                });
                dataSpace.push({
                    x: val.date,
                    a: val.space,
                    b: $('#spaceCap').html()
                });
            });

            Morris.Line({
                //lineColors: ['#E67A77', '#D9DD81', '#79D1CF', '#95D7BB'],
                lineColors: ['#33cc33', '#d10e35'],
                element: 'lineChart',
                data: dataPower,
                xkey: 'x',
                ykeys: ['a', 'b'],
                labels: ['util', 'cap'],
                
                parseTime: false,
                pointSize: 0,
                hideHover: 'auto'
            });
            Morris.Line({
                //lineColors: ['#E67A77', '#D9DD81', '#79D1CF', '#95D7BB'],
                lineColors: ['#1a6cef', '#d10e35'],
                element: 'lineChart2',
                data: dataCooling,
                xkey: 'x',
                ykeys: ['a', 'b'],
                labels: ['util', 'cap'],
                
                parseTime: false,
                pointSize: 0,
                hideHover: 'auto'
            });
            Morris.Line({
                //lineColors: ['#E67A77', '#D9DD81', '#79D1CF', '#95D7BB'],
                lineColors: ['#E94B3B', '#d10e35'],
                element: 'lineChart3',
                data: dataSpace,
                xkey: 'x',
                ykeys: ['a', 'b'],
                labels: ['util', 'cap'],
                
                parseTime: false,
                pointSize: 0,
                hideHover: 'auto'
            });
        }
    });
};
