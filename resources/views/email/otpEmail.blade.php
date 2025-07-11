@extends('layout.emailLayout')
@section('content')
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation"
       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                   role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F3F0; background-position: center top; color: #000000; width: 640px;"
                   width="640">
                <tbody>
                <tr>
                    <td class="column column-1"
                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 15px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                        width="100%">
                        <table border="0" cellpadding="0" cellspacing="0" class="text_block"
                               role="presentation"
                               style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                               width="100%">
                            <tr>
                                <td style="padding-left:30px;padding-right:30px;">

                                    <div style="font-family: Tahoma, Verdana, sans-serif">
                                        <strong>OTP</strong>
                                        <div class="txtTinyMce-wrapper"
                                             style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #2b2d49; line-height: 1.2;margin-top:20px ">
                                            <p style="margin: 0; font-size: 16px; text-align: left; letter-spacing: normal;">
                                                            <span style="font-size:15px;">Dear {{ucfirst("{$user->firstName} {$user->lastName}")}}<br><br>
                                                               Please use the 6-digit code to complete your action on {{env("APP_NAME")}}.
                                                              This OTP is only valid for 5 minutes. <br><br>
                                                                Do not disclose your OTP to anyone or staff.
                                                            </span>
                                            </p>
                                            <p style="margin: 0; font-size: 16px; letter-spacing: normal; mso-line-height-alt: 14.399999999999999px;"></p>
                                            <p style="margin: 0; font-size: 10px; letter-spacing: normal; mso-line-height-alt: 14.399999999999999px;">
                                                <span style="font-size: 15px;"><b>{{$user->otp}}</b></span></p>
                                            <p style="margin: 0; font-size: 16px; letter-spacing: normal; mso-line-height-alt: 14.399999999999999px;"></p>
                                            <br>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation"
       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                   role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F3F0; color: #000000; width: 640px;"
                   width="640">
                <tbody>
                <tr>
                    <td class="column column-1"
                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 10px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                        width="100%">
                        <div class="spacer_block" style="height:20px;line-height:20px;font-size:1px;"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
@endsection
