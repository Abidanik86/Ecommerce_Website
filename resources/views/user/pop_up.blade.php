@if(session('nocart'))
    <script>
        alert('{{ session('nocart') }}');
    </script>
@endif
@if(session('add_cart'))
    <script>
        alert('{{ session('add_cart') }}');
    </script>
@endif
@if(session('delete_cart'))
    <script>
        alert('{{ session('delete_cart') }}');
    </script>
@endif

@if(session('success_order'))
    <script>
        alert('{{ session('success_order') }}');
    </script>
@endif
@if(session('order_cancel'))
    <script>
        alert('{{ session('order_cancel') }}');
    </script>
@endif
@if(session('no_order'))
    <script>
        alert('{{ session('no_order') }}');
    </script>
@endif
