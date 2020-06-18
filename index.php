<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<style>
body{
    background:#ccc;
    margin:10px;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
            <?php 
             $data = array(
                 array('Ayam',10000),
                 array('Nasi',12000),
                 array('Kambing',13000),
                 array('Sapi',14000),
                 array('Perkedel',11000),
                 array('Pecel',123000),
                 array('Bakso',10300),
                 array('Mie',14000),
                 array('Kerupuk',12000),
                 array('Ciki',10100),
                 array('Permen',12000),
             );

             $length = count($data);

             for ($i=0; $i < $length; $i++):
            ?>
                <div class="card-group">
                    <div class="card">
                        <img src="..." class="card-img-top" height="150" >
                        <div id="bungkus" class="card-body">
                            <h5 class=""><?= $data[$i][0]; ?></h5>
                            <button type="button" id="<?= $data[$i][1]; ?>" class="btn btn-success btn-sm tambahpesan">Pesan</button>
                        </div>
                    </div>
                </div>
             <?php endfor; ?>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col">
                    <img src="..." class="" height="100">
                    </div>
                    <div class="col">
                    <h6 class="font-weight-bold">New Customer</h6>
                    </div>
                    <div class="col">list Menu</div>
                </div>
                <h5 id="isipesan"></h5>

               <label>Harga Total </label>
                <input type="text" id="total" name="total" class="form-control total" readonly>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Save bill
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <tr id="">
                                <td>
                                    <label for="">Total</label>
                                    <input type="text"  name="tot" id="tot" class="form-control tot">
                                </td>
                                <td>
                                    <label for="">Bayar</label>
                                    <input type="text" value="" name="yar" id="yar" class="form-control yar">
                                </td>
                                <td>
                                <label for="">Kembali</label>
                                    <input type="text" value="" name="kem" id="kem" class="form-control kem">
                                </td>
                            </tr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('.tambahpesan').click(function(){
        var harga = $(this).attr('id');
    
        a = `
        <tr id="">
            <td>
                <input type="text" value="`+harga+`" name="isi[]" id="" class="form-control isi">
            </td>
            <td>
             <button type="button" class="btn btn-danger btn-sm hapus">Hapus</button>
            </td>
        </tr>
        `;
        $("#isipesan").append(a);

    var totalSum = 0;
      $('.isi').each(function() {
        var inputVal = $(this).val();
        
        if ($.isNumeric(inputVal)) {
          totalSum += parseFloat(inputVal);
        }
      });
      totals = totalSum 
      $("#total").val(totals).trigger('change');
      $("#tot").val(totals).trigger('change');

      $('#yar').change(function(){
        var bay = $(this).val();

        var kemba = bay - totals;
        $("#kem").val(kemba).trigger('change');
      });
    });

    $("#isipesan").on('click','.hapus',function(){
        $(this).parent().parent().remove();
    });

    
});
</script>
</html>