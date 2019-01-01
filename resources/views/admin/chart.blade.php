@extends('admin.layout')
@section('title', 'Bảng xếp hạng các phòng chơi')
@section('content')
    <h3>Bảng xếp hạng các phòng chơi</h3>
    <label for="exampleFormControlSelect1">Chọn phòng: </label>
    <form method = "post" action = "" >
        <input type ="hidden" name="_token" value="{{@csrf_token()}}">
        <select class="form-control room" id="exampleFormControlSelect1" name = "room" required>
            <option value = "">Chọn</option>
            @isset($list)
                @foreach($list as $item)
                    <option value = "{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            @endisset
        </select>   
    </form>
    <div class="form-group btn-submit">
        <button style type="button" class="btn btn-primary" id="btn-chart" name = "chart">Xem</button>
    </div>
    <div id="data-chart">
        
    </div>
@endsection
@section('scripts')
    <script src="../js/admin/chart.js"></script>
@endsection

                