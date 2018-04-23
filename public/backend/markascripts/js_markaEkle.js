
/*window.onload(function () {
    document.getElementById("btn_kaydet").addEventListener("click", function () {

        var adi = document.forms["formMarka"]["Adi"].value;
        var aciklama = document.formMarka.Aciklama.value;
        var resim = document.forms["formMarka"]["resim"].value;


        alert(adi);
    });// CLICK
});
*/

$(document).ready(function () {

    $("#resim_yukle").change(function () {
        var resim_ismi = $(this).val();

        $(this).data("resimadi", resim_ismi);
        
    });

    $("#btn_kaydet").click(function () {

        var adi = $("#Adi").val();
        var aciklama = $("#Aciklama").val();
        var resim = $("#resim_yukle").data("resimadi");
        
    });

   

});//SAYFA ACILDIKTAN SONRA CALISTIR 