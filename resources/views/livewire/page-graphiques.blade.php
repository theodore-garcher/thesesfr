<div>
    <div class="flex flex-auto justify-center mb-4 mt-2">
        <input wire:model.lazy="search" type="search" placeholder="Rechercher par mots clés..." class="shadow appearance-none border rounded w-1/2 py-2 px-2 text-gray-700 focus:outline-none focus:shadow-outline">
        <button wire:click="updateData" class="ml-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Go!
        </button>
    </div>
    <div class="h-8">
        <p wire:loading class="text-center w-full">
            Chargement des données...
        </p>
    </div>
    <div wire:ignore id="container1" style="height:400px;" class="w-11/12 mx-auto"></div>
    <div class="flex justify-around my-8">
        <div wire:ignore id="container2" style="height:400px;" class=""></div>
        <div wire:ignore id="container3" style="height:400px;" class=""></div>
    </div>
    <h2 class="text-xl text-center mb-4">
        Cartographie des établissements de soutenance
    </h2>
    <div wire:ignore id="map" style="height:650px;" class="mx-8 z-0 mb-8"></div>

    <script>
        var map = L.map('map').setView([46.89132478194589, 2.4446100833731736], 6);
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{maxZoom:18, attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);
        let marker;
        let layerGroup = L.layerGroup().addTo(map);

        window.addEventListener('dataUpdated', event => {
            let js_annees = event.detail.years;
            let hcData1 = [];
            js_annees.forEach(
                item => hcData1.push([item.year, parseInt(item.count)]),
            );
            const chart1 = Highcharts.chart('container1', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nombre de thèses par année'
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Roboto, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Nombre de thèses'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Nombre de thèses: <b>{point.y}</b>'
                },
                exporting: {
                    enabled: false
                },
                series: [{
                    name: 'Population',
                    data: hcData1,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '11px',
                            fontFamily: 'Roboto, sans-serif'
                        }
                    }
                }]
            });

            let js_discs = event.detail.discs;
            let hcData2 = [];
            js_discs.forEach(
                item => hcData2.push({
                    name: item.discipline,
                    y: parseInt(item.count)
                }),
            );
            const chart2 = Highcharts.chart('container2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Top 10 disciplines'
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Disciplines',
                    colorByPoint: true,
                    data: hcData2
                }]
            });

            let js_etabs = event.detail.etabs;
            let hcData3 = [];
            js_etabs.forEach(
                item => hcData3.push({
                    name: item.etablissement_soutenance,
                    y: parseInt(item.count)
                }),
            );
            const chart3 = Highcharts.chart('container3', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Principaux établissements de soutenance'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                exporting: {
                    enabled: false
                },
                series: [{
                    name: 'Disciplines',
                    colorByPoint: true,
                    data: hcData3
                }]
            });

            let js_coords = event.detail.coords;
            layerGroup.clearLayers();
            js_coords.forEach(
                item => L.marker([item.longitude, item.latitude]).bindPopup("<h3>"+ item.etablissement_soutenance +"</h3>").addTo(layerGroup)
            );
        });

        window.addEventListener('DOMContentLoaded', event => {
            Livewire.emit('updateData');
        });
    </script>
</div>
