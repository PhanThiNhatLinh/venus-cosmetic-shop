<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">

body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }


a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

@media screen and (max-width: 480px) {
    .mobile-hide {
        display: none !important;
    }
    .mobile-center {
        text-align: center !important;
    }
}
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    @php
        $total = 0;
    @endphp


<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Times New Roman', Times, serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
            <tr>
                <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
               
                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                        <tr>
                            <td align="left" valign="top" style="font-family: 'Times New Roman', Times, serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                <h6 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">Venus Cosmetic</h6>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                        <tr>
                            <td align="right" valign="top" style="font-family: 'Times New Roman', Times, serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                <table cellspacing="0" cellpadding="0" border="0" align="right">
                                    <tr>
                                        <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; font-weight: 400;">
                                            <p style="font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;"><a href="#" target="_blank" style="color: #ffffff; text-decoration: none;">Shop &nbsp;</a></p>
                                        </td>
                                        <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; font-weight: 400; line-height: 24px;">
                                            <a href="#" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="https://img.icons8.com/color/48/000000/small-business.png" width="27" height="23" style="display: block; border: 0px;"/></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
              
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family:'Times New Roman', Times, serif; font-size: 50px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <p style=" margin:20px; font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Cảm Ơn Bạn Đã Đặt Hàng!
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                            <h3 style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Chúng tôi xác nhận đơn hàng của bạn đã được đặt thành công. Thông tin chi tiết vui lòng xem bên dưới:
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding-top: 20px;">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="75%" align="left" bgcolor="#eeeeee" style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                        Mã Đặt Hàng #
                                    </td>
                                    <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        {{$key['order_id']}}
                                    </td>
                                </tr>
                                @foreach($key['products'] as $product)
                                    @php
                                        $total += $product['price'] * $product->pivot->quantity;
                                    @endphp
                                    <tr>
                                        <td width="50%" align="left" style="font-family: 'Times New Roman', Times, serif ; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            {{$product['name']}} (Số lượng: {{$product->pivot->quantity}})
                                        </td>
                                        <td width="25%" align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                            {{number_format($product['price'] * $product->pivot->quantity,0,'','.')}} VND
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td width="75%" align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        Phí Vận Chuyển
                                    </td>
                                    <td width="25%" align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        35.000 VND
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding-top: 20px;">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="75%" align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                        Tổng Tiền
                                    </td>
                                    <td width="25%" align="left" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                        {{number_format($total + 35000,0,'','.')}} VND
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                
                </td>
            </tr>
             <tr>
                <td align="left" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                    <tr>
                        <td align="left" valign="top" style="font-size:0;">
                            <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">

                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                            <h4 style="font-family:'Times New Roman', Times, serif; font-weight: 800;">Địa chỉ giao hàng</h4>
                                            <p style="font-family:'Times New Roman', Times, serif; font-weight: 400;">{{$key['address']}}</p>
                                            <h4 style="font-family:'Times New Roman', Times, serif; font-weight: 800;">Số điện thoại</h4>
                                            <p style="font-family:'Times New Roman', Times, serif; font-weight: 400;">{{$key['phone']}}</p>
                                            <h4 style="font-family:'Times New Roman', Times, serif; font-weight: 800;">Thời gian đặt hàng</h4>
                                            <p style="font-family:'Times New Roman', Times, serif; font-weight: 400;">{{$key['created_at']}}</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            {{-- <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                            <h4 style="font-family:'Courier New', Courier, monospace; font-weight: 800;">Thời gian đặt hàng</h4>
                                            <p style="font-family:'Courier New', Courier, monospace; font-weight: 400;">{{$key['created_at']}}</p>
                                        </td>
                                    </tr>
                                </table>
                            </div> --}}
                        </td>
                        {{-- <td><div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                <tr>
                                    <td align="left" valign="top" style="font-family:'Courier New', Courier, monospace; font-size: 16px; font-weight: 400; line-height: 24px; color: blue;">
                                        <p>Đơn hàng sẽ được giao trong vài ngày tới, theo dõi trạng thái đơn hàng trong tài khoản để biết thêm chi tiết!</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </td> --}}
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style=" padding: 35px; background-color:aqua;" bgcolor="#1b9ba3">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <p style="font-size: 24px; font-weight: 800; line-height: 30px; color: blue; margin: 0;">
                                <p>Đơn hàng sẽ được giao trong vài ngày tới. Bạn theo dõi trạng thái đơn hàng trong tài khoản để biết thêm chi tiết nhé!</p>
                            </p>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <p style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;">
                               Đặt thêm các sản phẩm khác tại trang và nhận thêm nhiều ưu đãi!
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 25px 0 15px 0;">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7">
                                      <a href="#" target="_blank" style="font-size: 18px; font-family: 'Times New Roman', Times, serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #F44336; padding: 15px 30px; border: 1px solid #F44336; display: block;">Shop Again</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center">
                            <h1 style="color: #62C3E7" class="m-0 display-4"><span style="color: #F195B2">V</span>ENUS</h1>
                            <span class="font-weight-bold">The Best Cosmetic Shop</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-family:'Times New Roman', Times, serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                            <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                123 Trần Hưng Đạo<br>
                                TP Hồ Chí Minh, Việt Nam
                            </p>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
    
</body>
</html>
