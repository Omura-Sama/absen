<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jquery-1.11.3.min.js">
  <!-- <script src="assets/js/JsBarcode.all.min.js"></script> -->



  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 5px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }

    .short{
      width: 50px;
    }

    .normal{
      width: 150px;
    }

    .page {
      width: 210mm;
      min-height: 297mm;
      padding: 20mm;
      margin: 10mm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 257mm;
      outline: 2cm #FFEAEA solid;
    }

    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }

    thead th{
      text-align: left;
      padding: 5px;
    }

    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 5px;
      font-size: 14px;
    }

    img {
      text-align: center;
    }

    tbody tr:nth-child(even){
      background: #F6F5FA;
    }

    tbody tr:hover{
      background: #EAE9F5
    }

    @page { 
      size: A4;    
      margin: 0;

    }

    @media print {
      html, body {
        width: 210mm;
        height: 297mm;        
      }
      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }
  </style>
</head>
  <body>
      <?php foreach ($users as $key): ?>
      <div class="page">
      <center>
        <table style="height: 222px; width: 710px;" border="1" > 
          <tbody>
            <tr style="height: 13px;">
              <td style="width: 177px; height: 13px;"><strong>PT. MAJ - TBN</strong></td>
              <td style="text-align: center; width: 380px; height: 13px;" colspan="2"> 
                <img style="  width: 250px; height: 45px;" src='https://barcode.tec-it.com/barcode.ashx?data=+<?= $key->zdn; ?>+&code=Code128&multiplebarcodes=true&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='<?= $key->zdn; ?>'/></td>

                <td style="text-align: center; width: 131px; height: 13px;"> 
                  <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=+<?= $key->zdn; ?>+&amp;size=40x40" alt="" title="<?= $key->zdn; ?>" width="40" height="40" /></td>
                </tr>
                <tr style="height: 10px; ">
                  <td style="width: 177px; height: 10px;"><strong>DELIVERY TAG</strong></td>
                  <td style="width: 380px; height: 10px;" colspan="2"><?= $key->zdn; ?></td>
                  <td style="width: 131px; height: 10px;"><?= $key->zcycle ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Vendor</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= "Vendor" ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Delivery Date</td>
                  <td style="width: 231px; height: 10px;"><?= date('d.m.Y', strtotime($key->vdatu)); 
                  ?></td>
                  <td style="width: 143px; height: 10px;">PO. Item</td>
                  <td style="width: 131px; height: 10px;">Value Item</td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Number</td>
                  <td style="width: 231px; height: 10px;"><?= $key->matnr; ?></td>
                  <td style="width: 143px; height: 10px;"><strong>Qty DLV</strong></td>
                  <td style="width: 131px; height: 10px;"><?= $key->lwpmg; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Name</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= $key->maktx; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">PO Number</td>
                  <td style="width: 231px; height: 10px;">value PO</td>
                  <td style="width: 143px; height: 10px;">Qty Order</td>
                  <td style="width: 131px; height: 10px;"><?= $key->qtylot; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Store Number</td>
                  <td style="width: 231px; height: 10px;"><strong>Value Sloc</strong></td>
                  <td style="width: 143px; height: 10px;">Revision</td>
                  <td style="width: 131px; height: 10px;">Value Revision</td>
                </tr>
              </tbody>
            </table>

            <table style="height: 222px; width: 710px;" border="1" > 
          <tbody>
            <tr style="height: 13px;">
              <td style="width: 177px; height: 13px;"><strong>PT. MAJ - TBN</strong></td>
              <td style="text-align: center; width: 380px; height: 13px;" colspan="2"> 
                <img style="  width: 250px; height: 45px;" src='https://barcode.tec-it.com/barcode.ashx?data=+<?= $key->zdn; ?>+&code=Code128&multiplebarcodes=true&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='<?= $key->zdn; ?>'/></td>

                <td style="text-align: center; width: 131px; height: 13px;"> 
                  <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=+<?= $key->zdn; ?>+&amp;size=40x40" alt="" title="<?= $key->zdn; ?>" width="40" height="40" /></td>
                </tr>
                <tr style="height: 10px; ">
                  <td style="width: 177px; height: 10px;"><strong>DELIVERY TAG</strong></td>
                  <td style="width: 380px; height: 10px;" colspan="2"><?= $key->zdn; ?></td>
                  <td style="width: 131px; height: 10px;"><?= $key->zcycle ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Vendor</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= "Vendor" ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Delivery Date</td>
                  <td style="width: 231px; height: 10px;"><?= date('d.m.Y', strtotime($key->vdatu)); 
                  ?></td>
                  <td style="width: 143px; height: 10px;">PO. Item</td>
                  <td style="width: 131px; height: 10px;">Value Item</td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Number</td>
                  <td style="width: 231px; height: 10px;"><?= $key->matnr; ?></td>
                  <td style="width: 143px; height: 10px;"><strong>Qty DLV</strong></td>
                  <td style="width: 131px; height: 10px;"><?= $key->lwpmg; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Name</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= $key->maktx; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">PO Number</td>
                  <td style="width: 231px; height: 10px;">value PO</td>
                  <td style="width: 143px; height: 10px;">Qty Order</td>
                  <td style="width: 131px; height: 10px;"><?= $key->qtylot; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Store Number</td>
                  <td style="width: 231px; height: 10px;"><strong>Value Sloc</strong></td>
                  <td style="width: 143px; height: 10px;">Revision</td>
                  <td style="width: 131px; height: 10px;">Value Revision</td>
                </tr>
              </tbody>
            </table>


            <table style="height: 222px; width: 710px;" border="1" > 
          <tbody>
            <tr style="height: 13px;">
              <td style="width: 177px; height: 13px;"><strong>PT. MAJ - TBN</strong></td>
              <td style="text-align: center; width: 380px; height: 13px;" colspan="2"> 
                <img style="  width: 250px; height: 45px;" src='https://barcode.tec-it.com/barcode.ashx?data=+<?= $key->zdn; ?>+&code=Code128&multiplebarcodes=true&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='<?= $key->zdn; ?>'/></td>

                <td style="text-align: center; width: 131px; height: 13px;"> 
                  <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=+<?= $key->zdn; ?>+&amp;size=40x40" alt="" title="<?= $key->zdn; ?>" width="40" height="40" /></td>
                </tr>
                <tr style="height: 10px; ">
                  <td style="width: 177px; height: 10px;"><strong>DELIVERY TAG</strong></td>
                  <td style="width: 380px; height: 10px;" colspan="2"><?= $key->zdn; ?></td>
                  <td style="width: 131px; height: 10px;"><?= $key->zcycle ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Vendor</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= "Vendor" ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Delivery Date</td>
                  <td style="width: 231px; height: 10px;"><?= date('d.m.Y', strtotime($key->vdatu)); 
                  ?></td>
                  <td style="width: 143px; height: 10px;">PO. Item</td>
                  <td style="width: 131px; height: 10px;">Value Item</td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Number</td>
                  <td style="width: 231px; height: 10px;"><?= $key->matnr; ?></td>
                  <td style="width: 143px; height: 10px;"><strong>Qty DLV</strong></td>
                  <td style="width: 131px; height: 10px;"><?= $key->lwpmg; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Name</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= $key->maktx; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">PO Number</td>
                  <td style="width: 231px; height: 10px;">value PO</td>
                  <td style="width: 143px; height: 10px;">Qty Order</td>
                  <td style="width: 131px; height: 10px;"><?= $key->qtylot; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Store Number</td>
                  <td style="width: 231px; height: 10px;"><strong>Value Sloc</strong></td>
                  <td style="width: 143px; height: 10px;">Revision</td>
                  <td style="width: 131px; height: 10px;">Value Revision</td>
                </tr>
              </tbody>
            </table>

            <table style="height: 222px; width: 710px;" border="1" > 
          <tbody>
            <tr style="height: 13px;">
              <td style="width: 177px; height: 13px;"><strong>PT. MAJ - TBN</strong></td>
              <td style="text-align: center; width: 380px; height: 13px;" colspan="2"> 
                <img style="  width: 250px; height: 45px;" src='https://barcode.tec-it.com/barcode.ashx?data=+<?= $key->zdn; ?>+&code=Code128&multiplebarcodes=true&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='<?= $key->zdn; ?>'/></td>

                <td style="text-align: center; width: 131px; height: 13px;"> 
                  <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=+<?= $key->zdn; ?>+&amp;size=40x40" alt="" title="<?= $key->zdn; ?>" width="40" height="40" /></td>
                </tr>
                <tr style="height: 10px; ">
                  <td style="width: 177px; height: 10px;"><strong>DELIVERY TAG</strong></td>
                  <td style="width: 380px; height: 10px;" colspan="2"><?= $key->zdn; ?></td>
                  <td style="width: 131px; height: 10px;"><?= $key->zcycle ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Vendor</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= "Vendor" ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Delivery Date</td>
                  <td style="width: 231px; height: 10px;"><?= date('d.m.Y', strtotime($key->vdatu)); 
                  ?></td>
                  <td style="width: 143px; height: 10px;">PO. Item</td>
                  <td style="width: 131px; height: 10px;">Value Item</td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Number</td>
                  <td style="width: 231px; height: 10px;"><?= $key->matnr; ?></td>
                  <td style="width: 143px; height: 10px;"><strong>Qty DLV</strong></td>
                  <td style="width: 131px; height: 10px;"><?= $key->lwpmg; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Part Name</td>
                  <td style="width: 517px; height: 10px;" colspan="3"><?= $key->maktx; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">PO Number</td>
                  <td style="width: 231px; height: 10px;">value PO</td>
                  <td style="width: 143px; height: 10px;">Qty Order</td>
                  <td style="width: 131px; height: 10px;"><?= $key->qtylot; ?></td>
                </tr>
                <tr style="height: 10px;">
                  <td style="width: 177px; height: 10px;">Store Number</td>
                  <td style="width: 231px; height: 10px;"><strong>Value Sloc</strong></td>
                  <td style="width: 143px; height: 10px;">Revision</td>
                  <td style="width: 131px; height: 10px;">Value Revision</td>
                </tr>
              </tbody>
            </table>
          </center>
          </div>
        <?php endforeach ?>

      </body>
    <script>
      window.print();

      JsBarcode(".barcode").init();

      function generateBarCode(){
        var nric = $('#text').val();
        var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
        $('#barcode').attr('src', url);
      }
    </script>
    </html>