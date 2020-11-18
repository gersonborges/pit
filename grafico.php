<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gráfico</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="lib/ionicons.min.css">
    <link rel="stylesheet" href="lib/morris.css">
    <link rel="stylesheet" href="lib/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="box-body chart-responsive">
        <div class="chart" id="bar-chart" style="height: 300px;"></div>
    </div>
</div>

</body>

<script src="lib/jquery.min.js"></script>
<script src="lib/bootstrap.min.js"></script>
<script src="lib/raphael.min.js"></script>
<script src="lib/morris.min.js"></script>

<script>
    $(function () {
        var data4 = {};

        $.ajax({
            url: "dados.php",
            async: false,
            dataType: 'json',
            success: function(data) {
                data4 = data;
            }
        });

        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: data4,
            barColors: ['#5F9EA0', '#cd5c5c', '#778899', '#ff4500', '8b4513'],
            xkey: 'eixoX',
            ykeys: ['a', 'b','c','d','e'],
            labels: ['a)', 'b)', 'c)', 'd)', 'e)'],
            hideHover: 'auto'
        });

    });
</script>

</body>
</html>
