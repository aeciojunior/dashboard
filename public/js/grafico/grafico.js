function graficoLinha(url, id, dados = '', label, tipo = '', prefix = '') {

    $(document).ready(function () {
        $.get(url, function (data) {

            var data_at = '';



            if (tipo == 'Vendas') {
                data_at = JSON.parse(data.meses)

            } else if (tipo == 'Valor') {

                data_at = JSON.parse(data.valor)
            }

            let chartStatus = Chart.getChart(id); // <canvas> id
            if (chartStatus != undefined) {
                chartStatus.destroy();
            }

            var ctx1 = document.getElementById(id).getContext("2d");



            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);


            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');


            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Aug", "Set", "Out", "Nov", "Dez"],
                    datasets: [{
                        label: label + ' ' + prefix,
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        data: data_at
                        ,
                        maxBarThickness: 6
                    }],
                },
                options: {
                    animation: {
                        duration: 0
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#fbfbfb',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#ccc',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });


        })
    })

}

function tabela($url) {



    $(document).ready(function () {
        $.get($url, function (data) {

            var tabela = `  <div class="table-responsive">
            <table class="table align-items-center "> <tbody>`;

            var content = '';
            data.vendas_diaria.forEach(element => {
                content += `
                <tr>
                <td class="w-20">
                <div class="d-flex px-2 py-1 align-items-center">
                 

                    <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Codigo</p>
                        <h6 class="text-sm mb-0 text-center">`+ element.codigo + `</h6>
                    </div>
                </div>
            </td>
            <td>
                <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Emissão</p>
                    <h6 class="text-sm mb-0">
                        `+new Date(element.data).toLocaleString()+`</h6>

                </div>
            </td>
            <td>
                <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Cliente</p>
                    <h6 class="text-sm mb-0">Consumidor final</h6>
                </div>
            </td>
            <td class="align-middle text-sm">
                <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Sub total</p>
                    <h6 class="text-sm mb-0">
                    `+ element.valor_produtos.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + `
                        </h6>
                </div>
            </td>
            <td class="align-middle text-sm">
                <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Desconto</p>
                    <h6 class="text-sm mb-0">
                        `+ element.desconto.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + `</h6>
                </div>
            </td>

            <td class="align-middle text-sm">
                <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Total</p>
                    <h6 class="text-sm mb-0">`+ element.total_nota.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + `
                       </h6>
                </div>
            </td>
            </tr>
              `;
            });


            var fim = `         
            </tbody>
        </table>
    </div>`;

            $("#user-info-tb-vendas").html(tabela+content+fim);
        })
    });



    //vendas_diaria

}




function formaPagamento($url) {

    //user-cred-info

    $(document).ready(function () {
        $.get($url, function (data) {

            $('#user-cred-info').text(data.forma_pagamento[0].meio_cartaocred.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));
            $('#user-dinheiro-info').text(data.forma_pagamento[0].meio_dinheiro.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));
            $('#user-deb-info').text(data.forma_pagamento[0].meio_cartaodeb.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));
            $('#user-pix-info').text(data.forma_pagamento[0].meio_outros.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));
            $('#user-chequeav-info').text(data.forma_pagamento[0].meio_chequeav.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));
            $('#user-chequeap-info').text(data.forma_pagamento[0].meio_chequeap.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));
            $('#user-crediario-info').text(data.forma_pagamento[0].meio_crediario.toLocaleString('pt-BR', {
                // minimumFractionDigits: 2
                style: 'currency',
                currency: 'BRL'
            }));

        })
    });

}