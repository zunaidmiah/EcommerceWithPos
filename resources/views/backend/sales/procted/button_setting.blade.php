
<form id="prints" class="print mr-1" hidden>
                    
</form>

<form id="order_btn_from" class="print mr-1" action=" " method="post" >
    @csrf
  
</form>


{{-- <form id="print" class="print mr-1" action="{{ route('orders.print-all') }} " method="post" >
    @csrf
  
</form>

<form id="delete_all" class="delete_all mr-1" action=" {{ route('orders.destroy-all') }}" method="post">
    @csrf
</form>


<!-- pathao --->
<form id="pathao" class="pathao mr-1" action=" {{ route('courier.pathao_all') }}" method="post">
    @csrf
    <input type="text" hidden class="pathao_city"  name ="patao_city" id="pathao_city">
    <input type="text" hidden class="pathao_zone" name="pathao_zone" id="pathao_zone">
    <input type="text" hidden class="pathao_area" name="pathao_area" id="pathao_area">
</form>
<!-- pathao --->


<!-- StadeFast --->
<form id="stadefast" class="stadefast mr-1" action=" {{ route('courier.steadfast') }}" method="post">
    @csrf
</form>
<!-- StadeFast --->


<!-- Redx --->
<form id="redx" class="redx mr-1" action=" {{ route('courier.redx') }}" method="post">
    @csrf
</form> --}}
<!-- Redx --->