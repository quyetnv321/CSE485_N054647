@extends('admin.layout')
@section('title', 'Cập nhật phần thưởng tuần')
@section('content')
    <h3>Cập nhật phần thưởng tuần</h3>
    <form method = "post" action = "" >
        <input type ="hidden" name="_token" value="{{@csrf_token()}}">
        <p for="exampleFormControlSelect1">Phần thưởng phòng Random</p>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="nameRewardRandom" placeholder="Tên giải thưởng" name="" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="donorRewardRandom" placeholder="Nhà tài trợ" name="" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="priceRewardRandom" placeholder="Giá phần thưởng" name="" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
        </div>
        <p for="exampleFormControlSelect1">Phần thưởng phòng Ngoại Hạng</p>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="nameRewardVip" placeholder="Tên giải thưởng" name="" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="donorRewardVip" placeholder="Nhà tài trợ" name="" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="priceRewardVip" placeholder="Giá phần thưởng" name="" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
        </div>
        <div class="form-group btn-submit">
            <button style type="button" class="btn btn-primary" id="btn-up" name = "chart">Upload</button>
        </div>
    </form>    
@endsection
@section('scripts')
    <script src="../js/admin/reward.js"></script>
@endsection

                