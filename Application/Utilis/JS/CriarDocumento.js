$(document).ready(
        function () {
            $("#partilhar").hide();
            $("#tipo1").click(function () {
                $("#partilhar").hide();
            });
            $("#tipo2").click(function () {
                $("#partilhar").hide();
            });
            $("#tipo3").click(function () {
                $("#partilhar").show();
            });
        });
