<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    @if(isset($subject))
        <title>{{ $subject }}</title>
    @endif
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    @include('andrefigueira.laramailer.partials.style')
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <!-- BEGIN TEMPLATE // -->
                <table border="0" cellpadding="0" cellspacing="0" id="templateContainer">
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN PREHEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader">
                                <tr>
                                    @if(isset($previewText))
                                        <td valign="top" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:20px;" mc:edit="preheader_content00">
                                            {{ $previewText }}
                                        </td>
                                    @endif
                                </tr>
                            </table>
                            <!-- // END PREHEADER -->
                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN HEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
                                <tr>
                                    <td valign="top" class="headerContent">
                                        <img src="{{ asset('img/email-banner.jpg') }}" style="max-width:600px;" id="headerImage" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext />
                                    </td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN BODY // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
                                <tr>
                                    <td valign="top" class="bodyContent" mc:edit="body_content">
                                        @yield('content')
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>

                    @if(isset($previewLink))
                        <tr>
                            <td align="center" valign="top">
                                <!-- BEGIN FOOTER // -->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                    <tr>
                                        <td valign="top" class="footerContent" mc:edit="footer_content00">
                                            Email not displaying correctly?<br /><a href="{{ $previewLink }}" target="_blank">View it in your browser</a>.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="footerContent" style="padding-top:0; padding-bottom:40px;" mc:edit="footer_content02">

                                        </td>
                                    </tr>
                                </table>
                                <!-- // END FOOTER -->
                            </td>
                        </tr>
                    @endif

                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>