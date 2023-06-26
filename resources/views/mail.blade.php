<form action="{{route('Mail')}}" method="post">
    @csrf
    <button type="submit">Gửi</button>
</form>