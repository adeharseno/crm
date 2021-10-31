
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  font-family: Helvetica;
  color: #FFFFFF;
  font-style: normal;
  font-weight: normal;
}

.container {
    z-index: 100;
    /*position: absolute;
    margin-left: 40px;
    margin-right: 40px;
    padding-top: 100px;
    position:absolute;*/
    left:0;
    right:0;
}

.wrapper {
    margin: 0 auto;
    max-width: 334px;
    min-height: 670;
    padding: 100px 40px 100px 40px;
}

.promo{
    padding: 5px;
    background: rgba(69, 69, 69, 0.6);
    border-radius: 25px;
}

.price{
    font-weight: bold;
    font-size: 40px;
    line-height: 0%;
    color: #FFFFFF;
    /* identical to box height, or 0px */
    text-align: center;
    letter-spacing: -0.02em;
    padding-bottom: 30px;
    
}

.off{
    font-weight: bold;
    font-size: 16px;
    line-height: 0%;
    color: #FFFFFF;
    /* identical to box height, or 0px */
    text-align: center;
    letter-spacing: -0.02em;
}

.voucher{
    font-size: 16px;
    line-height: 119%;
    /* or 19px */
    text-align: center;
    letter-spacing: 0.015em;
    color: #E0D0B9;
    padding-bottom: 30px;
}
.hello{
    font-size: 13px;
    line-height: 127.52%;
    color: #FFFFFF;
    /* or 17px */
    text-align: center;
    letter-spacing: 0.02em;
    padding-bottom: 30px;
}
.futura{
    font-family: Futura;
    font-weight: 500;
    font-size: 8px;
    line-height: 170.02%;
    /* or 14px */
    text-align: center;
    letter-spacing: 0.215em;
    text-transform: uppercase;
    color: #E0D0B9;
    padding-bottom: 30px;
}

.contact{
    font-family: Futura-Bold;
    font-style: normal;
    font-weight: bold;
    font-size: 8px;
    line-height: 124.52%;
    text-align: center;
    letter-spacing: 0.215em;
    text-transform: uppercase;
    color: #FFFFFF;
    padding-bottom: 30px;
}

.prive{
    font-size: 8px;
    line-height: 9px;
    color: #E0D0B9;
    padding-bottom: 10px;
}

.follow{
    font-size: 9px;
    line-height: 10px;
    text-align: center;
    color: #E0D0B9;
    padding-bottom: 15px;
}

.order{
    font-family: Futura;
    font-style: normal;
    font-weight: 500;
    font-size: 6px;
    line-height: 124.52%;
    text-align: center;
    letter-spacing: 0.215em;
    text-transform: uppercase;
    color: #E0D0B9;
    padding-bottom: 10px;
}

.image {
    max-width: 66%;
    padding-top: 27px;
}

a:link {
  text-decoration: none;
  color: #FFFFFF;
}

a:visited {
  text-decoration: none;
  color: #FFFFFF;
}

a:hover {
  text-decoration: underline;
  color: #FFFFFF;
}

a:active {
  text-decoration: underline;
  color: #FFFFFF;
}

.find{
    font-family: Futura-Bold;
    font-style: normal;
    font-weight: bold;
    font-size: 8px;
    line-height: 124.52%;
    text-align: center;
    letter-spacing: 0.215em;
    text-transform: uppercase;
    color: #FFFFFF;
}
</style>
</head>
    <body>
        <div class="wrapper" style="background-image: url('<?php echo base_url('assets/upload/bg.png')?>');">
            <div class="container">
                <div class="promo" style="text-align: center;">
                    <h2 style="padding-bottom: 30px;"><img alt="PRIVE" class="image" src="<?php echo base_url('assets/upload/prife-logo.png')?>"></h2> 
                    <div class="price">#amount#<span class="off"> IDR Off</span></div>
                    <div class="voucher">Voucher code <br>#voucher#</div>
                    <div class="hello"><p>Hello, #nama# <br><br><br>Congratulations! You have received a MODENA<br>
                        discount voucher of #voucher# off. <br><br><br>
                        Thank you for being a loyal PRIVE customer.</p></div>
                    <div class="futura">
                        <p>applicable at modena experience<br>
                            center and <strong><a style="color: #E0D0B9;" href="http://www.modena.com/id">modena home center</a></strong>.<br>
                            Valid only for one transaction.<br>
                            offer expires on <strong>#expired#</strong></p>
                    </div>
                    <div class="contact"><a style="color: #E0D0B9;" href="mailto:info@prive.co.id"><strong>contact prive</strong></a> to find out more.</div>
                    <div class="follow">Follow us on:</div>
                    <div style="padding-bottom: 15px;">
                        <img alt="Instagram" src="<?php echo base_url('assets/upload/003-instagram.png')?>" style="max-width: 6%;">
                        <img alt="Facebook" src="<?php echo base_url('assets/upload/004-facebook.png')?>" style="max-width: 6%;">
                    </div>
                    <div class="prive"><strong>www.prive.co.id</strong></div>
                    <div class="order">*1 VOUCHER VALID FOR 1 TIME PURCHASE<br>MINIMUM 10,000,000 IDR</div>
                    <div class="prive">© PRIVE 2021 | All rights reserved</div>
                </div>
            </div>
        </div>
    </body>
</html> 
