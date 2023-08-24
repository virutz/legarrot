        <div class="footer">
            <div class="float-right">
                <font color="white"><small>Conception & Réalisation : bediaroland@gmail.com</font>&nbsp;</small>
                <img src="pictures/logobed.jpg" name="logo" width="25" height="25" id="logo" />&nbsp;
                <small>BEDCHEKOT | Copyright&copy; 2023</small>
            </div>
            <div>
                <a href="#"><i class="fa fa-globe"></i><small>&nbsp;|&nbsp;www.legarrot.ci</small>
            </div>
        </div>

    </div>
</div>


<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/toastr/toastr.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>
<!-- Popper -->
<script src="js/popper.min.js"></script>
<!-- Ladda -->
<script src="js/plugins/ladda/spin.min.js"></script>
<script src="js/plugins/ladda/ladda.min.js"></script>
<script src="js/plugins/ladda/ladda.jquery.min.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<!-- Clock picker -->
<script src="js/plugins/clockpicker/clockpicker.js"></script>

<!-- Morris -->
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>
<script src="js/demo/morris-demo.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<script src="js/demo/peity-demo.js"></script>

<!-- Flot -->
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.spline.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="js/plugins/chartJs/Chart.min.js"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<!-- SUMMERNOTE -->
<script src="js/plugins/summernote/summernote-bs4.js"></script>
<!-- FooTable -->
<script src="js/plugins/footable/footable.all.min.js"></script>

<script src="js/custom.js"></script>

<script src="js/plugins/chartJs/Chart.min.js"></script>
<script src="js/demo/chartjs-demo.js"></script>

<!-- Page-Level Scripts -->
<script type="text/javascript">
// onkeypress="return verif(event);"
    function verif(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/ -';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }
</script>

<script>
function verif_integer(champb){
var chiffresb = new RegExp(".*[0-9]");
var verifb;
    for(x = 0; x < champb.value.length; x++){
        verifb = chiffresb.test(champb.value.charAt(x));
            if(verifb == false){
            champb.value = champb.value.substr(0,x) + champb.value.substr(x+1,champb.value.length-x+1); x--;
            }
    }
}
</script>
<script>
$(document).ready(function() {
$('.footable').footable();
});
</script>

<script>
$(document).ready(function(){
$('.dataTables-example').DataTable({
pageLength: 10,
responsive: true,
dom: '<"html5buttons"B>lTfgitp',
buttons: [
// { extend: 'copy'},
// {extend: 'csv'},
{extend: 'excel', title: 'Docs-MAG'},
{extend: 'pdf', title: 'Docs-MAG'},

{extend: 'print',
customize: function (win){
$(win.document.body).addClass('white-bg');
$(win.document.body).css('font-size', '10px');

$(win.document.body).find('table')
.addClass('compact')
.css('font-size', 'inherit');
}
}
]

});

$('.chosen-select').chosen({width: "100%"});

});

</script>