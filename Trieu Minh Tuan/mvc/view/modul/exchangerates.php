<?php
function getExchangeRatesVCB(){
    $Link= 'http://vietcombank.com.vn/ExchangeRates/ExrateXML.aspx';
    $content = @file_get_contents($Link);
    if($content!='' and preg_match_all('/Exrate CurrencyCode="(.*)" CurrencyName="(.*)" Buy="(.*)" Transfer="(.*)" Sell="(.*)"/',$content,$matches) and count($matches)>0){
        $exchange_rates=array(
        'USD'=>array()
        ,'EUR'=>array()
        ,'GBP'=>array()
        ,'HKD'=>array()
        ,'JPY'=>array()
        ,'CHF'=>array()
        ,'AUD'=>array()
        ,'CAD'=>array()
        ,'SGD'=>array()
        ,'THB'=>array()
        );
        foreach($matches[1] as $key=>$value){
        if(isset($exchange_rates[$value])){
        $exchange_rates[$value]=array(
        'id'=>$value
        ,'name'=>$matches[2][$key]
        ,'buy'=>$matches[3][$key]
        ,'transfer'=>$matches[4][$key]
        ,'sell'=>$matches[5][$key]
        );
        }
        }
        Return $exchange_rates;
    }
}
$datarates=getExchangeRatesVCB();
?>

<div class="mb-3">
<h3 class="text-center text-light bg-danger">TỶ GIÁ NGOẠI TỆ</h3>
    <table class=text-center>
        <tr class="border bg-primary text-white ">
            
            <th class=border>Ngoại tệ</th>
            <th class=border>Mua tiền mặt</th>
            <th class=border>Mua chuyển khoản</th>
            <th class=border>Bán</th>
        </tr>
    <?php
    foreach($datarates as $id=>$item) {?>
        <tr class=border>
           
            <td class="border bg-info text-white"><?php echo $item['id']?></td>
            <td class="border text-success"><?php echo $item['buy']?></td>
            <td class="border text-primary"><?php echo $item['transfer']?></td>
            <td class="border text-danger"><?php echo $item['sell']?></td>
        </tr>
        <?php }?>
    </table>
</div>
