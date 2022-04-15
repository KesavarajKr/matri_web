<html>

    <body onload="document.frm1.submit()">
        <form action="{{$url}}" name="frm1" method="post">
            <p>Please wait.......</p>

            <input type="hidden" name="signature" value='{{$signature}}'/>
            <input type="hidden" name="orderNote" value='{{$orderNote}}'/>
            <input type="hidden" name="orderCurrency" value='{{$orderCurrency}}'/>
            <input type="hidden" name="customerName" value='{{$varanid}}'/>
            <input type="hidden" name="customerEmail" value='{{$customerEmail}}'/>
            <input type="hidden" name="customerPhone" value='{{$customerPhone}}'/>
            <input type="hidden" name="orderAmount" value='{{$orderAmount}}'/>
            <input type="hidden" name="notifyUrl" value='{{$notifyUrl}}'/>
            <input type ="hidden" name="returnUrl" value='{{$returnUrl}}'/>
            <input type="hidden" name="appId" value='{{$appid}}'/>
            <input type="hidden" name="orderId" value='{{$orderId}}'/>

        </form>
    </body>
</html>
